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
                    <a class="navbar-brand px-sm-1" href="/honeyworlde/">honeyworlde</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="/honeyworlde/">Home</a></li>
                            {if $userlogged!='nouser'}
                             <li class="nav-item text-light">
                                    <a class="nav-link" href="/honeyworlde/Acquisto/carrello">Carrello</a>
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

                    
                            <h2>{$prodotto->getNomeProdotto()}</h2>
                            <div class="mt-3 px-4"> 
                             <div class="d-flex flex-row align-items-center mt-2"> <img src="/honeyworlde/Smarty/libs/immagini/prod.jpg" width=200 height=200 alt="user" class="rounded">
                           
                           </div>
                          
                           <p class="inputbox">PREZZO: {$prodotto->getPrezzo()}€</p>
                    
                            {if $userlogged != 'nouser'}      
                                <div class="row">
                                <form method="post" action="/honeyworlde/Acquisto/Spesa?id={$prodotto->getId()}" >
                                 Quantità:
                                    <input type="number" name="quantita" min="1" value="1" max="99" >
                                    <input type="submit" id="button1" class="btn btn-primary" value="Aggiungi al carrello">
                                    </form>
                                    </div>

                            
                            {else}
                            <p style="color: blue;"> Devi effettuare il <a href="/honeyworlde/Utente/login">login</a> per acquistare i prodotti!</p>
            
                            {/if} 
                           
                        </form>
                    </div>
                </div>
            </section>
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        </body>
        </html>