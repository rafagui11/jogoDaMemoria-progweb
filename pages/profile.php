<?php
require_once 'check.php';
require_once '../db-connection.php';

$message = '';
$user_id = $_SESSION['user_id'];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nome = $_POST['fullName'];
  $email = $_POST['email'];
  $emailConfirm = $_POST['emailConfirm'];
  $telefone = $_POST['phone'];
  $senha = $_POST['password'];
  $senhaConfirm = $_POST['passwordConfirm'];

  if ($email != $emailConfirm) {
    $message = "Erro: Os e-mails não conferem.";
  } else if (!empty($senha) && $senha != $senhaConfirm) {
    $message = "Erro: As senhas não conferem.";
  } else {
    try {

      if (!empty($senha)) {
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
        $sql = "UPDATE usuarios SET nome_completo = ?, email = ?, telefone = ?, senha = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome, $email, $telefone, $senha_hash, $user_id]);
      } else {

        $sql = "UPDATE usuarios SET nome_completo = ?, email = ?, telefone = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome, $email, $telefone, $user_id]);
      }
      $message = "Dados atualizados com sucesso!";
    } catch (PDOException $e) {
      $message = "Erro ao atualizar: " . $e->getMessage();
    }
  }
}


try {
  $stmt = $pdo->prepare("SELECT nome_completo, email, telefone FROM usuarios WHERE id = ?");
  $stmt->execute([$user_id]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  die("Erro ao carregar perfil.");
}
?>
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
  <link href="https://fonts.googleapis.com/css2?family=Quantico:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet" />
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
          <img src="../img/play-fill.svg" class="menu-icon" alt="raking" />
          <p>Jogar</p>
        </a>
        <a href="profile.php" class="active">
          <img src="../img/person-circle.svg" class="menu-icon" alt="logo" />
          <p>Perfil</p>
        </a>
        <a href="history.php">
          <img src="../img/Subtract.svg" class="menu-icon" alt="history" />
          <p>Histórico</p>
        </a>
        <a href="rank.php">
          <img src="../img/trophy-fill.svg" class="menu-icon" alt="raking" />
          <p>Ranking</p>
        </a>
      </nav>
    </div>
  </div>

  <div class="container">
    <h2 class="title-hub">DADOS PESSOAIS</h2>
    <main class="main-container">

      <?php if (!empty($message)): ?>
        <p style="background-color: #333; color: white; padding: 10px; text-align: center; border-radius: 5px;">
          <?php echo $message; ?>
        </p>
      <?php endif; ?>

      <form class="profile-form" method="POST">
        <div class="form-field">
          <label for="fullName">*Nome completo:</label>
          <input type="text" id="fullName" name="fullName"
            value="<?php echo htmlspecialchars($user['nome_completo']); ?>" required>
        </div>

        <div class="form-field">
          <label for="phone">*Telefone</label>
          <input type="tel" id="phone" name="phone"
            value="<?php echo htmlspecialchars($user['telefone']); ?>" required>
        </div>
        <div class="form-field">
          <label for="email">*E-mail</label>
          <input type="email" id="email" name="email"
            value="<?php echo htmlspecialchars($user['email']); ?>" required>
        </div>
        <div class="form-field">
          <label for="emailConfirm">*Confirmação de e-mail</label>
          <input type="email" id="emailConfirm" name="emailConfirm"
            value="<?php echo htmlspecialchars($user['email']); ?>" required>
        </div>

        <hr style="border: 1px solid #444; margin: 20px 0;">
        <p style="color: #ccc; font-size: 0.9em;">Preencha abaixo apenas se quiser trocar a senha:</p>

        <div class="form-field">
          <label for="password">Nova Senha</label>
          <input type="password" id="password" name="password" placeholder="Nova senha">
        </div>
        <div class="form-field">
          <label for="passwordConfirm">Confirmação de senha</label>
          <input type="password" id="passwordConfirm" name="passwordConfirm" placeholder="Confirme a nova senha">
        </div>

        <div id="form-actions">
          <button type="submit" class="btn-update">
            Atualizar Dados
            <img src="../img/check-lg.svg" alt="Confirmar" />
          </button>

          <button type="button" class="btn-cancel" onclick="window.location.href='hub_partida.php'">
            Cancelar / Voltar
            <img src="../img/x-lg.svg" alt="Cancelar" />
          </button>
        </div>
      </form>
    </main>
  </div>
</body>

</html>