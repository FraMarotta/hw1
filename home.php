<?php 
  session_start();
  session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Si Viaggia</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles/home_style.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@300&family=Inspiration&family=Rubik:wght@300&display=swap" rel="stylesheet">
        <script src="scripts/covid.js" defer="true"></script>
    </head>

    <body>
      <article id="modale" class="hidden"> 
      </article>
        <header>
            <div id="overlay"></div>
            
            <nav>
              <div id="logo">
                <img src="images/logo.png">
              </div>
              
              <div id="links">
                <a href="home.php">Home</a>
                <a href="sign_in.php">SIGN-UP/LOGIN</a>
              </div>
              <!-- menu tre trattini versione mobile-->
              <div id="menu">
                <div></div>
                <div></div>
                <div></div>
              </div>
            </nav>
            <h1>
              <em>Il turismo riparte!</em><br/>
              <strong>ACCEDI E</strong><br/>
              <strong>SCOPRI LE NOSTRE OFFERTE</strong><br/>
            </h1>
            <a id = "covid">News COVID-19</a>
          </header>

          <footer>
              <span>Francesco Marotta 1000001522 ©</span>
          </footer>

    </body>
</html>