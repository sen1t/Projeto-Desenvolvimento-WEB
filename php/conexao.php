<?php
$servidor = "localhost";
$porta = 5432;
$bancoDeDados = "agendafacil";
$usuario = 'postgres';
$senha = 'admin';

$db = pg_connect("host = $servidor port=$porta dbname=$bancoDeDados user=$usuario password=$senha");

if(!$db){
    echo "Falha na conexão!";
    exit;
}
?>