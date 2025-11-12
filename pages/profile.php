<?php require_once 'check.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Memória - Perfil</title>

    <link rel="stylesheet" href="../css/profile.css" />
    <link rel="stylesheet" href="../css/main.css" />

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
          <a href="profile.php" class="active">
            <img src="/img/person-circle.svg" class="menu-icon" alt="logo" />
            <p>Perfil</p>
          </a>

          <a href="history.php">
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
      <h2 class="title-hub">DADOS PESSOAIS</h2>
      <main class="main-container">
        
        <form class="profile-form">
          <div class="form-field">
            <label for="fullName">*Nome completo:</label>
            <input type="text" id="fullName" name="fullName" placeholder="Digite seu nome completo" required>
          </div>

          <div class="form-field">
            <label for="phone">*Telefone</label>
            <input type="tel" id="phone" name="phone" placeholder="(DDD) 90000-0000" required>
          </div>
          <div class="form-field">
            <label for="email">*E-mail</label>
            <input type="email" id="email" name="email" placeholder="example@domain.com" required>
          </div>
          <div class="form-field">
            <label for="emailConfirm">*Confirmação de e-mail</label>
            <input type="email" id="emailConfirm" name="emailConfirm" placeholder="Confirme seu e-mail" required>
          </div>
          <div class="form-field">
            <label for="password">*Senha</label>
            <input type="password" id="password" name="password" placeholder="Digite sua senha" required>
          </div>
          <div class="form-field">
            <label for="passwordConfirm">*Confirmação de senha</label>
            <input type="password" id="passwordConfirm" name="passwordConfirm" placeholder="Confirme sua senha" required>
          </div>
          <div id="form-actions">
            <button type="submit" class="btn-update">
              Atualizar Dados
              <img src="/img/check-lg.svg" alt="Confirmar" />
            </button>

            <button type="button" class="btn-cancel">
              Cancelar Ação
              <img src="/img/x-lg.svg" alt="Cancelar" />
            </button>
            
          </div> 
        </form>
      </main>
    </div>
  </body>
</html>
