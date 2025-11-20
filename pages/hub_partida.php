<?php require_once 'check.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <title>Memoria - Hub</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="../css/hub_partida.css" rel="stylesheet" />
  <link href="../css/main.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Quantico:ital,wght@0,400;0,700;1,400;1,700&display=swap"
    rel="stylesheet" />
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
        <a href="hub_partida.php" class="active">
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
        <a href="rank.php">
          <img src="../img/trophy-fill.svg" class="menu-icon" alt="ranking" />
          <p>Ranking</p>
        </a>
      </nav>
    </div>
  </div>

  <div class="container">
    <h2 class="title-hub">CONFIGURAÇÕES DA PARTIDA</h2>
    <main class="main-container">
      <div id="content-hub">
        <div class="options">
          <input type="radio" name="modo" id="classico" value="classica" checked />
          <label for="classico" class="modo-opcao">
            <p class="title01">Clássico</p>
            <img class="classic" src="../img/classic_game.svg" alt="classico" />
          </label>

          <input type="radio" name="modo" id="contratempo" value="contra" />
          <label for="contratempo" class="modo-opcao">
            <p class="title02">Contratempo</p>
            <img class="contratempo" src="../img/clock-icon.svg" alt="contratempo" />
          </label>
        </div>

        <div class="linha"></div>

        <div id="config">
          <div class="config-left">
            <span class="subtitulo">Tipo de tabuleiro</span>
            <div class="tab-options">
              <input type="radio" name="tabuleiro" id="2x2" />
              <label for="2x2" class="tab-option">2x2</label>

              <input type="radio" name="tabuleiro" id="4x4" />
              <label for="4x4" class="tab-option">4x4</label>

              <input type="radio" name="tabuleiro" id="6x6" />
              <label for="6x6" class="tab-option">6x6</label>

              <input type="radio" name="tabuleiro" id="8x8" checked />
              <label for="8x8" class="tab-option">8x8</label>
            </div>
          </div>

          <div class="config-right">
            <button class="iniciar">INICIAR</button>
          </div>
        </div>
      </div>
    </main>
  </div>

  <script src="/js/app.js"></script>
</body>

</html>