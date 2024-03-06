<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "loginphp";

try {
    $pdo = new PDO("mysql:host={$servidor}; dbname={$banco}; port=3306; charset=utf8;", $usuario, $senha);
} catch (\Exception $e) {
    echo "<p>Erro ao se conectar no banco</p>";
    echo $e->getMessage();
}
