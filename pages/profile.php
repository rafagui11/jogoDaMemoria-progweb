<?php

require_once 'auth_check.php';
require_once './db-connection.php';

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
            // Se a senha FOI preenchida, atualiza a senha
            if (!empty($senha)) {
                $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
                $sql = "UPDATE usuarios SET nome_completo = ?, email = ?, telefone = ?, senha = ? WHERE id = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$nome, $email, $telefone, $senha_hash, $user_id]);
            } else {
                // Se a senha NÃO foi preenchida, atualiza o resto
                $sql = "UPDATE usuarios SET nome_completo = ?, email = ?, telefone = ? WHERE id = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$nome, $email, $telefone, $user_id]);
            }
            $message = "Dados atualizados com sucesso!";
        } catch (PDOException $e) {
            if ($e->errorInfo[1] == 1062) {
                $message = "Erro: Este e-mail já está em uso por outra conta.";
            } else {
                $message = "Erro ao atualizar os dados: " . $e->getMessage();
            }
        }
    }
}

// 4. LÓGICA DE GET (sempre executa para buscar os dados do usuário)
try {
    $stmt = $pdo->prepare("SELECT nome_completo, email, telefone FROM usuarios WHERE id = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        // Isso não deve acontecer se o auth_check funcionar
        throw new Exception("Usuário não encontrado.");
    }
} catch (Exception $e) {
    die("Erro ao carregar dados do usuário: " . $e->getMessage());
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
      <a href="../index.php" class="btn-sair">
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
        <p style="color:white; background: #2a2a2a; padding: 15px; text-align:center; border-radius: 5px; font-size: 1.1em;">
          <?php echo $message; ?>
        </p>
      <?php endif; ?>

      <form class="profile-form" method="POST">
        <div class="form-field">
          <label for="fullName">*Nome completo:</label>
          <input type="text" id="fullName" name="fullName" placeholder="Digite seu nome completo" 
                 value="<?php echo htmlspecialchars($user['nome_completo']); ?>" required>
        </div>

        <div class="form-field">
          <label for="phone">*Telefone</label>
          <input type="tel" id="phone" name="phone" placeholder="(DDD) 90000-0000" 
                 value="<?php echo htmlspecialchars($user['telefone']); ?>" required>
        </div>
        <div class="form-field">
          <label for="email">*E-mail</label>
          <input type="email" id="email" name="email" placeholder="example@domain.com" 
                 value="<?php echo htmlspecialchars($user['email']); ?>" required>
        </div>
        <div class="form-field">
          <label for="emailConfirm">*Confirmação de e-mail</label>
          <input type="email" id="emailConfirm" name="emailConfirm" placeholder="Confirme seu e-mail" 
                 value="<?php echo htmlspecialchars($user['email']); ?>" required>
        </div>
        <div class="form-field">
          <label for="password">Nova Senha</label>
          <input type="password" id="password" name="password" placeholder="Deixe em branco para não alterar">
        </div>
        <div class="form-field">
          <label for="passwordConfirm">Confirmação da nova senha</label>
          <input type="password" id="passwordConfirm" name="passwordConfirm" placeholder="Confirme a nova senha">
        </div>
        <div id="form-actions">
          <button type="submit" class="btn-update">
            Atualizar Dados
            <img src="../img/check-lg.svg" alt="Confirmar" />
          </button>
          <button type="button" class="btn-cancel">
            Cancelar Ação
            <img src="../img/x-lg.svg" alt="Cancelar" />
          </button>
        </div>
      </form>
    </main>
  </div>
</body>
</html>