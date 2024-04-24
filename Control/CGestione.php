<?php
//classe control per la gestione del catalogo e dei Gestione (admin)
class CGestione
{
    //metodo per la creazione di un nuovo prodotto
    static function nuovoProdotto()
    {
        $session = USingleton::getInstance('USession');
        $utente = unserialize($session->readValue('utente'));

        $pm = USingleton::getInstance('FPersistentManager');
        $view = new VGestione();

        if ($_SERVER['REQUEST_METHOD'] == "GET") {

            $view->formNuovoProdotto();

        } elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
            $prodotto = new EProdotto(null, VGestione::getNomeProdotto(), VGestione::getPrezzo());
            $pm::insert($prodotto);
            header('Location: /honeyworlde/Gestione/homepage');
        }

    }

    /**
     * Metodo per la modifica di un prodotto esistente
     */
    static function modificaProdotto($id)
    {

        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');

        $prodotto = $pm::load('FProdotto', array(['Prodotto_ID', '=', $id]));

        $view = new VGestione();

        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if (CUtente::isLogged()) {
                $utente = unserialize($session->readValue('utente'));
                $view->formModificaProdotto($prodotto);
            } else {
                header('Location: /honeyworlde/Utente/login');
            }



        } elseif ($_SERVER['REQUEST_METHOD'] == "POST") {

            $nomeProd = VGestione::getNomeProdotto();
            $prezzo = VGestione::getPrezzo();

            if ($nomeProd != $prodotto->getNomeProdotto()) {
                $pm::update('nomeProdotto', $nomeProd, 'Prodotto_ID', $id, 'FProdotto');
                $prodotto->setNomeProdotto($nomeProd);
            }

            if ($prezzo != $prodotto->getPrezzo()) {
                $pm::update('prezzo', $prezzo, 'Prodotto_ID', $id, 'FProdotto');
                $prodotto->setPrezzo($prezzo);
            }
            header('Location: /honeyworlde/Gestione/homepage');

        }
    }

    /**
     * Metodo dedicato all'eliminazione del prodotto 
     */
    static function eliminaProdotto($id)
    {

        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');

        $prodotto = $pm::load('FProdotto', array(['Prodotto_ID', '=', $id]));

        if (CUtente::isLogged()) {
            $utente = unserialize($session->readValue('utente'));

            //controllo che il prodotto fornito sia esistente
            if (isset($prodotto)) {

                $pm::delete('Prodotto_ID', $id, 'FProdotto');

                header("Location: /honeyworlde/Gestione/homepage");
            } else
                header('Location: /honeyworlde/Utente/login');
        }
    }
    static function homepage()
    {

        $pm = USingleton::getInstance('FPersistentManager');
        $view = new VGestione();
        $session = USingleton::getInstance('USession');
        $utente = unserialize($session->readValue('utente'));
        if ($utente != null && $utente->getAdmin() == 1) {

            $prodotto = $pm::load('FProdotto', array());

            $view->homepage($utente, $prodotto);
        } else {
            header('Location: /honeyworlde/');
        }

    }

}