<?php


$todolistString = file_get_contents("database.json");
$todolist =  json_decode($todolistString, true);

$response = [
    "success" => true,
    "message" => "ok",
    "code" => 200,
    "todolist" => $todolist
];


$jsonResponse = json_encode($response);


header('Content-Type: application/json');

echo $jsonResponse;
