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
    <link href="/honeyworlde/Smarty/libs/css/prof2.css" rel="stylesheet"/>
    <link href="/honeyworlde/Smarty/libs/css/edit-profile.css" rel="stylesheet"/>
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
                    <a class="navbar-brand px-sm-1" href="/honeyworlde/">honeyworlde</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="/honeyworlde/">Home</a></li>
                            {if $userlogged!='nouser'}
                                <li class="nav-item text-light">
                                    <a class="nav-link" href="/honeyworlde/Acquisto/carrello">carrello</a>
                                </li>
                                <li class="nav-item text-light">
                                    <a class="nav-link" href="/honeyworlde/Utente/profilo">Profilo</a>
                                </li>
                                <li class="nav-item text-light">
                                    <a class="nav-link" href="/honeyworlde/Utente/logout">Disconnetti</a>
                                </li>
                            {else}
                                <li class="nav-item text-light">
                                     <a class="nav-link" href="/honeyworlde/Utente/login">Accedi</a>
                            </li>
                            {/if}
                        </ul>
                    </div>
                </div>
            </nav>
            <section>
                <div class="form-box-prof">
                    <div class="form-value">
                        <form class="form-select-lg" method="post" action="/honeyworlde/Utente/modificaProfilo"  enctype="multipart/form-data">
                            <h2>Edit profile</h2>
                            <div class="inputbox">
                                <ion-icon name="Person"></ion-icon>
                                <input type="text" id="Nome" name="Nome" value="{$utente->getNome()}">
                                <label for="">Name</label>
                            </div>
                            <div class="inputbox">
                                <ion-icon name="Person"></ion-icon>
                                <input type="text" id="Cognome" name="Cognome" value="{$utente->getCognome()}">
                                <label for="">Surname</label>
                            </div>
                            <!--<div class="inputbox">
                                <ion-icon name="mail-outline"></ion-icon>
                                <input disabled type="Email" value="{$utente->getEmail()}">
                            </div>-->
                            <br/>
                            <button type="submit" class="btn btn-dark" >Salva Modifiche</button> 
                        </form>
                    </div>
                </div>
            </section>
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        </body>
        </html>