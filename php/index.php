<?php
require "verifica.php";

$nome = $_SESSION["nome"];
$cod_usuario = $_SESSION["cod_usuario"];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Pagina Principal</title>
</head>
    <frameset rows="25%,*" border="0">
        <frame name="menu"  NORESIZE   scrolling="no" src="menu.php" target="principal"></frame>
        <frame name="principal"  scrolling="no" NORESIZE   src="principal.php">  </frame>
    </frameset>
</html>