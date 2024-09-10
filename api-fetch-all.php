<?php

header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');

include "config.php";

$query = "select* from students";

$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0){
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
}else {
    echo json_encode(array('message'=> 'No record found', 'status' => false));
}
?>
