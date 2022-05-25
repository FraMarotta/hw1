<?php
    function search_image($meta){
        $pixabay_endpoint = "https://pixabay.com/api/";
        $pixabay_key = "27406439-9539ca5d15db4ae55b6c56b83";
        $meta = strtoupper( $meta );
        $text = urlencode($meta);
        $curl = curl_init();
        $api_url = $pixabay_endpoint . "?key=" . $pixabay_key . "&q=" . $text . "&orientation=horizontal";
        curl_setopt($curl, CURLOPT_URL, $api_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        $json = json_decode($result, true); //json->array
        curl_close($curl);
        return $json['hits'][0]['webformatURL'];
    }
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "si_viaggia");
    $usr = mysqli_real_escape_string($conn,$_SESSION['usr']);
    $query = "SELECT meta FROM preferiti WHERE utente = '$usr'";
    $res = mysqli_query($conn, $query);
    
    $jsonArray = array();
    if(mysqli_num_rows($res)){
        while($row = mysqli_fetch_assoc($res)){
            $dest = $row['meta'];
            $url = search_image($dest);
            $jsonArray[]=(array('meta' => $dest, 'picture' => $url));
        }
        echo json_encode($jsonArray);
    } else echo json_encode(null);
?>