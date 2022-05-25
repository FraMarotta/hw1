<?php
    if(isset($_GET["q"])){
        $conn = mysqli_connect("localhost", "root", "", "si_viaggia");
        $username = mysqli_real_escape_string($conn, $_GET["q"]);
        $query = "SELECT Username FROM utenti WHERE Username = '$username'";
        $res = mysqli_query($conn, $query);
        echo json_encode(mysqli_num_rows($res));
    }
?>