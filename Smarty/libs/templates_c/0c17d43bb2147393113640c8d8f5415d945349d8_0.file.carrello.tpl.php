<?php
/* Smarty version 4.4.1, created on 2024-04-24 09:45:55
  from '/membri/honeyworlde/honeyworlde/Smarty/libs/templates/carrello.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_6628b8b394e586_39166456',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0c17d43bb2147393113640c8d8f5415d945349d8' => 
    array (
      0 => '/membri/honeyworlde/honeyworlde/Smarty/libs/templates/carrello.tpl',
      1 => 1713878758,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6628b8b394e586_39166456 (Smarty_Internal_Template $_smarty_tpl) {
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
  <body class="d-flex flex-column h-25">
    <main class="flex-shrink-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-1">
                <a class="navbar-brand px-sm-1" href="/honeyworlde/">honeyworlde</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="/honeyworlde/Acquisto/esploraProdotti">Catalogo</a></li>
                        <?php if ($_smarty_tpl->tpl_vars['userlogged']->value != 'nouser') {?>
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
<?php if ($_smarty_tpl->tpl_vars['carrello_esiste']->value == 1) {?>	
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12 ">
          <div class="table-responsive">
         
            <table cellpadding=5 cellspacing=3 border=1 style="width:100%">
              <thead>
                <tr>
                  <th>Prodotto</th>
                  <th>Quantità</th>
                  <th>Prezzo</th>
                  <th>  </th>
                </tr>
              </thead>
                           
           <?php if (is_array($_smarty_tpl->tpl_vars['carrello']->value)) {?>
                     <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < sizeof($_smarty_tpl->tpl_vars['carrello']->value)-1) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < sizeof($_smarty_tpl->tpl_vars['carrello']->value)-1; $_smarty_tpl->tpl_vars['i']->value++) {
?>
              <tbody>
                <tr>
                     <td> <?php echo $_smarty_tpl->tpl_vars['carrello']->value[$_smarty_tpl->tpl_vars['i']->value][0];?>
 </td>
			                 <td> <?php echo $_smarty_tpl->tpl_vars['carrello']->value[$_smarty_tpl->tpl_vars['i']->value][1];?>
 </td>
			                <td> <?php echo $_smarty_tpl->tpl_vars['carrello']->value[$_smarty_tpl->tpl_vars['i']->value][2];?>
 </td>
                                    <td><a methods="POST"  class="btn btn-outline-danger" href="../Acquisto/Rimuovi?id=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" >Rimuovi</a></td>
                                </div>
                              </div>
                            </div>
                       <?php }
}
?>
                        <?php }?>
                </tr>
              </tbody>
            </table>
           
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6 w-75">
          <h1 >Totale: <?php echo $_smarty_tpl->tpl_vars['carrello']->value[$_smarty_tpl->tpl_vars['size']->value-1];?>
€ </h1>
        </div>
        <div class="row">
         <div class="col-md-6 w-75 d-flex justify-content-end">
        <form method="POST" action="/honeyworlde/Acquisto/pagamento?totale=<?php echo $_smarty_tpl->tpl_vars['carrello']->value[$_smarty_tpl->tpl_vars['size']->value-1];?>
" >
        <input type="submit" id="button1" class="btn btn-outline-primary" value="Pagamento">
        </form>
        </div>
       <?php } else { ?>
      <p style="color: black; text-align: center;">
      il carrello è vuoto, <a href="/honeyworlde/Acquisto/esploraProdotti">esplora i prodotti</a> per fare acquisti</p>
        <?php }?>
      </div>

      </div>
    </div>
  </div>
  <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"><?php echo '</script'; ?>
>
  </body>

</html><?php }
}
