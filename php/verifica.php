<?php
// Inicia sessões
session_start();

// Verifica se existe os dados da sessão de login
if(!isset($_SESSION["email"]) || !isset($_SESSION["cod_usuario"]))
{
// Usuário não logado! Redireciona para a página de login
header("Location: http://localhost/agendafacil/");
exit;
}

?>