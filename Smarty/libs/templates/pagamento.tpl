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
    <link href="/honeyworlde/Smarty/libs/css/prof5.css" rel="stylesheet"/>
    <link href="/honeyworlde/Smarty/libs/css/boot_styles.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://static.pingendo.com/bootstrap/bootstrap-4.2.1.css" rel="stylesheet">
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
               <div class="py-5 text-center">
    <div class="container">
      <div class="row">
        <div class="mx-auto col-lg-6 col-10">
          <form class="text-left" method="POST" action="/honeyworlde/Acquisto/checkout?totale={$totale}">
          <div class="form-group col-md-12"> <label for="form19">Nome </label> <input min="1" max="30" type="text" class="form-control" id="form19" name="Nome" required="required">
          <div class="form-group col-md-12"> <label for="form19">Cognome</label> <input min="1" max="30" type="text" class="form-control" id="form19" name="Cognome" required="required">
            <div class="form-group"> <label for="form16">Titolare della carta</label> <input min="5" max="20" type="text" class="form-control" id="form16" name="Titolare" required="required"> </div>
            <div class="form-group"> <label for="form17">Numero della carta</label> <input min="13" max="16" type="text" class="form-control" id="form17" placeholder="." name="Carta" required="required"> </div>
            <div class="form-group"> <label for="form18">Codice sicurezza</label> <input type="number" min="100" max="999" class="form-control w-25" id="form18" name="codice" required="required"> </div>
            <div class="form-row">
              <div class="form-group col-md-6"> <label for="form19">Mese scadenza(MM)</label> <input min="1" max="12" type="number" class="form-control" id="form19" style="opacity: 0.5;" name="Mese" required="required"> </div>
              <div class="form-group col-md-6"> <label for="form20">Anno scadenza(YYYY)</label> <input min="2024" max="2200" type="number" class="form-control" id="form20" name="Anno" required="required"> </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12"> <label for="form19">Indirizzo di spedizione</label> <input min="6" max="30" type="text" class="form-control" id="form19" name="Indirizzo" required="required"> </div>
            </div>
            <button type="submit" class="btn btn-primary btn-lg">Conferma</button>
          </form>
        </div>
      </div>
    </div>
  </div>
    </section>
    </div>
    </div>
       <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script> 
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>