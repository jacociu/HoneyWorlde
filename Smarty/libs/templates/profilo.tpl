<!DOCTYPE html>
{assign var = 'userLogged' value=$userLogged|default:'nouser'}
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
    <script>
        function ready(){
            if(!navigator.cookieEnabled){
                alert('Attenzione! Attivare i cookie per proseguire correttamente la navigazione')
            }
        }
        document.addEventListener("DOMContentLoaded",ready);
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
                            {if $userlogged =='nouser'}
                                    <li class="nav-item text-light">
                                     <a class="nav-link" href="/honeyworlde/Utente/login">Accedi</a>
                                     </li>
                                {else}
                                <li class="nav-item text-light">
                                    <a class="nav-link" href="/honeyworlde/Acquisto/carrello">Carrello</a>
                                </li>
                                <li class="nav-item text-light">
                                    <a class="nav-link" href="/honeyworlde/Utente/profilo">Profilo</a>
                                </li>
                                <li class="nav-item text-light">
                                    <a class="nav-link" href="/honeyworlde/Utente/logout">Disconnetti</a>
                                </li>
                            {/if}
                        </ul>
                    </div>
                </div>
            </nav>
            <br>
            <div class="container">
            <div class="col-12 text-center">
                <div class="form-box">
                        <div class="card-body little-profile text-center">

                            <div class="pro-img"><img src="/honeyworlde/Smarty/libs/immagini/default.jpg" width=100 height=100 alt="user"></div>
                            <div class="ms-3">
                                <h3 class="m-b-0">{$utente->getNome()} {$utente->getCognome()}</h3>
                               
                            
                            </div>
                            {if $Utente_ID == null}
                                <a method="get" class="btn btn-dark" href="/honeyworlde/Utente/modificaProfilo"> Modifica Profilo </a>
                            {/if}
                            <br>
                            <br>

            <footer>
                <div class="copyright">
                     <div class="container">
                         <div class="row">
                            <div class="col-md-12">
                                <p>© 2024 All Rights Reserved.</p>
                            </div>
                        </div>
                    </div>
                 </div>
                </footer>
            <!-- Bootstrap core JS-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        </body>
    </html>
               