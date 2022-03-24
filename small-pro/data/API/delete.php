<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8 ");
header("Access-Control-Allow-Methods:*");
header("Access-Control-Allow-Max-Age:3600");
header("Access-Control-Allow-Headers:*");

require_once '../models/Pizzas.php';

$data =json_decode(file_get_contents("php://input"));

$id = $data->id;

$posts = new Posts();
if($posts->deletePizza($id)){
    echo json_encode(
        array("message"=>"Pizza deleted")
    );
}else
{
    echo json_encode(
        array("message"=>"Pizza not deleted")
    );
}
