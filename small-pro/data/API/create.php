<?php
header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8 ");
header("Access-Control-Allow-Methods: POST ");
header("Access-Control-Allow-Headers: * ");

require_once '../models/Pizzas.php';

$data =json_decode(file_get_contents("php://input"));


if(isset($data->createdBy) & isset($data->date) & isset($data->elements)){
    $createdBy = $data->createdBy;
    $date = $data->date;
    $elements = $data->elements;
}else{
    echo "there's no data insert";
}


if(isset($createdBy) & isset($date) & isset($elements))
{
    $posts = new Posts();
    $pizzaId = $posts->createPizza($createdBy,$date ,$elements);
    if($pizzaId){
        echo json_encode(
            ["message"=>"Pizza created", "pizza" => [...(array)$data, "id" => $pizzaId ]]
        );
    }else
    {
        echo json_encode(
            array("message"=>"Pizza not created")
        );
    }
}




