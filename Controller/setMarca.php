<?php

header('Content-Type: text/html; charset=utf-8');
require_once 'ClassConnection.php';

$db = new DBConnection;
$conn = $db->conn;

$capitulos = $conn->query("UPDATE capitulos SET marcado = 1 WHERE id = " . $_POST['id'] . "");

echo 'Marca agregada';
