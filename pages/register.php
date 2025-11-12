<?php require_once 'check.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="../css/register.css" />
    <link rel="stylesheet" href="../css/main.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Quantico:ital,wght@0,400;0,700;1,400;1,700&display=swap"
      rel="stylesheet"
    />
    <title>Memória - Cadastro</title>
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

    <div class="container">
      <h2 class="title-hub">CADASTRO</h2>

      <main class="main-container">
        <form class="profile-form">
          <div class="form-field">
            <label for="fullName">*Nome completo:</label>
            <input
              type="text"
              id="fullName"
              name="fullName"
              placeholder="Digite seu nome completo"
              required
            />
          </div>

          <div class="form-field">
            <label for="email">*E-mail</label>
            <input
              type="email"
              id="email"
              name="email"
              placeholder="example@domain.com"
              required
            />
          </div>

          <div class="form-field">
            <label for="username">*Nome de usuário</label>
            <input
              type="text"
              id="username"
              name="username"
              placeholder="Digite seu nome de usuário"
              required
            />
          </div>

          <div class="form-field">
            <label for="emailConfirm">*Confirmação de e-mail</label>
            <input
              type="email"
              id="emailConfirm"
              name="emailConfirm"
              placeholder="Confirme seu e-mail"
              required
            />
          </div>

          <div class="form-field">
            <label for="birthdate">*Data de nascimento</label>
            <input type="date" id="birthdate" name="birthdate" required />
          </div>

          <div class="form-field">
            <label for="password">*Senha</label>
            <input
              type="password"
              id="password"
              name="password"
              placeholder="Digite sua senha"
              required
            />
          </div>

          <div class="form-field">
            <label for="cpf">*CPF</label>
            <input
              type="text"
              id="cpf"
              name="cpf"
              placeholder="123.456.789-10"
              required
            />
          </div>

          <div class="form-field">
            <label for="passwordConfirm">*Confirmação de senha</label>
            <input
              type="password"
              id="passwordConfirm"
              name="passwordConfirm"
              placeholder="Confirme sua senha"
              required
            />
          </div>

          <div class="form-field">
            <label for="phone">*Telefone</label>
            <input
              type="tel"
              id="phone"
              name="phone"
              placeholder="(DDD) 90000-0000"
              required
            />
          </div>
          
            <button type="submit" id="btn-register">
              Criar conta
              <img src="/img/check-lg.svg" alt="Confirmar" />
            </button>

            <p id="exist-account">Já possui uma conta? <a href="/index.php">Entrar</a></p>
        </form>
      </main>
    </div>
  </body>
</html>
