<?php

//aggiungo alla variabile todolistString gli elementi del mio database JSON
$todolistString = file_get_contents("database.json");

//lo rendo un array associativo con il decode
$todolist =  json_decode($todolistString, true);


//...faccio tutte le modifiche del caso...


//creo l'array di risposta da visualizzare in pagina
$response = [
    "success" => true,
    "message" => "ok",
    "code" => 200,
    "todolist" => $todolist
];


//specifico che la risposta è un json
header('Content-Type: application/json');

//lo rendo di nuovo un json per mandarlo come risposta in pagina
$jsonResponse = json_encode($response);




//stampo in pagina il risultato in JSON
echo $jsonResponse;
