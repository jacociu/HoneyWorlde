<?php

class VRicerca
{

    private $smarty;

    public function __construct()
    {
        $this->smarty = StartSmarty::configuration();
    }


    public function showHome($utente)
    {
        if(CUtente::isLogged())  $this->smarty->assign('userLogged', 'loggato');
        else $this->smarty->assign('userLogged', 'nouser');
        $this->smarty->assign('utente', $utente);

        $this->smarty->display('./Smarty/libs/templates/index.tpl');
    }
        /**
         * Metodo dedicato a mostrare i prodotti in esploraProdotti
         */
        
}