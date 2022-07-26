<?php
include('../conn.php');
$nome = $_POST['nome'];
$sigla = $_POST['sigla'];

$sql = "INSERT INTO turma (nome, sigla)
        VALUES ('$nome','$sigla')";
    if (mysqli_query($conn, $sql)) {
        echo ("cadastrado");
    } else {
        echo ("error");
    }
