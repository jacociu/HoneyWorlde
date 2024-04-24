<?php
/* Smarty version 4.4.1, created on 2024-04-23 16:31:29
  from '/membri/honeyworlde/honeyworlde/Smarty/libs/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_6627c641ee3de2_82965730',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e9d2f041b45c507eac16f70379144f269073450b' => 
    array (
      0 => '/membri/honeyworlde/honeyworlde/Smarty/libs/templates/index.tpl',
      1 => 1713881606,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6627c641ee3de2_82965730 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<?php $_smarty_tpl->_assignInScope('userLogged', (($tmp = $_smarty_tpl->tpl_vars['userLogged']->value ?? null)===null||$tmp==='' ? 'nouser' ?? null : $tmp));?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>honeyworlde</title>
    <link rel="icon" href="/honeyworlde/Smarty/libs/immagini/logo.jpg" type="image/png">

    <!-- Collegamento ai file CSS di Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/honeyworlde/Smarty/libs/css/boot_styles.css" rel="stylesheet" type="text/css"/>
    <link href="/honeyworlde/Smarty/libs/css/prof7.css" rel="stylesheet" type="text/css"/>
    <!-- Stile personalizzato per l'immagine di sfondo -->
    <style>
        body {
            background-image: url('/honeyworlde/Smarty/libs/immagini/Background.jpg');
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
            if(!navigator.cookieEnabled){
                alert('Attenzione! Attivare i cookie per proseguire correttamente la navigazione')
            }
        }
        document.addEventListener("DOMContentLoaded",ready);
    <?php echo '</script'; ?>
>

</head>
    <body class="d-flex flex-column h-25">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-1">
                    <a class="navbar-brand px-sm-1" href="/honeyworlde/">honeyworlde</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="/honeyworlde/">Home</a></li>
                            <?php if ($_smarty_tpl->tpl_vars['userLogged']->value != 'nouser') {?>
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
                            <li class="nav-item">
                                <a class="nav-link" href="/honeyworlde/Utente/login">Accedi</a>
                            </li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
            </nav>
    <div class="container my-15 text-center">
        <img class="rounded-circle" src="/honeyworlde/Smarty/libs/immagini/logo.jpg" width="40" height="40">
        <h1 class="header_top">honeyworlde</h1>
        <p class="lead"> il mondo del miele </p>
    </div>
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <section class="banner_main" >
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                        <h1 style="font-weight: 600;font-size:75px"> <span class="blodark"> honeyworlde</span> 
                        <div class="text-bg">
                        <a href="Acquisto/esploraProdotti" type="button" class="btn btn-dark">Tutti i prodotti</a>
                </div>
            </div>
        </div>
    </section>
    <p></p>

    </section>
            <footer id="footer">
                <div class="footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="inror_box">
                                    <h3>INFORMAZIONI </h3>
                                    <p>questo è un sito per un e-commerce di prodotti alimentari da apicoltura sostenibile </p>
    
                                </div>
                            </div>
    
                        </div>
                    </div>
                    <div class="copyright">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>© 2024 All Rights Reserved.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
    
        </div>
    </div>
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
