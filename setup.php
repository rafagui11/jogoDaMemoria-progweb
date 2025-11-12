<?php
require_once 'db-connection.php'; 

echo "Conectado ao banco de dados...<br>";

try {
    
    $sql_usuarios = "
    CREATE TABLE IF NOT EXISTS usuarios (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nome_completo VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        username VARCHAR(50) NOT NULL UNIQUE,
        senha VARCHAR(255) NOT NULL,
        data_nascimento DATE NOT NULL,
        cpf VARCHAR(14) NOT NULL UNIQUE,
        telefone VARCHAR(20) NOT NULL,
        data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($sql_usuarios);
    echo "Tabela 'usuarios' criada com sucesso ou já existente.<br>";

    // SQL para criar a tabela de partidas
    $sql_partidas = "
    CREATE TABLE IF NOT EXISTS partidas (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        id_usuario INT(6) UNSIGNED NOT NULL,
        modo_jogo ENUM('classico', 'contratempo') NOT NULL,
        tamanho_tabuleiro VARCHAR(10) NOT NULL,
        resultado ENUM('Vitória', 'Derrota') NOT NULL,
        jogadas INT(6) NOT NULL,
        data_hora DATETIME NOT NULL,
        FOREIGN KEY (id_usuario) REFERENCES usuarios(id) ON DELETE CASCADE
    )";
    $pdo->exec($sql_partidas);
    echo "Tabela 'partidas' criada com sucesso ou já existente.<br>";

    echo "<br><strong>Setup concluído!</strong>";

} catch (PDOException $e) {
    die("ERRO: Não foi possível executar o script. " . $e->getMessage());
}
?>