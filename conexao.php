<?php
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'autopeca';
$port = 3306;


$mysqli = new mysqli($servidor, $usuario, $senha, $banco, $port);


if ($mysqli->connect_errno) {
    
    echo "Falha ao conectar ao MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
} else {
   
    echo "Conexão bem-sucedida ao banco de dados!";
}


$mysqli->close();
?>


