<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "autopeca";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
   
    $sql = "DELETE FROM pecas WHERE id = ?";
    $stmt = $conn->prepare($sql);
    
    
    if ($stmt) {
        
        $stmt->bind_param("i", $id);
        
   
        if ($stmt->execute()) {
            echo "Peça vendida com sucesso!";
        } else {
            echo "Erro ao vender a peça: " . $conn->error;
        }
        
        
        $stmt->close();
    } else {
        echo "Erro na preparação da consulta: " . $conn->error;
    }
    
    
    header("Location: listagem_pecas.php");
    exit();
} else {
    echo "ID da peça não fornecido.";
}


$conn->close();
?>