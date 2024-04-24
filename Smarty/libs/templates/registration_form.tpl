<!DOCTYPE html>
{assign var='Stato' value=$Stato|default:0}
{assign var='error' value=$error|default:''}
<html lang="en">
<head>
  <link rel="stylesheet" href="../Smarty/libs/css/log.css">
  <title>honeyworlde</title>
  <link rel="icon" href="/honeyworlde/Smarty/libs/immagini/logo.jpg" type="image/png">
</head>
<body>
    <section>
        <div class="form-box-reg">
            <div class="form-value">
                <form action="/honeyworlde/Utente/registrazione" method="POST">
                    <h2>Register</h2>
                    <div class="inputbox">
                        <ion-icon name="Person"></ion-icon>
                        <input type="text" name="Nome" required>
                        <label for="">Nome</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="Person"></ion-icon>
                        <input type="text" name="Cognome" required>
                        <label for="">cognome</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" name="Email" required>
                        <label for="">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="Password" required>
                        <label for="">Password</label>
                    </div>
                    <button type="submit">Registrati</button>
                    {if !isset($emailEsistente)}
                    <div class="register">
                        <p>Hai già un account? <a href="/honeyworlde/Utente/login">Login now</a></p>
                    </div>
                    {/if}
                </form>
            </div>
        </div>
        {if isset($emailEsistente)}
            <div class="text-center" style="color: red; position: absolute; bottom: 0; width: 100%; margin-bottom: 55px;">
            <p align="center">Email già in uso! <a href="/honeyworlde/Utente/login"> Login </a></p>
        </div>
        {/if}
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>