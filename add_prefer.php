<?php
    session_start();
    //print_r($_SESSION);
    $conn = mysqli_connect("localhost", "root", "", "si_viaggia");
    $utente = mysqli_real_escape_string($conn, $_SESSION['usr']);
    $meta = mysqli_real_escape_string($conn, $_SESSION['destination']);
    $query = "INSERT INTO preferiti(utente,meta) VALUES ( '$utente', '$meta')";
    print_r($query);
    //print_r($query);
    $res = mysqli_query($conn, $query);
    //print_r($res);
    if($res)
        header("Location: logged_home.php");
?>