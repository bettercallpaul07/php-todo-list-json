<?php

//aggiungo alla variabile todolistString i file del mio database
$todolistString = file_get_contents("database.json");

$todolistDecoded =  json_decode($todolistString, true);

//costruisco il nuovo oggetto con i dati di post 
$newTodo = [
    "todo" => $_POST["todoTxt"],
    "done" => false
];

//aggiungo i dati al database
$todolistDecoded[] = $newTodo;

//li ricodifico in stringa perché voglio aggiornare il mio database JSON
$todolistEncoded = json_encode($todolistDecoded);

//lo aggiungo al database aggiugendo la nuova stringa
file_put_contents("database.json", $todolistEncoded);

$response = [
    "success" => true,
    "message" => "ok",
    "code" => 200,
];

//specifico che la risposta è un json
header('Content-Type: application/json');

//rispondo con l'encoding della risposta in formato json
echo json_encode($response);
