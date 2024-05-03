<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sua Conta</title>
  <link rel="stylesheet" href="home.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
  <div class="container">
    <nav>
      <div class="navbar">
        <div class="logo">
          <h1>Task Sync Hub</h1>
        </div>
        <ul>
          <li></li>
          </a>
          </li>
          <li><a href="Tarefas.html">
            <i class="fas fa-tasks"></i>
            <span class="nav-item">Suas Tarefas</span>
          </a>
          </li>
          <li><a href="help.html">
            <i class="fas fa-question-circle"></i>
            <span class="nav-item">Help</span>
          </a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="welcome-message">
      <h1>Bem-vindo à sua conta!</h1>
      <p>Aqui você pode visualizar e gerenciar suas informações de usuário.</p>
      <div class="user-info">
        <!-- Informações do usuário -->
        <form method="post">
          <p><strong>Nome:</strong> <input type="text" name="name" value="John Doe"></p>
          <p><strong>Email:</strong> <input type="text" name="email" value="john.doe@example.com"></p>
          <p><strong>Telefone:</strong> <input type="text" name="phone" value="(123) 456-7890"></p>
          <p><strong>Data de Registro:</strong> 01/01/2024</p>
          <!-- Botões de ação -->
          <button type="submit" name="submit">Salvar Alterações</button>
        </form>
      </div>
    </div>
  </div>
  <?php
  // Verifica se o formulário foi enviado
  if (isset($_POST["submit"])) {
      // Recupera os dados do formulário
      $name = $_POST["name"];
      $email = $_POST["email"];
      $phone = $_POST["phone"];
      
      // Aqui você pode adicionar o código para atualizar as informações do usuário no banco de dados
      // Por simplicidade, vamos apenas exibir as informações atualizadas
      echo "<div class='container'>";
      echo "<div class='welcome-message'>";
      echo "<h1>Informações atualizadas:</h1>";
      echo "<div class='user-info'>";
      echo "<p><strong>Nome:</strong> " . $name . "</p>";
      echo "<p><strong>Email:</strong> " . $email . "</p>";
      echo "<p><strong>Telefone:</strong> " . $phone . "</p>";
      echo "<p><strong>Data de Registro:</strong> 01/01/2024</p>";
      echo "</div>";
      echo "</div>";
      echo "</div>";
  }
  ?>
</body>
</html>
