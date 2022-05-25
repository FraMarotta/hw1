<?php
$conn = mysqli_connect("localhost", "root", "", "si_viaggia");
$query = "SELECT * FROM mete";
$res = mysqli_query($conn, $query);

$array_result = array();
while($row = mysqli_fetch_assoc($res)){
    array_push($array_result, $row);
}
echo json_encode($array_result);
?>