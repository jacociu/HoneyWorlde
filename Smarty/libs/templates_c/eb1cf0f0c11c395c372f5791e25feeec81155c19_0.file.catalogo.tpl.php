<?php
/* Smarty version 4.4.1, created on 2024-04-23 16:49:23
  from '/membri/honeyworlde/honeyworlde/Smarty/libs/templates/catalogo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_6627ca73626247_49550371',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eb1cf0f0c11c395c372f5791e25feeec81155c19' => 
    array (
      0 => '/membri/honeyworlde/honeyworlde/Smarty/libs/templates/catalogo.tpl',
      1 => 1713878757,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6627ca73626247_49550371 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<?php $_smarty_tpl->_assignInScope('userlogged', (($tmp = $_smarty_tpl->tpl_vars['userlogged']->value ?? null)===null||$tmp==='' ? 'nouser' ?? null : $tmp));?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>honeyworlde</title>
    <link rel="icon" href="/honeyworlde/Smarty/libs/immagini/logo.jpg" type="image/png">
    <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap' rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/honeyworlde/Smarty/libs/css/boot_styles.css" rel="stylesheet"/>
    <link href="/honeyworlde/Smarty/libs/css/prof7.css" rel="stylesheet" type="text/css"/>
    <!-- Stile personalizzato per l'immagine di sfondo -->
    <style>
        body {
            background-image: url('/honeyworlde/Smarty/libs/immagini/background.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center center;
            color: #000; /* Testo nero */
        }
    </style>
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
    <body class="d-flex flex-column h-25">
        <main class="flex-shrink-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-1">
                    <a class="navbar-brand px-sm-1" href="/honeyworlde/">honeyworlde</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="/honeyworlde/">Home</a></li>
                            <?php if ($_smarty_tpl->tpl_vars['userlogged']->value != 'nouser') {?>
                             <li class="nav-item text-light">
                                    <a class="nav-link" href="/honeyworlde/Acquisto/carrello">Carrello</a>
                                </li>
                                <li class="nav-item text-light">
                                    <a class="nav-link" href="/honeyworlde/Utente/profilo">Profilo</a>
                                </li>
                                <li class="nav-item text-light">
                                    <a class="nav-link" href="/honeyworlde/Utente/logout">Disconnetti</a>
                                </li>
                            <?php } else { ?>
                                <li class="nav-item text-light">
                                     <a class="nav-link" href="/honeyworlde/Utente/login">Accedi</a>
                            </li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
            </nav>
        <section id="search" class="testimonials section-bg">
      <div class="container">

        <div class="section-title">
        <br>
          <h2>Catalogo</h2>
        </div>
        </div>
        <div class="container px-5 my-5">
            <div class="row gx-5">

                <div class="col-lg-8">
                    <div class="row gx-5 row-cols-1 row-cols-md-2">
                    <?php if ($_smarty_tpl->tpl_vars['prodotto']->value != null) {?>
                    <?php if (is_array($_smarty_tpl->tpl_vars['prodotto']->value)) {?>
                     <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < sizeof($_smarty_tpl->tpl_vars['prodotto']->value)) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < sizeof($_smarty_tpl->tpl_vars['prodotto']->value); $_smarty_tpl->tpl_vars['i']->value++) {
?>
                       <div id = "prodotto" class="col-lg-4 mb-5">
                        <div class="row" style="width: 15rem; height: 19rem">
                            <div class="card"  >
                                    <img class="card-img-top" src="/honeyworlde/Smarty/libs/immagini/prod.jpg" style="width: 200px; height: 150px; align-content: center" />
                    
                                    <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['prodotto']->value[$_smarty_tpl->tpl_vars['i']->value]->getNomeProdotto();?>
</h5>
                                    <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['prodotto']->value[$_smarty_tpl->tpl_vars['i']->value]->getPrezzo();?>
€</h5>
                                    <a methods="GET"  class="btn btn-dark" href="../Acquisto/infoProdotto?id=<?php echo $_smarty_tpl->tpl_vars['prodotto']->value[$_smarty_tpl->tpl_vars['i']->value]->getId();?>
" >Visualizza prodotto</a>
                                </div>
                              </div>
                            </div>
                       <?php }
}
?>
 
                        <?php }?>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
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
