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
    <link rel="stylesheet" type="text/css" href="..\css\estilocompromissos.css" />
    <title>Editar-Eventos</title>
</head>
<body>
    <?php
    //Abaixo o sistema pega os dados da pagina compromissos
        $cod =  $_GET['cod'];
         $compromisso =  $_GET['compromisso'];
         $endereco =  $_GET['endereco'];
         $data =  $_GET['data'];
         $hora =  $_GET['hora'];
   ?>
    <section class="principal">
         <section class="cabecalho">
            <header> Gostaria De Editar o compromisso abaixo? </header>
        </section>

         <section class="compromissos">
            <form action="editar.php" method="post">
                    <p>
                        <label for="id">ID: </label>
                        <input type="text" name="cod" id="codid" size="2" disabled="disabled" value="<?php echo $cod ?>">
                    </p>

                    <input type="hidden" name="cod" value="<?php echo $cod ?>">

                    <p>
                         <label for="compromisso">EVENTO: </label>
                         <input type="text" name="compromisso" id="compromissoid" required  size="30" value="<?php echo $compromisso?>">
                    </p>
                    <p>
                         <label for="endereco">LOCAL: </label>
                         <input type="text" name="endereco" id="enderecoid" required size="30" value="<?php echo $endereco?>">
                    </p>

                    <p>
                         <label for="data">DATA: </label>
                         <input type="date" name="data" id="datacoid" required size="30" value="<?php echo $data?>">
                    </p>

                    <p>
                         <label for="hora">HORA: </label>
                         <input type="time" name="hora" required id="horacoid" size="30" value="<?php echo $hora?>">
                    </p>
                    <p>
                        <input type="hidden" name="editar">
                    </p>

                    <P>
                        <input type="submit" value="EDITAR EVENTO">
                        <BUTTon><a href="mostrar_compromissos.php">VOLTAR</a></BUTTon>
                    </P>    

        
            </form>
         </section>    

</section>
<section class="footer">
            <footer>| Sistema Desenvolvido Por Gabriel Siqueira | Aluno do 2º Pedíodo ADS ESTÁCIO SE |</footer>
</section>
</body>
</html>




 <?php  
     require "verifica.php";
     include "conexao.php";
    
     $nome = $_SESSION["nome"];
     $cod_usuario = $_SESSION["cod_usuario"];


        if((!empty($_POST['cod'])) && (!empty($_POST['compromisso'])) && (!empty($_POST['endereco'])) && (!empty($_POST['data'])&& (!empty($_POST['hora'])))) {
            $upCod = $_POST['cod'];
            $upCompromisso = $_POST['compromisso'];
            $upEndereco = $_POST['endereco'];
            $upData = $_POST['data'];
            $upHora = $_POST['hora'];
            $query = "UPDATE compromissos SET nome = '$upCompromisso', endereco='$upEndereco', data_compromisso='$upData', hora_compromisso='$upHora'  WHERE cod = $upCod and cod_usuario = $cod_usuario";
            $resultado = pg_query($query);
            $msg = pg_affected_rows($resultado);

                  echo "<script>
                    alert('Evento editado com sucesso!');
                    window.location = 'http://localhost/agendafacil/php/principal.php';
                  </script>";

            if(!$resultado){
                "<script>
                    alert('Infelizmente Tivemos um problema!');
                    window.location = 'http://localhost/agendafacil/php/principal.php';
                  </script>";
            }

        }
    
?>