<?php
// Configurações do banco de dados
$host = 'localhost'; 
$port = '3307'; // A porta que corrigimos!
$dbname = 'jogo_memoria'; // O nome do banco que você acabou de criar
$user = 'root'; 
$pass = ''; 
$charset = 'utf8mb4';

// DSN (Data Source Name) - String de conexão
$dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       
    PDO::ATTR_EMULATE_PREPARES   => false,                  
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>