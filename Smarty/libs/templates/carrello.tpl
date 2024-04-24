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
    
    <script>
      function ready(){
          if (!navigator.cookieEnabled) {
              alert('Attenzione! Attivare i cookie per proseguire correttamente la navigazione');
          }
      }
      document.addEventListener("DOMContentLoaded", ready);
  </script>
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
{if $carrello_esiste == 1}	
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
                           
           {if is_array($carrello)}
                     {for $i = 0; $i <sizeof($carrello)-1; $i++}
              <tbody>
                <tr>
                     <td> {$carrello[$i].0} </td>
			                 <td> {$carrello[$i].1} </td>
			                <td> {$carrello[$i].2} </td>
                                    <td><a methods="POST"  class="btn btn-outline-danger" href="../Acquisto/Rimuovi?id={$i}" >Rimuovi</a></td>
                                </div>
                              </div>
                            </div>
                       {/for}
                        {/if}
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
          <h1 >Totale: {$carrello.{$size-1}}€ </h1>
        </div>
        <div class="row">
         <div class="col-md-6 w-75 d-flex justify-content-end">
        <form method="POST" action="/honeyworlde/Acquisto/pagamento?totale={$carrello.{$size-1}}" >
        <input type="submit" id="button1" class="btn btn-outline-primary" value="Pagamento">
        </form>
        </div>
       {else}
      <p style="color: black; text-align: center;">
      il carrello è vuoto, <a href="/honeyworlde/Acquisto/esploraProdotti">esplora i prodotti</a> per fare acquisti</p>
        {/if}
      </div>

      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>

</html>