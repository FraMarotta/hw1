<?php

    $meta = strtoupper( $_GET['destination'] );

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Cerca meta</title>
        <link rel="stylesheet" href="styles/search_style.css"/>
        <script src="scripts/load_search.js" defer="true"></script>
        <script src="scripts/carosel.js" defer="true"></script>
    </head>

    <body>  
        <section>
            <input type="hidden" id="hiddenInfo" value=<?php echo $meta?>> <!--passo la destinazione al file js per caricare la pagina-->
            <a href="logged_home.php">HOME</a>
            <?php
                session_start();
                if(isset($_SESSION["usr"])){
                    $usr = $_SESSION["usr"];
                    echo "<div class='user'> $usr </div>";
                    echo "<div class= 'city'> $meta </div>";
                }   
                else
                    header("Location: home.php");
            ?>
                        <?php
                    $_SESSION["destination"]  = $meta;
                    $conn = mysqli_connect("localhost", "root", "", "si_viaggia");
                    $utente = mysqli_real_escape_string($conn, $_SESSION['usr']);
                    $dest = mysqli_real_escape_string($conn, $_SESSION['destination']);
                    $query = "SELECT * FROM preferiti WHERE utente = '$utente' AND meta = '$dest'";
                    $query2 =  "AND meta = ' " .$dest. " '";
                    //stampo il bottone per aggiungere nei preferiti solo se non lo è già
                    $res = mysqli_query($conn, $query);
                    if(!mysqli_num_rows($res)){
                        echo "<form action='add_prefer.php' method = 'post'>";
                            echo "<button class> Città Preferita </button>";
                        echo "</form>";
                    }
            ?>
        </section>
            <!-- Slideshow container -->
        <div class="slideshow-container">

        <!-- Full-width images with number added by js-->
                    
        <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>
        <footer>
              <span>Francesco Marotta 1000001522 ©</span>
        </footer>
    </body>
</html>
