<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "autopeca"; 


    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }


    $nome_evento = $_POST["nome_evento"];
    $data_evento = $_POST["data_evento"];
    $horario_evento = $_POST["horario_evento"];


    $sql = "INSERT INTO eventos (nome_evento, data_evento, horario_evento) VALUES ('$nome_evento', '$data_evento', '$horario_evento')";
    if ($conn->query($sql) === TRUE) {
        header("Location: calendario.php");
        exit();
    } else {
        echo "Erro ao cadastrar peça: " . $conn->error;
    }

    $conn->close();
}
?>