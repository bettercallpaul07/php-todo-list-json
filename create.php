<?php

var_dump($_POST);

//aggiungo alla variabile todolistString gli elementi del mio database JSON
$todolistString = file_get_contents("database.json");

//converto la mia stringa JSON in un array associativo
$todolist =  json_decode($todolistString, true);

$newTodo = [
    "todo" => $_POST['newTodo']['todo'],
    "complete" => false
];


//costruisco il nuovo oggetto con i dati di post 
$todolist[] = $newTodo;


//li ricodifico in stringa perché voglio aggiornare il mio database JSON
$todolistEncoded = json_encode($todolist);


//aggiorno il database aggiugendo la nuova stringa
file_put_contents("database.json", $todolistEncoded);


//specifico che la risposta è un json
header('Content-Type: application/json');

//creo l'array di risposta da visualizzare in pagina
$response = [
    "success" => true,
    "message" => "ok",
    "code" => 200,
    "todolist" => $todolist
];


//rispondo con l'encoding della risposta in formato json
echo json_encode($response);
