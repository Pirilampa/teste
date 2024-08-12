<?php

$host = 'localhost';
$port = '5432';
$dbname = 'postgres';
$user = 'postgres';
$password = 'P1r1l@mp@';


$dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];


try {
    $conn = new PDO($dsn, $user, $password, $options);
} catch (PDOException $e) {
    die('Falha ao conectar ao banco de dados: ' . $e->getMessage());
}

?>