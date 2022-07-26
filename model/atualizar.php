<?php
include('../conn.php');
$nick = $_POST['nome'];
$email = $_POST['email'];
$elo = $_POST['elo'];
$id = $_POST['idSel'];





$sql = "UPDATE cadastro c
SET c.nick = '$nick', c.email = '$email', c.elo = '$elo' WHERE c.id_usuario = '$id';
        
            ";
    if (mysqli_query($conn, $sql)) {
        echo ("atualizado");
    } else {
        echo ("error");
    }