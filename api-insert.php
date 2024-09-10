<?php

header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
// header('Access-Control-Allow-Headers:
//         Access-Control-Allow-Headers, Access-Control-Allow-Methods, Access-Control-Allow-Origin, Content-type, Authorization, X-Requested-With');

include "config.php";

// we don't know what kind of request we are recieving, so we use
// php://input, this can read any kind of request in json format
$data = json_decode(file_get_contents("php://input"), true);
$name = $data['sname'];
$age = $data['sage'];
$city = $data['scity'];

$query = "insert into students (name, age, city) values ('$name', $age, '$city')";
// echo $query;
// die();
if(mysqli_query($conn, $query)){
    $output = "Inserted successfully";
    echo json_encode(array('message'=>$output, 'status' => true));
}else {
    echo json_encode(array('message'=> 'Insertion Failed', 'status' => false));
}
?>
