<?php

class VGestione
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = StartSmarty::configuration();
    }

    static function getNomeProdotto(){
        
        return $_POST['nomeProdotto'];
    }

    static function getPrezzo(){
        return $_POST['prezzo'];
    }
   

    public function Aggiungi()
    {
        $this->smarty->display('formProdotto.tpl');
    }
    public function formNuovoProdotto(){
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');
        else $this->smarty->assign('userlogged', 'nouser');
        
        $this->smarty->display('./Smarty/libs/templates/nuovo_prodotto.tpl');
    }
    public function formModificaProdotto($prodotto){
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');
        else $this->smarty->assign('userlogged', 'nouser');

         $this->smarty->assign('prodotto', $prodotto);
         $this->smarty->display('./Smarty/libs/templates/modifica_prodotto.tpl');
    }
    function homepage($utente,$prodotto){
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');
        else $this->smarty->assign('userlogged', 'nouser');

            $this->smarty->assign('utente', $utente);
            $this->smarty->assign('prodotto', $prodotto);
            $this->smarty->display('./Smarty/libs/templates/homeAdmin.tpl');
        }
}