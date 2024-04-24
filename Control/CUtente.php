<?php
//classe che delinea le funzioni per la gestioni di login e registrazione utente

class CUtente
{
    static function registrazione()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $view = new VUtente();
            if (self::isLogged()) {
                $view->loginOk();
            } else {
                $view = new VUtente();
                $view->showFormRegistration();
            }
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            self::verifica_Reg();
        }
    }


    static function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if (static::isLogged()) {
                $view = new VUtente();
                $view->loginOk();
            } else {
                $view = new VUtente();
                $view->showFormLogin();
            }
        } elseif ($_SERVER['REQUEST_METHOD'] == "POST")
            static::verifica();
    }
    /**
     * Funzione di supporto che si occupa di verificare i dati inseriti nella form di registrazione per il cliente .
     * In questo metodo avviene la verifica sull'univocità dell'email inserita;
     */
    static function verifica_Reg()
    {
        $pm = USingleton::getInstance('FPersistentManager');
        $verify_email = $pm::exist('Email', VUtente::getEmail(), 'FUtente');
        $view = new VUtente();
        if ($verify_email) {
            $view->registrationError("emailEsistente");
        } else {
            $nome_utente = VUtente::getNome();
            $cognome_utente = VUtente::getCognome();
            $utente = new EUtente($nome_utente, $cognome_utente, VUtente::getEmail(), md5(VUtente::getPassword()), 0);
            $pm::insert($utente);
            header('Location: /honeyworlde/Utente/login');
        }
    }
    /**
     * Funzione che si occupa di verifica l'esistenza di un utente con username e password inseriti nel form di login.
     * 1) se, dopo la ricerca nel db non si hanno risultati ($utente = null) oppure se l'utente si trova nel db ma ha lo stato false
     *    viene ricaricata la pagina con l'aggunta dell'errore nel login.
     * 2) se l'utente ed è attivo, avviene il reindirizzamaneto alla homepage degli annunci;
     * 3) se le credenziali inserite rispettano i vincoli per l'amministratore, avviene il reindirizamento alla homepage dell'amministratore;
     * 4) se si verifica la presenza di particolari cookie avviene il reindirizzamento alla pagina specifica.
     */
    static function verifica()
    {
        $view = new VUtente();
        
        $pm = USingleton::getInstance('FPersistentManager');
        $utente = $pm->loadLogin(VUtente::getEmail(), md5(VUtente::getPassword()));
        //var_dump($utente);
        if ($utente != null) {
            if (USession::sessionStatus() == PHP_SESSION_NONE) {
                $session = USingleton::getInstance('USession');
                $savableData = serialize($utente);
                $privilegio = $utente->getAdmin();
                $session->setValue('Admin', $privilegio);
                $session->setValue('utente', $savableData);
                if ($privilegio == 0) { //accesso utente
                    header('Location: /honeyworlde/');
                } else { //accesso admin
                    header('Location: /honeyworlde/Gestione/homepage');
                }
            }

        } else {
            $view->loginError('errore');
        }
    }
    //di base distrugge la sessione e torna alla home
    static function logout()
    {
        $session = USingleton::getInstance('USession');
        $session->unsetSession();
        $session->destroySession();
        setcookie('PHPSESSID', '');
        header('Location: /honeyworlde/');
    }
    /**
     * Metodo che verifica se l'utente ha fatto login 
     */
    static function isLogged()
    {
        $check = false;
        if (isset($_COOKIE['PHPSESSID'])) {
            if (USession::sessionStatus() == PHP_SESSION_NONE) {
                USingleton::getInstance('USession');
            }
        }
        if (isset($_SESSION['utente'])) {
            $check = true;
        }
        return $check;
    }
    static function Profilo($Utente_ID = null)
    {
        $view = new VUtente();
        $session = USingleton::getInstance('USession');
        $pm = USingleton::getInstance('FPersistentManager');
        $utenteAutenticato = unserialize($session->readValue('utente'));
        if ($Utente_ID == null) {
            $utente = unserialize($session->readValue('utente'));
        } else
            $utente = $pm::load('FUtente', array(['Utente_ID', '=', $Utente_ID]));
        if (CUtente::isLogged() || $utente != null) {

            if (!isset($utenteAutenticato))
                $utenteAutenticato = null;
            $view->profilo($utenteAutenticato, $Utente_ID);
        }

    }
    static function modificaProfilo()
    {

        $pm = USingleton::getInstance("FPersistentManager");
        $session = USingleton::getInstance("USession");

        $view = new VUtente();
        //se richiesta è get mi passa view modifica

        if ($_SERVER['REQUEST_METHOD'] == "GET") {

            if (CUtente::isLogged()) {

                $utente = unserialize($session->readValue('utente'));
                $view->modificaProfilo($utente, null);
            } else
                header('Location: /honeyworlde/Utente/login');// se non è connesso va a login 


        } elseif ($_SERVER['REQUEST_METHOD'] == "POST") {

            $utente = unserialize($session->readValue('utente')); //vecchi valori degli attributi di utente
            $Nome = VUtente::getNome();//nuovo nome utente inserito dall utente
            $Cognome = VUtente::getCognome(); //nuovo cognome inserito dall utente

            if ($Nome != $utente->getNome()) {
                $pm::update('Nome', $Nome, 'Utente_ID', $utente->getId(), "FUtente");
                $utente->setNome($Nome);
            }
            if ($Cognome != $utente->getCognome()) {
                $pm::update('Cognome', $Cognome, 'Utente_ID', $utente->getId(), "FUtente");
                $utente->setCognome($Cognome);
            }

            $session->destroyValue('utente'); //cancello il vecchio utente dalla sessione
            $session->setValue('utente', serialize($utente)); //inserisco il nuovo utente nella sessione
            header("Location: /honeyworlde/Utente/profilo");
        }
    }
    

}