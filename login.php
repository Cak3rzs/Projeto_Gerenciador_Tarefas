<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="login.css" />
</head>
<body>
  <div class="container">
    <div class="login">
      <form method="post">
        <h1>Login In</h1>
        <hr />
        <label>Email</label>
        <input type="text" name="email" placeholder="Email" />
        <label>Password</label>
        <input type="password" name="password" placeholder="Password" />
        <button type="submit"><span>Submit</span></button>
        <p><a href="cadastrar.php">Cadastre-se!</a></p>
      </form>
    </div>
  </div>

  <?php
  // Verifica se o método de requisição é POST
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Verifica se os campos foram enviados
      if (isset($_POST["email"]) && isset($_POST["password"])) {
          // Recupera os valores dos campos
          $email = $_POST["email"];
          $password = $_POST["password"];

          // Aqui você pode realizar a autenticação do usuário, por exemplo, verificar se o email e a senha correspondem a um usuário no seu banco de dados
          // Por simplicidade, vamos apenas exibir os dados enviados
          echo "<h2>Dados do formulário:</h2>";
          echo "<p><strong>Email:</strong> " . $email . "</p>";
          echo "<p><strong>Password:</strong> " . $password . "</p>";
      } else {
          echo "<p>Todos os campos são obrigatórios!</p>";
      }
  }
  ?>
</body>
</html>
