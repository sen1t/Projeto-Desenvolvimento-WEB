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
    <title>Mostrar Compromissos</title>

</head>
  

<body>
     <section class="principal">

            <section class="compromissos">
                <p>Caso não encontre o evento, pesquise ao lado.</p>
                <section class="pesquisa">
                    <form action="pesquisa.php" method="POST">
                        <input type="search" name="pesquisar" placeholder="PESQUISAR">
                    <button>Pesquisar</button>
                </section>
                </form>
                <table border='1'>
                            </caption>
                                <th>
                                    ID
                                </th>
                                <th>
                                     EVENTO   
                                </th>
                             
                                 <th>
                                     ENDEREÇO   
                                 </th>

                                 <th>
                                     DATA   
                                 </th>

                                 <th>
                                     HORA   
                                 </th> 

                                 <th>
                                    EDITAR
                                 </th>

                                 <th>
                                    EXCLUIR
                                 </th>
                <?php
                
                     include "conexao.php";
                     

                     $query = pg_query("select * from compromissos where  cod_usuario = $cod_usuario order by data_compromisso ASC limit 9 ") or die( pg_error($query));
                    
                     $hoje = date('d/m/y');
                    
                     while($linha = pg_fetch_assoc($query)){
                            $cod = $linha['cod'];
                            $nome = $linha['nome'];
                            $endereco = $linha['endereco'];
                            $data = $linha['data_compromisso'];
                            $hora = $linha['hora_compromisso'];

                         echo "<tbody>"; 

                             echo "<td>";
                                 echo $cod;
                             echo "</td>";

                             echo "<td>";
                                 echo $linha['nome'];
                             echo "</td>";
                             
                             echo "<td>";
                                 echo $linha['endereco'];
                             echo "</td>";

                             echo "<td>";
                                 echo date("d/m/y", strtotime( $linha['data_compromisso']));
                             echo "</td>";

                             echo "<td>";
                                 echo $linha['hora_compromisso'];
                             echo "</td>";

                             echo"<td>";
                                 echo "<a href='editar.php?compromisso=$nome&endereco=$endereco&data=$data&hora=$hora&cod=$cod&cod_usuario=$cod_usuario'><img src='../imagens/editar.png' width='15px'> </a>" ;
                             echo"</td>";  
                             
                             echo"<td>";
                                echo "<a href='excluir.php?cod=$cod&opc=delete&cod_usuario=$cod_usuario'><img src='../imagens/excluir.png' width='15px'> </a>" ;     
                             echo"</td>"; 
             
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

