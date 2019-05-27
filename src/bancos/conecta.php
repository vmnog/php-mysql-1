<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbName = "loja";

// conecta ao mysql
$conexao = new mysqli($servername, $username, $password);
if ($conexao->connect_error) {
    die("conexaoection failed: " . $conexao->conexaoect_error);
}



// se o banco não existir, cria um
if (!mysqli_select_db($conexao,$dbName)){
    $sql = "CREATE DATABASE ".$dbName;
    if ($conexao->query($sql) === TRUE) {
        echo "LOJA, ";
    }else {
        echo "Error creating database: " . $conexao->error;
    }
} 
// se a tabela não existir, cria uma.
$query = "SELECT ID FROM Produtos";
$result = mysqli_query($conexao, $query);

if(empty($result) & mysqli_select_db($conexao,$dbName)) {
                $query = "CREATE TABLE Produtos (
						id int AUTO_INCREMENT PRIMARY KEY,
						nome varchar(255),
						preco decimal(10,2),
						descricao text,
						categoria_id int,
						imagem varchar(50),
						usado boolean default 0
                          )";
                $result = mysqli_query($conexao, $query);
				 echo " PRODUTOS\n";
}

$query = "SELECT ID FROM categorias";
$result = mysqli_query($conexao, $query);

if(empty($result) & mysqli_select_db($conexao,$dbName)) {
                $query = "CREATE TABLE categorias (
							id int AUTO_INCREMENT PRIMARY KEY,
							nome varchar(255) NOT NULL
                          )";
						   $result = mysqli_query($conexao, $query);
				 echo " e CATEGORIAS criados com sucesso!\n";
}


