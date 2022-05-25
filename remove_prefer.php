<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "si_viaggia");
    $usr = mysqli_real_escape_string($conn,$_SESSION['usr']);
    $postId = mysqli_real_escape_string($conn, $_GET["meta"]);
    $in_query = "DELETE FROM preferiti WHERE utente = '$usr'AND meta = '$postId'";
    print_r($in_query);
    $res = mysqli_query($conn, $in_query);
?>