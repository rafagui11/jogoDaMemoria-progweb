<?php
session_start(); // Inicia a sessão
require_once 'db-connection.php'; // Puxa a conexão

// 1. Se o usuário JÁ ESTÁ LOGADO, manda para o hub
if (isset($_SESSION['user_id'])) {
  header("Location: pages/hub_partida.php");
  exit();
}

$error_message = '';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $user_input = $_POST['user'];
  $password = $_POST['password'];

  if (empty($user_input) || empty($password)) {
    $error_message = "Usuário e senha são obrigatórios.";
  } else {
    // 3. Busca o usuário no banco
    $stmt = $pdo->prepare("SELECT id, username, senha FROM usuarios WHERE email = :user_input OR username = :user_input");
    $stmt->execute(['user_input' => $user_input]);
    $user = $stmt->fetch();

    // 4. Verifica se o usuário existe E se a senha está correta
    if ($user && password_verify($password, $user['senha'])) {
      // Sucesso! Armazena os dados na sessão
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['username'] = $user['username'];

      // Redireciona para o hub
      header("Location: pages/hub_partida.php");
      exit();
    } else {
      // Falha
      $error_message = "Usuário ou senha inválidos.";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
...

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/main.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quantico:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

  <title>Memória-Login</title>

</head>

<body>

  <div id="Formulario">
    <div class="logo">
      <img src="img/head-logo.svg" alt="logo" class="head-logo left">
      <h1 id="memoria-text">MEMÓRIA</h1>
      <img src="img/head-logo.svg" alt="logo" class="head-logo right">
    </div>

    <h2>LOGIN</h2>

    <?php if (!empty($error_message)): ?>
      <p style="color:red; text-align:center;"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <form method="POST">

      <input
        placeholder="Usuário"
        required
        id="user"
        type="text"
        name="user"
        size="20">

      <input
        placeholder="Senha"
        type="password"
        id="password"
        name="password"
        required>

      <a href="./pages/register.php" id="botao-criar-conta">Criar Conta</a>

      <button type="submit" id="botao-entrar" style="border: none; background: none; cursor: pointer;">
        <img src="img/submit.svg" alt="submit">
      </button>

    </form>
    <p id="footer">Todos os Direitos Reservados</p>
  </div>

</body>

</html>