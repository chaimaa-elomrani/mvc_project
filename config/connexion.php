<?php

$host = "localhost";       
$username = "root";       
$password = "";            
$database = "mvc_project"; 

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}else{
    // echo"safe rah tconnecta";
}