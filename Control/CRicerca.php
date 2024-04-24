<?php

/**
 * La classe CRicerca si occupa del caricamento della homepage
 */
class CRicerca
{
    /**
     * Metodo utilizzato per il caricamento dell'homepage 
     * @return void
     */
    public static function blogHome()
    {
        $vSearch = new VRicerca();
        $session = USingleton::getInstance('USession');

        if (CUtente::isLogged()) {
            $utente = unserialize($session->readValue('utente'));
        }
        if (!isset($utente))
            $utente = null;
        $vSearch->showHome($utente);
    }
   
}

