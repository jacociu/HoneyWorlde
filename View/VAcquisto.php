<?php
class VAcquisto
{
    private $smarty;
    static function getNomeProdotto(){
        $value = "";
        if (!empty($_POST['nomeProdotto']))
            $value = $_POST['nomeProdotto'];
        return $value;
    }
    static function getQuantita(){
        $value ="";
        if(!empty($_POST['quantita']))
        $value = $_POST['quantita'];
    return $value;
    }
    public function __construct()
    {
        $this->smarty = StartSmarty::configuration();
    }

    public function showFormAcquisto()
    {
        if (CUtente::isLogged())
            $this->smarty->assign('userlogged', 'logged');
        else
            $this->smarty->assign('userlogged', 'nouser');

        $this->smarty->display('./Smarty/libs/templates/pagamento.tpl');
    }

    public function Pagamento($totale)
    {
        if (CUtente::isLogged())
            $this->smarty->assign('userlogged', 'logged');

        $this->smarty->assign('totale', $totale);
        $this->smarty->display('./Smarty/libs/templates/pagamento.tpl');
    }


    public function Carrello($carrello, $size, $carrello_esiste)
    {
        if (CUtente::isLogged())
            $this->smarty->assign('userlogged', 'logged');
        else
            $this->smarty->assign('userlogged', 'nouser');
        $this->smarty->assign('carrello_esiste',$carrello_esiste);


        $this->smarty->assign('carrello', $carrello);
        $this->smarty->assign('size', $size);
        $this->smarty->display('./Smarty/libs/templates/carrello.tpl');
    }
    public function mostraProdotti($prodotto){

        if (CUtente::isLogged())  $this->smarty->assign('userlogged', 'loggato');
        else $this->smarty->assign('userlogged', 'nouser');
        $this->smarty->assign('prodotto', $prodotto);
        $this->smarty->display('./Smarty/libs/templates/catalogo.tpl');
        
    }
    public function mostraInfo($prodotto,$utente) {
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');
        else $this->smarty->assign('userlogged', 'nouser');

        $this->smarty->assign('utente', $utente);
        $this->smarty->assign('prodotto', $prodotto);
        $this->smarty->display('./Smarty/libs/templates/prodotto.tpl');
    }

}