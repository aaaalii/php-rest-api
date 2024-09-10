<?php

header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');

include "config.php";

$id = isset($_GET['sid']) ? $_GET['sid'] : die("ID not found");
// we don't know what kind of request we are recieving, so we use
// php://input, this can read any kind of request in json format
$data = json_decode(file_get_contents("php://input"), true);
$query = "select* from students where id = {$id}";

$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0){
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
}else {
    echo json_encode(array('message'=> 'No record found', 'status' => false));
}
?>
