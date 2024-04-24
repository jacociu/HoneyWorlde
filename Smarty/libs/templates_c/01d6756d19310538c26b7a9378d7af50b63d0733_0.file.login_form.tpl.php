<?php
/* Smarty version 4.4.1, created on 2024-04-23 17:48:26
  from '/membri/honeyworlde/honeyworlde/Smarty/libs/templates/login_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_6627d84a4dd708_58815093',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '01d6756d19310538c26b7a9378d7af50b63d0733' => 
    array (
      0 => '/membri/honeyworlde/honeyworlde/Smarty/libs/templates/login_form.tpl',
      1 => 1713887304,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6627d84a4dd708_58815093 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="../Smarty/libs/css/log.css">
  <title>honeyworlde</title>
  <link rel="icon" href="/honeyworlde/Smarty/libs/immagini/logo.jpg" type="image/png">
  <?php echo '<script'; ?>
>
    function ready(){
        if (!navigator.cookieEnabled) {
            alert('Attenzione! Attivare i cookie per proseguire correttamente la navigazione');
        }
    }
    document.addEventListener("DOMContentLoaded", ready);
<?php echo '</script'; ?>
>

</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="/honeyworlde/Utente/login" method="POST">
                    <h2>Login</h2>
                    <div class="inputbox">    
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" name="Email" required>
                        <label for="">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="Password" required>
                        <label for="">Password</label>
                        <br/>
                    </div>
                    <div class="forget">
                        <label for=""><a href="#">Forget Password</a></label>                 
                    </div>
                    <button type ="submit">Login</button>
                    <div class="register">
                        <p>Don't have a account <a href="/honeyworlde/Utente/registrazione">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
        <?php if ((isset($_smarty_tpl->tpl_vars['errore']->value))) {?>
        <div class="text-center" style="color: red; position: absolute; bottom: 0; width: 100%; margin-bottom: 55px;">
        <p align="center">Email e/o password errati, riprova!</p>
        </div>
    <?php }?>
    </section>
    <?php echo '<script'; ?>
 type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
