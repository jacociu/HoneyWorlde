<?php
/* Smarty version 4.4.1, created on 2024-04-23 17:50:03
  from '/membri/honeyworlde/honeyworlde/Smarty/libs/templates/registration_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_6627d8ab444dc4_20586470',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'efed109fc7fc467fe58d25e3f82a72b503f65b32' => 
    array (
      0 => '/membri/honeyworlde/honeyworlde/Smarty/libs/templates/registration_form.tpl',
      1 => 1713887319,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6627d8ab444dc4_20586470 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<?php $_smarty_tpl->_assignInScope('Stato', (($tmp = $_smarty_tpl->tpl_vars['Stato']->value ?? null)===null||$tmp==='' ? 0 ?? null : $tmp));
$_smarty_tpl->_assignInScope('error', (($tmp = $_smarty_tpl->tpl_vars['error']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp));?>
<html lang="en">
<head>
  <link rel="stylesheet" href="../Smarty/libs/css/log.css">
  <title>honeyworlde</title>
  <link rel="icon" href="/honeyworlde/Smarty/libs/immagini/logo.jpg" type="image/png">
</head>
<body>
    <section>
        <div class="form-box-reg">
            <div class="form-value">
                <form action="/honeyworlde/Utente/registrazione" method="POST">
                    <h2>Register</h2>
                    <div class="inputbox">
                        <ion-icon name="Person"></ion-icon>
                        <input type="text" name="Nome" required>
                        <label for="">Nome</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="Person"></ion-icon>
                        <input type="text" name="Cognome" required>
                        <label for="">cognome</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" name="Email" required>
                        <label for="">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="Password" required>
                        <label for="">Password</label>
                    </div>
                    <button type="submit">Registrati</button>
                    <?php if (!(isset($_smarty_tpl->tpl_vars['emailEsistente']->value))) {?>
                    <div class="register">
                        <p>Hai già un account? <a href="/honeyworlde/Utente/login">Login now</a></p>
                    </div>
                    <?php }?>
                </form>
            </div>
        </div>
        <?php if ((isset($_smarty_tpl->tpl_vars['emailEsistente']->value))) {?>
            <div class="text-center" style="color: red; position: absolute; bottom: 0; width: 100%; margin-bottom: 55px;">
            <p align="center">Email già in uso! <a href="/honeyworlde/Utente/login"> Login </a></p>
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
