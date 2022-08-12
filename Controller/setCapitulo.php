<?php

header('Content-Type: text/html; charset=utf-8');
require_once 'ClassConnection.php';

$db = new DBConnection;
$conn = $db->conn;

$conn->query("SET NAMES utf8");
$query = "INSERT INTO capitulos (titulo, numero, marcado, capitulo, id_Novelas) VALUES ('" . $_POST['tituloCap'] . "', '" . $_POST['numero'] . "', '0', '" . $_POST['capitulo'] . "', '" . $_POST['id_novelas'] . "')";
$resultado = $conn->query($query);

echo $_POST['capitulo'];
