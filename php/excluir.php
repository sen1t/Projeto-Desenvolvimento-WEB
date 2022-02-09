<?php
     require "verifica.php";
     $nome = $_SESSION["nome"];
     $cod_usuario = $_SESSION["cod_usuario"];
?>

<?php

            $cod = $_GET['cod'];
            include "conexao.php";
        
             $query = "DELETE FROM compromissos WHERE cod = $cod ";
             $resultado = pg_query($query);
             $msg = pg_affected_rows($resultado);
    
            echo        "<script>
                     alert('Evento Excluido com sucesso!');
                     window.location = 'http://localhost/agendafacil/php/mostrar_compromissos.php';
                    </script>";
             exit();
            if(!$resultado){
            $msg_erro = preg_last_error();
             echo         "<script>
                    alert('Houve um erro ao tentar excluir!');
                    window.location = 'http://localhost/calendarioGs/php/principal.php';
                  </script>";
             exit();

        }

?>
