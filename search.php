<?php
    $pixabay_endpoint = "https://pixabay.com/api/";
    $pixabay_key = "27406439-9539ca5d15db4ae55b6c56b83";
    $meta = strtoupper( $_GET['destination'] );
    $text = urlencode($meta);
    $curl = curl_init();
    $api_url = $pixabay_endpoint . "?key=" . $pixabay_key . "&q=" . $text . "&orientation=horizontal" ;
    curl_setopt($curl, CURLOPT_URL, $api_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    $json = json_decode($result, true); 
    //json->array
    //print_r($json['hits'][0]['previewURL']);
    $imageUrl = $json['hits'][0]['webformatURL'];
    curl_close($curl);

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Cerca meta</title>
        <link rel="stylesheet" href="styles/search_style.css"/>
    </head>

    <body>  
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
                            echo "<button class>Preferiti</button>";
                        echo "</form>";
                    }
            ?>
            <main>
                <?php
                    for($i = 0; $i < 4; $i++){
                        $imageUrl = $json['hits'][$i]['webformatURL'];
                        echo "<div class = 'images'><img src=" . $imageUrl . "></div>";
                    }
                ?>
                
            </main>

    </body>
</html>
