<!DOCTYPE html>
<html lang="en">
<head>
  <title>Job Dashboard | By Code Info</title>
  <link rel="stylesheet" href="home.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
    $(function() {
      $("#datepicker").datepicker({
        onSelect: function(dateText, inst) {
          $(".filter").val(dateText);
        }
      });
    });

    // Função para marcar a tarefa como concluída
    function marcarConcluida(tarefa_id) {
      $.ajax({
        url: 'marcar_concluida.php', // Arquivo PHP para processar a marcação como concluída
        method: 'POST',
        data: { tarefa_id: tarefa_id },
        success: function(response) {
          // Atualizar a interface do usuário após a marcação como concluída
          alert('Tarefa marcada como concluída!');
          location.reload(); // Recarregar a página para refletir as mudanças
        },
        error: function(xhr, status, error) {
          console.error(error);
          alert('Erro ao marcar a tarefa como concluída.');
        }
      });
    }

    // Função para excluir a tarefa
    function excluirTarefa(tarefa_id) {
      if (confirm('Tem certeza de que deseja excluir esta tarefa?')) {
        $.ajax({
          url: 'excluir_tarefa.php', // Arquivo PHP para processar a exclusão da tarefa
          method: 'POST',
          data: { tarefa_id: tarefa_id },
          success: function(response) {
            // Atualizar a interface do usuário após a exclusão
            alert('Tarefa excluída!');
            location.reload(); // Recarregar a página para refletir as mudanças
          },
          error: function(xhr, status, error) {
            console.error(error);
            alert('Erro ao excluir a tarefa.');
          }
        });
      }
    }
  </script>
</head>
<body>

<section class="main">
  <div class="main-body">
    <h1>Adicionar Tarefas:</h1>
  
    <div class="search_bar">
      <form method="post">
        <input type="text" name="task" placeholder="Fale sobre sua tarefa">
        <select name="category">
          <option value="1">Urgente</option>
          <option value="2">Importante</option>
          <option value="3">Normal</option>
        </select>
        <input type="text" class="filter" name="date" placeholder="Selecione uma data" id="datepicker">
        <input type="submit" value="Adicionar">
      </form>
    </div>
  </div>
</section>

<section class="main">
  <div class="main-body">
    <h1>Suas Tarefas:</h1>
  
    <div class="tarefas">
      <!-- Aqui você pode exibir as tarefas recuperadas do banco de dados -->
      <?php
      // Conexão com o banco de dados
      $servername = "localhost"; // Se o servidor estiver em localhost
      $username = "root"; // Seu nome de usuário do MySQL
      $password = ""; // Sua senha do MySQL
      $dbname = "gerenciamento_de_tarefa"; // Nome do seu banco de dados

      // Cria conexão
      $conn = new mysqli($servername, $username, $password, $dbname);

      // Verifica a conexão
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // Consulta SQL para recuperar as tarefas do usuário atual
      $sql = "SELECT * FROM Tarefa WHERE usuario_id = ?";

      // Prepara a declaração
      $stmt = $conn->prepare($sql);

      // Vincula os parâmetros
      $stmt->bind_param("i", $usuario_id);

      // Define o ID do usuário (supondo que você tenha essa informação)
      $usuario_id = 1; // Altere para o ID do usuário atual

      // Executa a consulta
      $stmt->execute();

      // Obtem os resultados
      $result = $stmt->get_result();

      // Exibe as tarefas
      while ($row = $result->fetch_assoc()) {
          echo "<div class='tarefa'>";
          echo "<h3>" . $row['descricao'] . "</h3>";
          echo "<p>Categoria: " . $row['categoria_id'] . "</p>"; // Aqui você pode exibir o nome da categoria ao invés do ID
          echo "<p>Data de Vencimento: " . $row['data_vencimento'] . "</p>";
          echo "<p>Status: " . $row['status'] . "</p>";
          echo "<p>Prioridade: " . $row['prioridade'] . "</p>";
          echo "<button onclick='marcarConcluida(" . $row['tarefa_id'] . ")'>Marcar como Concluída</button>";
          echo "<button onclick='excluirTarefa(" . $row['tarefa_id'] . ")'>Excluir</button>";
          echo "</div>";
      }

      // Fecha a conexão
      $conn->close();
      ?>
    </div>
  </div>
</section>

</body>
</html>
