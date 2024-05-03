<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>
  <link rel="stylesheet" href="cadastro.css">
</head>
<body>
  <div class="container">
    <div class="cadastro">
      <form method="post">
        <h1>Cadastro</h1>
        <hr />
        <label>Nome</label>
        <input type="text" name="nome" placeholder="Nome" required />
        <label>Email</label>
        <input type="email" name="email" placeholder="Email" required />
        <label>Senha</label>
        <input type="password" name="senha" placeholder="Senha" required />
        <label>Confirmar Senha</label>
        <input type="password" name="confirmar_senha" placeholder="Confirmar Senha" required />
        <button type="submit" name="cadastrar"><span>Cadastrar</span></button>
        <p>Já tem uma conta? <a href="login.php">Faça login!</a></p>
      </form>
    </div>
  </div>

  <?php
  // Verifica se o formulário foi enviado
  if (isset($_POST["cadastrar"])) {
      // Recupera os dados do formulário
      $nome = $_POST["nome"];
      $email = $_POST["email"];
      $senha = $_POST["senha"];
      $confirmar_senha = $_POST["confirmar_senha"];
      
      // Aqui você pode adicionar o código para validar os dados, verificar se o email já está em uso, etc.
      // Por simplicidade, vamos apenas exibir os dados enviados
      echo "<div class='container'>";
      echo "<div class='cadastro'>";
      echo "<h1>Dados cadastrados:</h1>";
      echo "<hr />";
      echo "<p><strong>Nome:</strong> " . $nome . "</p>";
      echo "<p><strong>Email:</strong> " . $email . "</p>";
      // Não exibimos senhas por motivos de segurança
      echo "</div>";
      echo "</div>";
  }
  ?>
</body>
</html>
