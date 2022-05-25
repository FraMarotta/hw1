<!DOCTYPE html>
<html>
    <head>
        <title>Si Viaggia</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles/style.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@300&family=Inspiration&family=Rubik:wght@300&display=swap" rel="stylesheet">
        <script src="scripts/covid.js" defer="true"></script>
        <script src="scripts/load_home.js" defer="true"></script>
        <script src="scripts/search.js" defer="true"></script>
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
              <?php
                    session_start();
                    if(isset($_SESSION["usr"]))
                    {
                        $usr = $_SESSION["usr"];
                        echo "<div> Benvenuto $usr </div>";
                    }
                    else
                        header("Location: home.php");
                ?>
              <div id="links">
                <a href = "favorites.php"><img src="images\like_d.svg"></a>
                <div>
                  <a  href="logged_home.php">Home</a>
                  <a  href="home.php">LOGOUT</a>
                </div>
              </div>
              <!-- menu tre trattini versione mobile-->
              <div class="dropdown">
                <button class="dropbtn">MENU</button>
                <div class="dropdown-content" style="display:none">
                  <a href="logged_home.php">Home</a>
                  <a href="home.php">LOGOUT</a>
                </div>
            </div>
            </nav>
            <h1>
              <em>Il turismo riparte!</em><br/>
              <strong>SCOPRI LE NOSTRE OFFERTE</strong><br/>
              <form id ='search_content'><input type = "search" class="oval" id = "barra" placeholder = "Cerca una meta"></input></form>
            </h1>
            <a id = "covid">News COVID-19</a>
          </header>

          <section>
            <div id="main">
              <h1>Lasciati Ispirare</h1>
              <p>
                Le mete che ti consiglia il nostro staff!
              </p>
            </div>
            <div class="Info"> 
              <div class="boxes_img">  </div>
              <div class="boxes_img_mobile"> </div>
              <div class="boxes_txt" >
                
              </div>
            </div>
            <div class="Info">
              <div class="boxes_img_mobile"> </div>
              <div class="boxes_txt" >
                
              </div>
              <div class="boxes_img"> </div>

            </div>
            <div class="Info">
              <div class="boxes_img_mobile"> </div>
              <div class="boxes_img"> </div>
              <div class="boxes_txt" >
                
              </div>
            </div>

            <div class="Info">
              <div class="boxes_img_mobile"> </div>
              <div class="boxes_txt" >
                
              </div>
              <div class="boxes_img"></div>

            </div>


            <article id="modale" class="hidden"> 
          
            </article>
          </section>

          <footer>
              <span>Francesco Marotta 1000001522 ©</span>
          </footer>

    </body>
</html>