<?php
        // Inicia sessões

        session_start();


        include "conexao.php"; //Inclusão da página de conexão


         // As linhas a baixo recebe os valores dos campos index.html

         $email = $_POST['email'];
         $senha = $_POST['senha'];
    
        //A condição abaixo testa se existe algum campo em branco, se houver o sistema fecha a conexão e volta para a tela de login
           
            if ((empty($email)) || (empty($senha))){

        // Abaixo foi criado um alert em java script para informa ao usuário
                    echo "<script>
                            alert('Não Foi possivel prosseguir com a solicitação, existe(m) dado(s) em branco!');
                            window.location = 'http://localhost/agendafacil/';
                          </script>";
                    exit;
            } 

        //Abaixo o sistema faz a consulta e verifica se o usuário já está cadastrado   
            
        $verifica = pg_query("select * from usuarios where email = '$email' AND senha='$senha'") or die( pg_error($query));
        if(pg_num_rows($verifica)<= 0){ 
            echo"<script language='javascript' type='text/javascript'>
                        alert('E-mail e/ou senha incorretos');
                        window.location.href='http://localhost/agendafacil/';
                </script>";
            die();
        }else{

        
            $dados = pg_fetch_array($verifica);  
            $_SESSION["cod_usuario"] = $dados["cod_usuario"];
            $_SESSION["nome"] = $dados["nome"];
            $_SESSION["email"]= $dados["email"];
            header("Location: index.php");
            exit;

            
        }    
                    
    
?>