<?php
include('../conn.php');
$nome = $_POST['nome'];
$email = $_POST['email'];
$id = $_POST['idSel'];

$sql = "DELETE FROM cadastro WHERE id_usuario = '$id'";
    if (mysqli_query($conn, $sql)) {
        echo ("deletado");
    } else {
        echo ("error");
    }