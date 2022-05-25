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
    //$imageUrl = $json['hits'][0]['webformatURL'];
    echo $result;
    curl_close($curl);
?>
