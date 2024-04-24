<?php
class VUtente
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = StartSmarty::configuration();
    }
    static function getEmail(){
        return $_POST['Email'];
    }
    static function getPassword(){
        return $_POST['Password'];
    }
    static function getNome(){
        return $_POST['Nome'];
    }
    static function getCognome(){
        return $_POST['Cognome'];
    }
    static function getNuovaPassword(){
        return $_POST['nuova_password'];
    }

    public function showFormLogin(){
        $this->smarty->display('./Smarty/libs/templates/login_form.tpl');
    }
    public function showFormRegistration(){
        $this->smarty->display('./Smarty/libs/templates/registration_form.tpl');
    }

    public function loginOk(){
        $this->smarty->display('./Smarty/libs/templates/index.tpl');
    }
    public function loginError($error){
        switch ($error){
            case 'errore':
                $this->smarty->assign('errore', "defaultErrore");
                break;
        }
        $this->smarty->display('./Smarty/libs/templates/login_form.tpl');
    }

    public function registrationError($error){
        switch ($error){
            case 'emailEsistente':
                $this->smarty->assign('emailEsistente', "emailEsistente");
                break;
        }
        $this->smarty->display('./Smarty/libs/templates/registration_form.tpl');
    }
    public function Profilo($user, $Utente_ID)
    {
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');
        else $this->smarty->assign('userlogged', 'nouser');

        $this->smarty->assign('utente', $user);
        $this->smarty->assign('Utente_ID', $Utente_ID);
        $this->smarty->display('./Smarty/libs/templates/profilo.tpl');
    }
     public function modificaProfilo($utente, $error){
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');
        switch ($error){
            case 'emailEsistente':
                $this->smarty->assign('emailEsistente', "emailEsistente");
                break;
        }
        $this->smarty->assign('utente', $utente);
        $this->smarty->display('./Smarty/libs/templates/edit-profile.tpl');
    }
   
   
}