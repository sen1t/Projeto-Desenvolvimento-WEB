<?php


     include "conexao.php";

    
     $nome = $_POST['nome'];
     $data = $_POST['data_nascimento'];
     $email = $_POST['email'];
     $senha = $_POST['senha'];


     //A condição abaixo testa se existe algum campo em branco, se houver o sistema fecha a conexão e volta para a tela de login
           
            if ((empty($nome)) || (empty($email) || (empty($senha)) || (empty($data)))){

                // Abaixo foi criado um alert em java script para informa ao usuário
                    echo "<script>
                            alert('Não Foi possivel prosseguir com a solicitação, existe(m) dado(s) em branco!');
                            window.location = 'http://localhost/agendafacil/';
                          </script>";
                    exit;
            }

     //Abaixo o sistema faz a consulta e verifica se o usuário já está cadastrado   
            
            $query = pg_query("select email from usuarios") or die( pg_error($query));

            while($linha = pg_fetch_assoc($query)){
            // O if abaixo consulta se já existe o email se existir o sistema retorna para o index e fecha a conexão    
                if($email == $linha['email']){ 
                    echo "<script>
                            alert('Consta em nosso banco de dados, que já temos um usuario com esse email!');
                            window.location = 'http://localhost/agendafacil/';
                          </script>";
                    exit;      
                }
            }

            //Se a condição dentro do while for falsa o sistema fará a inclusão dos dados no banco
            
              $query = "INSERT INTO usuarios(nome,data_nascimento,email,senha) VALUES ( '$nome','$data','$email','$senha')";
                       
                    if(pg_query($db, $query)){
                        echo "<script>
                        alert('Usuário Cadastrado com sucesso!');
                        window.location = 'http://localhost/agendafacil/php/';
                             </script>";
                         exit;                 
                    }else{
                        pg_query($db, $query);
                    }
                         
              
    

?>