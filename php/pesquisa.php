<?php
//Inclui o script de conexão
include "conexao.php";
//Verifica se a sessão ainda está ativa
require "verifica.php";

$nome = $_SESSION["nome"];
$cod_usuario = $_SESSION["cod_usuario"];


$pesquisa = $_POST['pesquisar'];

//O codigo abaxio verifica se o campo pesquisa foi enviado nulo, se sim ele retorna para a tela principal
if(empty($pesquisa)){
    echo "<script>
    alert('O campo pesquisa está vazio!');
    window.location = 'http://localhost/agendafacil/php/principal.php';
    </script>";
}

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
        <section class="principal">
                <section class="compromissos">
                  <table border="1px">
                        <p>
                            Resultado Da Busca
                        </p>
                        <th>
                            Compromisso
                        </th>
                        <th>
                            Endereço
                        </th>
                        <th>
                            Data 
                        </th>
                        
                        <th>
                            Hora 
                        </th>
                        <th>
                            EDITAR
                        </th>
                        <th>
                            EXCLUIR
                        </th>

                
                        
                     <?php   
                          
                            $hoje = date('d/m/y');
                            $query = pg_query("select * from compromissos where nome = '$pesquisa' and cod_usuario = $cod_usuario ") or die( pg_error($query));
                            if(pg_num_rows($query)<= 0){
                                echo "<caption>Não encontramos dados referente a $pesquisa</caption>";
                                die();
                            }

                            while($dados = pg_fetch_assoc($query)){
                            $compromisso = $dados['nome'];
                            $endereco = $dados['endereco'];
                            $data = $dados['data_compromisso'];
                            $hora = $dados['hora_compromisso'];
                            $cod = $dados['cod'];
                            
                            echo "<tbody>";    
                   
                            echo "<td>";
                                  echo $compromisso ;
                            echo "</td>";
                            
                            echo "<td>";
                                echo $endereco;
                            echo"</td>";
                            
                            echo"<td>";
                                  echo $data  ;
                            echo"</td>";  

                             echo"<td>";
                                  echo $hora  ;
                            echo"</td>";
                            
                            echo"<td>";
                                 echo "<a href='editar.php?compromisso=$compromisso&endereco=$endereco&data=$data&hora=$hora&cod=$cod&opc=editar&cod_usuario=$cod_usuario'><img src='../imagens/editar.png' width='15px'> </a>" ;
                            echo"</td>";  
                            
                            echo"<td>";
                                 echo "<a href='excluir.php?cod=$cod&opc=delete&cod_usuario=$cod_usuario'><img src='../imagens/excluir.png' width='15px'> </a>" ;
                            echo"</td>";  
                            
                            
                            echo "</tbody>";            
                            }
                            
                            ?>
                     
                    </table>  
    </section>
</section>

<section class="footer">
            <footer>| Sistema Desenvolvido Por Gabriel Siqueira | Aluno do 2º Pedíodo ADS ESTÁCIO SE |</footer>
</section>
</body>
</html>

