<?php
// Inicia a sessão
session_start();

// Destroi todas as variáveis de sessão
$_SESSION = array();

// Se houver um cookie de sessão, destrói-o também
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-42000, '/');
}

// Destroi a sessão atual
session_destroy();

// Redireciona o usuário para a página de login ou qualquer outra página desejada
header("Location: login.php");
exit;
?>
