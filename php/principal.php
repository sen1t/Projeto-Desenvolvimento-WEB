 <?php

     include "conexao.php";   
     require "verifica.php";

     $nome = $_SESSION["nome"];
     $cod_usuario = $_SESSION["cod_usuario"];


?>

<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" type="text/css" href="..\css\estiloprincipal.css" />
     <title>principal</title>
 </head>
 <body>
        <section class="principal">

            <section class="eventos_proximos">
                <p>Bem Vindo, <?php echo $nome ?>. Abaixo está seus eventos proximos.</p>

                <table border='1'>
                            <caption> Hoje é <?php date_default_timezone_set('America/Sao_Paulo');
                                                echo   $hoje = date('d/m/y');
                            ?>
                            </caption>
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
                <?php
                
                     include "conexao.php";
                     

                    $query = pg_query("select * from compromissos where data_compromisso >= '$hoje' and cod_usuario = $cod_usuario order by data_compromisso ASC limit 3 ") or die( pg_error($query));
                

                    while($linha = pg_fetch_assoc($query)){
                         echo "<tbody>"; 
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
             
                    }  

                
                ?>
                </form>
              </table>
            </section>

            <section class="cadastrar_evento">
                <header> <p> Cadastre seus eventos, E não perca mais nenhum compromisso!</p></header>
                         <form action="inserir_evento.php" method="post">

                             <p>
                                 <input type="text" name="nome" id="nomeid" placeholder="Qual é o compromisso?" required >
                             </p>

                             <p>

                                 <input type="text" name="endereco" id="enderecoid" placeholder="Qual é o Local?" required>
                             
                             </p>

                             <p>

                                <label for="data">DATA:</label>

                                      <input type="date" name="data" id="dataid" requider>

                                <label for="hora">HORA:</label>

                                      <input type="time" name="hora" id="hodaid" requider> 

                             </p>   

                             <P>
                                 <input type="submit" value="CADASTRAR EVENTO">
                             </P>

                         </form>
            </section>
        </section>

        <section class="footer">
            <footer>| Sistema Desenvolvido Por Gabriel Siqueira | Aluno do 2º Pedíodo ADS ESTÁCIO SE |</footer>
        </section>
 </body>
 </html>