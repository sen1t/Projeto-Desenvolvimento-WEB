<?php
     require "verifica.php";

     $nome = $_SESSION["nome"];
     $cod_usuario = $_SESSION["cod_usuario"];


     include "conexao.php";


     $nome = $_POST['nome'];
     $endereco = $_POST['endereco'];
     $data = $_POST['data'];
     $hora = $_POST['hora'];

    //A condição abaixo testa se existe algum campo em branco, se houver o sistema fecha a conexão e volta para a tela de login
           
            if ((empty($nome)) || (empty($endereco) || (empty($data)) || (empty($hora)))){

                // Abaixo foi criado um alert em java script para informa ao usuário
                    echo "<script>
                            alert('Não Foi possivel prosseguir com a solicitação, existe(m) dado(s) em branco!');
                            window.location = 'http://localhost/agendafacil/php/principal.php';
                          </script>";
                    exit;
            }

    //Abaixo o sistema faz a consulta e verifica se o compromisso já está cadastrado   

            $query = pg_query("select * from compromissos") or die( pg_error($query));

            while($linha = pg_fetch_assoc($query)){
            // O if abaixo consulta se já existe o compromisso e a data, se existir o sistema retorna para o index e fecha a conexão    
                if(($nome == $linha['nome']) && ($data == $linha['data_compromisso'])){ 
                    echo "<script>
                            alert('Consta em nosso banco de dados, que já temos um compromisso com nome e data iguais ao que está sendo inseridos!');
                            window.location = 'http://localhost/agendafacil/php/principal.php';
                          </script>";
                    exit;      
                }
            }

    //Se a condição dentro do while for falsa o sistema fará a inclusão dos dados no banco
            
              $query = "INSERT INTO compromissos(nome,endereco,data_compromisso,hora_compromisso,cod_usuario) VALUES ( '$nome','$endereco','$data','$hora','$cod_usuario')";
                       
                    if(pg_query($db, $query)){
                        echo "<script>
                        alert('Evento Cadastrado com sucesso!');
                        window.location = 'http://localhost/agendafacil/php/principal.php';
                             </script>";
                         exit;                 
                    }else{
                        pg_query($db, $query);
                    }
                                   
?>