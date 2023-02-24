<?php

//aggiungo alla variabile todolistString gli elementi del mio database JSON
$todolistString = file_get_contents("database.json");

//converto la mia stringa JSON in un array associativo
$todolist =  json_decode($todolistString, true);


//costruisco il nuovo oggetto con i dati di post 
$todolist[] = [
    "todo" => $_POST['newTodo'],
    "complete" => false,
];


//li ricodifico in stringa perché voglio aggiornare il mio database JSON
$todolistEncoded = json_encode($todolist);


//aggiorno il database aggiugendo la nuova stringa
file_put_contents("database.json", $todolistEncoded);

//creo l'array di risposta da visualizzare in pagina
$response = [
    "success" => true,
    "message" => "ok",
    "code" => 200,
    "todolist" => $todolist
];

//specifico che la risposta è un json
header('Content-Type: application/json');

//rispondo con l'encoding della risposta in formato json
echo json_encode($response);
