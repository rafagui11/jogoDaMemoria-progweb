<?php
require_once 'check.php';
require_once '../db-connection.php';

try {
    // Seleciona o nome do usuário e os dados da partida
    // Apenas vitórias, ordenadas por MENOS jogadas (ascendente)
    // Limitamos a 20 para não ficar gigante
    $sql = "
        SELECT u.username, p.tamanho_tabuleiro, p.jogadas, p.data_hora
        FROM partidas p
        JOIN usuarios u ON p.id_usuario = u.id
        WHERE p.resultado = 'Vitória'
        ORDER BY p.jogadas ASC, p.data_hora DESC
        LIMIT 20
    ";
    
    $stmt = $pdo->query($sql);
    $ranking = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Erro ao buscar ranking: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <title>Memória - Ranking</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/rank.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Quantico:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet"/>
  </head>
  <body>
    <div class="container">
      <div id="logo">
        <h1>
          <img src="../img/head-logo.svg" alt="head-logo" class="img01" />
          MEMÓRIA
          <img src="../img/head-logo.svg" alt="head-logo" class="img02" />
        </h1>
        <a href="logout.php" class="btn-sair">
          <img src="../img/logout.svg" alt="Sair" /> Sair
        </a>
      </div>
    </div>

    <div id="menu">
      <div class="container">
        <nav>
          <a href="hub_partida.php">
            <img src="../img/play-fill.svg" class="menu-icon" alt="jogar" />
            <p>Jogar</p>
          </a>
          <a href="profile.php">
            <img src="../img/person-circle.svg" class="menu-icon" alt="perfil" />
            <p>Perfil</p>
          </a>
          <a href="history.php">
            <img src="../img/Subtract.svg" class="menu-icon" alt="historico" />
            <p>Histórico</p>
          </a>
          <a href="rank.php" class="active">
            <img src="../img/trophy-fill.svg" class="menu-icon" alt="ranking" />
            <p>Ranking</p>
          </a>
        </nav>
      </div>
    </div>

    <div class="container">
      <h2 class="title-hub">RANKING (TOP 20)</h2>
      <main class="main-container">

        <div class="ranking-list">
          <div class="list-header">
            <span>Data</span>
            <span>Tabuleiro</span>
            <span>Resultado</span>
            <span>Jogadas</span>
          </div>

          <?php if (count($ranking) > 0): ?>
            <?php foreach ($ranking as $posicao => $linha): ?>
                
                <div class="list-item">
                    <div class="player-info">
                        <?php if($posicao < 3): ?>
                             <img src="../img/trophy-fill.svg" alt="top player" style="filter: brightness(0.5);" />
                        <?php else: ?>
                             <img src="../img/person-circle.svg" alt="user icon" />
                        <?php endif; ?>
                        
                        <span><?php echo htmlspecialchars($linha['username']); ?></span>
                    </div>
                    <div class="match-info">
                        <span>
                             <?php echo date('d/m/Y', strtotime($linha['data_hora'])); ?>
                        </span>
                        <span><?php echo htmlspecialchars($linha['tamanho_tabuleiro']); ?></span>
                        <span style="color: #4CAF50;">Vitória</span>
                        <span><?php echo $linha['jogadas']; ?></span>
                    </div>
                </div>

            <?php endforeach; ?>
          <?php else: ?>
             <p style="text-align:center; margin-top:20px; color:white;">O Ranking está vazio. Seja o primeiro a ganhar!</p>
          <?php endif; ?>
          </div>
      </main>
    </div>
  </body>
</html>