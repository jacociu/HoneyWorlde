<!DOCTYPE html>
{assign var='userlogged' value=$userlogged|default:'nouser'}
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>honeyworlde</title>
    <link rel="icon" href="/honeyworlde/Smarty/libs/immagini/logo.jpg" type="image/png">
    <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap' rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/honeyworlde/Smarty/libs/css/prof4.css" rel="stylesheet"/>
    <link href="/honeyworlde/Smarty/libs/css/boot_styles.css" rel="stylesheet"/>
    <script>
        function ready(){
            if (!navigator.cookieEnabled) {
                alert('Attenzione! Attivare i cookie per proseguire correttamente la navigazione');
            }
        }
        document.addEventListener("DOMContentLoaded", ready);
    </script>
</head>
    <body class="d-flex flex-column h-25">
        <main class="flex-shrink-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-1">
                    <a class="navbar-brand px-sm-1" href="/honeyworlde/Gestione/homepage">honeyworlde</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="/honeyworlde/Gestione/Homepage">Home</a></li>
                            {if $userlogged =='nouser'}
                                    <li class="nav-item text-light">
                                     <a class="nav-link" href="/honeyworlde/Utente/login">Accedi</a>
                                     </li>
                                {else}
                                <li class="nav-item text-light">
                                    <a class="nav-link" href="/honeyworlde/Gestione/nuovoProdotto">Aggiungi prodotto</a>
                                <li class="nav-item text-light">
                                    <a class="nav-link" href="/honeyworlde/Utente/logout">Disconnetti</a>
                                </li>
                            {/if}
                        </ul>
                    </div>
                </div>
            </nav>
            <section>
                <div class="form-box-prof">
                    <div class="form-value">
                        <form class="form-select-lg" method="post" action="/honeyworlde/Gestione/modificaProdotto?id={$prodotto->getId()}"  enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{$prodotto->getId()}">
                            <h2>Edit product</h2>
                    <div class="inputbox">
                        <ion-icon name="Title"></ion-icon>
                        <input type="text" id="nomeProdotto" name="nomeProdotto" value="{$prodotto->getNomeProdotto()}">
                        <label for="">Nome</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="attach_money"></ion-icon>
                        <input type="number" id="prezzo" name="prezzo" value="{$prodotto->getPrezzo()}">
                        <label for="">Price</label>
                    </div>
                   
                    </select>
                       <br>
                       <br>
                            <button type="submit" class="btn btn-dark" >Modifica prodotto</button> 
                            <br>
                            <br>
                        <form class="form-select-lg" method="post" action="/honeyworlde/Gestione/eliminaProdotto?id={$prodotto->getId()}"  enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{$prodotto->getId()}">
                        <div class="forget">
                                <label for=""><a href="/honeyworlde/Gestione/eliminaProdotto?id={$prodotto->getId()}"> Elimina prodotto </a></label>
                                <input type="hidden" name="id" value="{$prodotto->getId()}">                 
                            </div>
                        </form>
                    </div>
                </div>
                
               
            </section>
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        </body>
        </html>