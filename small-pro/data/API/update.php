<?php
header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8 ");
header("Access-Control-Allow-Methods: PUT ");
header("Access-Control-Allow-Headers: * ");

require_once '../models/Pizzas.php';

$data =json_decode(file_get_contents("php://input")); 

$createdBy = $data->createdBy; 
$date = $data->date;
$elements = $data->elements;
$id = $data->id;

$posts = new Posts();
if($posts->updatePizza($createdBy,$date ,$elements,$id)){
    echo json_encode(
        array("message"=>"Pizza updated")
    );
}else
{
    echo json_encode(
        array("message"=>"Pizza not updated")
    );
}


