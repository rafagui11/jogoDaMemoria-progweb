<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <title>Memória - Histórico</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/css/main.css" />
    <link rel="stylesheet" href="/css/history.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Quantico:ital,wght@0,400;0,700;1,400;1,700&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="container">
      <div id="logo">
        <h1>
          <img src="/img/head-logo.svg" alt="head-logo" class="img01" />
          MEMÓRIA
          <img src="/img/head-logo.svg" alt="head-logo" class="img02" />
        </h1>
        <a href="/index.php" class="btn-sair">
          <img src="/img/logout.svg" alt="Sair" /> Sair
        </a>
      </div>
    </div>

    <div id="menu">
      <div class="container">
        <nav>
          <a href="hub_partida.php">
            <img src="/img/play-fill.svg" class="menu-icon" alt="raking" />
            <p>Jogar</p>
          </a>
          <a href="profile.php">
            <img src="/img/person-circle.svg" class="menu-icon" alt="logo" />
            <p>Perfil</p>
          </a>

          <a href="history.php" class="active">
            <img src="/img/Subtract.svg" class="menu-icon" alt="history" />
            <p>Histórico</p>
          </a>

          <a href="rank.php">
            <img src="/img/trophy-fill.svg" class="menu-icon" alt="raking" />
            <p>Ranking</p>
          </a>
        </nav>
      </div>
    </div>

    <div class="container">
      <h2 class="title-hub">HISTÓRICO</h2>

      <main class="history-container">
        
        <div class="tabs">
          <button class="tab-button">CLÁSSICO</button>
          <button class="tab-button active">CONTRATEMPO</button>
        </div>

        <div class="history-list">
          <div class="list-header">
            <span>Data</span>
            <span>Tabuleiro</span>
            <span>Resultado</span>
            <span>Jogadas</span>
          </div>

          <div class="list-item">
            <div class="player-info">
              <img src="/img/person-circle.svg" alt="user icon" />
              <span>username</span>
            </div>
            <div class="match-info">
              <span
                >18:00 <br />
                21/05/2025</span
              >
              <span>8x8</span>
              <span>Vitória</span>
              <span>15</span>
            </div>
          </div>

          <div class="list-item">
            <div class="player-info">
              <img src="/img/person-circle.svg" alt="user icon" />
              <span>username</span>
            </div>
            <div class="match-info">
              <span
                >18:00 <br />
                21/05/2025</span
              >
              <span>8x8</span>
              <span>Vitória</span>
              <span>15</span>
            </div>
          </div>

          <div class="list-item">
            <div class="player-info">
              <img src="/img/person-circle.svg" alt="user icon" />
              <span>username</span>
            </div>
            <div class="match-info">
              <span
                >18:00 <br />
                21/05/2025</span
              >
              <span>8x8</span>
              <span>Vitória</span>
              <span>15</span>
            </div>
          </div>

          <div class="list-item">
            <div class="player-info">
              <img src="/img/person-circle.svg" alt="user icon" />
              <span>username</span>
            </div>
            <div class="match-info">
              <span
                >18:00 <br />
                21/05/2025</span
              >
              <span>8x8</span>
              <span>Vitória</span>
              <span>15</span>
            </div>
          </div>

          <div class="list-item">
            <div class="player-info">
              <img src="/img/person-circle.svg" alt="user icon" />
              <span>username</span>
            </div>
            <div class="match-info">
              <span
                >18:00 <br />
                21/05/2025</span
              >
              <span>8x8</span>
              <span>Vitória</span>
              <span>15</span>
            </div>
          </div>
        </div>

        <div class="pagination">
          <img src="/img/play_arrow_filled_left.svg" alt="Página anterio" />
          <img src="/img/play_arrow_filled.svg" alt="Próxima página" />
        </div>
      </main>
    </div>
  </body>
</html>
