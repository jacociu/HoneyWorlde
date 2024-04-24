<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="../Smarty/libs/css/log.css">
  <title>honeyworlde</title>
  <link rel="icon" href="/honeyworlde/Smarty/libs/immagini/logo.jpg" type="image/png">
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
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="/honeyworlde/Utente/login" method="POST">
                    <h2>Login</h2>
                    <div class="inputbox">    
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" name="Email" required>
                        <label for="">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="Password" required>
                        <label for="">Password</label>
                        <br/>
                    </div>
                    <div class="forget">
                        <label for=""><a href="#">Forget Password</a></label>                 
                    </div>
                    <button type ="submit">Login</button>
                    <div class="register">
                        <p>Don't have a account <a href="/honeyworlde/Utente/registrazione">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
        {if isset($errore)}
        <div class="text-center" style="color: red; position: absolute; bottom: 0; width: 100%; margin-bottom: 55px;">
        <p align="center">Email e/o password errati, riprova!</p>
        </div>
    {/if}
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>