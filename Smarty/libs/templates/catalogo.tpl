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
                    {if $prodotto != null}
                    {if is_array($prodotto)}
                     {for $i = 0; $i <sizeof($prodotto); $i++}
                       <div id = "prodotto" class="col-lg-4 mb-5">
                        <div class="row" style="width: 15rem; height: 19rem">
                            <div class="card"  >
                                    <img class="card-img-top" src="/honeyworlde/Smarty/libs/immagini/prod.jpg" style="width: 200px; height: 150px; align-content: center" />
                    
                                    <h5 class="card-title">{$prodotto[$i]->getNomeProdotto()}</h5>
                                    <h5 class="card-title">{$prodotto[$i]->getPrezzo()}€</h5>
                                    <a methods="GET"  class="btn btn-dark" href="../Acquisto/infoProdotto?id={$prodotto[$i]->getId()}" >Visualizza prodotto</a>
                                </div>
                              </div>
                            </div>
                       {/for}
 
                        {/if}
                        {/if}
                    </div>
                </div>
            </div>
        </div>
    </section>
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        </body>
        </html>