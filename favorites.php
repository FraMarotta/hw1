<!DOCTYPE html>
<html>
    <head>
        <title> Mete Preferite</title>
        <link rel="stylesheet" href="styles/favorite_style.css"/>
        <script src="scripts/my_travel.js" defer="true"></script>
    </head>

    <body>  
            <a href="logged_home.php">HOME</a>
            <?php
                session_start();
                if(isset($_SESSION["usr"])){

                }   
                else
                    header("Location: home.php");
            ?>
            <main>
                <section id='favorite'>
                    <div class='title'>
                        <div class='mete'>
                        </div>
                    </div>
                </section>
            </main>
            <footer>
              <span>Francesco Marotta 1000001522 ©</span>
            </footer>
    </body>
    
</html>