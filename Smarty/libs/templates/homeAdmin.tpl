<!DOCTYPE html>
{assign var = 'userLogged' value=$userLogged|default:'nouser'}
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
        </div>
         <div class="container px-5 my-5">
            <div class="row gx-5">
                <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0">Catalogo</h2></div>
                <div class="col-lg-8">
                    <div class="row gx-5 row-cols-1 row-cols-md-2">
                    {if $prodotto != null}
                    {if is_array($prodotto)}
                     {for $i = 0; $i <sizeof($prodotto); $i++}
                       <div id = "prodotto" class="col-lg-4 mb-5">
                        <div class="row" style="width: 15rem; height: 19rem">
                            <div class="card"  >
                                    <img class="card-img-top" src="/honeyworlde/Smarty/libs/immagini/prod.jpg" style="width: 200px; height: 150px; align-content: center" />
                    
                                    <h5 class="card-title">{$prodotto[$i]->getNomeProdotto()}</h5>
                                    <h5 class="card-title">{$prodotto[$i]->getPrezzo()}€</h5>
                                    <a methods="GET"  class="btn btn-dark" href="../Gestione/modificaProdotto?id={$prodotto[$i]->getId()}" >Modifica prodotto</a>
                                </div>
                              </div>
                            </div>
                       {/for}
                       <div id = "prodotto" class="col-lg-4 mb-5">
                        <div class="row" style="width: 15rem; height: 19rem">
                            <div class="card"  >
                           

                        {/if}
                        {/if}
                        
                    </div>
                </div>
        </div>
    </section>

            <!-- Bootstrap core JS-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        </body>
    </html>
               