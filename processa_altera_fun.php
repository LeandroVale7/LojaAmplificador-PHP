<?php

/* 1º conectar no banco de dados*/
$conectar = mysqli_connect ("localhost", "root", "", "335800");
/*
   2º receber o  código 
    se for admin:
        *recebe somente a senha
        *efetuar a alteração em função do código
    */
    $cod = $_POST["codigo"];
    $funcao = $_POST["funcao"];
    if ($funcao == "administrador"){

        $senha = $_POST["senha"];
        $sql_altera = "UPDATE funcionarios 
                       SET  
                              senha_fun = '$senha'
                        WHERE 
                              cod_fun = '$cod'";

        $sql_resultado_alteracao = mysqli_query ($conectar, $sql_altera);
        
    /*
    se alterou:
        * msg de sucesso
        * voltar para lista_fun.php 
        */
        if($sql_resultado_alteracao == true){
            echo "<script>
                alert ('Senha do administrador alterada com sucesso')
                </script>";

            echo "<script>
                location.href = ('lista_fun.php')
                </script>";
               exit(); /*para a compilação do programa*/
        }
       
    /*
    senão: 
        * msg de erro
        *voltar para altera_fun.php
    */
        else{
            echo "<script>
                alert ('Ocorreu um erro no servidor. A senha do administrador não foi alterada. Volte e tente de novo')
                </script>";
                
            echo "<script>
                location.href = ('altera_fun.php?codigo_funcionario=<?php echo $cod;?>')
                </script>";
                exit();
        }
    
    } /*
        ----------------------------
    senão for admin: 
        * recebe nome, função, login, senha, status e código
        * pesquisar se o login recebido já existe*/
    
    
    else{
        $nome = $_POST["nome"];
        $login = $_POST["login"];
        $senha = $_POST["senha"];
        $status = $_POST["status"];
        $funcao = $_POST["funcao"];

        $sql_pesquisa = "SELECT login_fun FROM funcionarios
                          WHERE login_fun = '$login'
                          AND   cod_fun <> '$cod'"; /*diferente --> <>*/
        
        $sql_resultado = mysqli_query ($conectar, $sql_pesquisa);

        $linhas = mysqli_num_rows ($sql_resultado);
    
    }    /*
    se encontrar o login: 
        * msg de login já existente 
        * voltar para altera_fun.php 
        */
        if ($linhas == 1){
            echo "<script>
                  alert ('Login do funcionário já existente. Tente de novo!')
                  </script>";

            echo "<script>
                 location.href = ('altera_fun.php?codigo=$cod')
                  </script>";
                  exit();
        }
          /*
    senão encontrar:
        * efetua a alteração em função do código recebido*/
        else{
            $sql_altera = "UPDATE funcionarios 
                           SET  nome_fun = '$nome',
                                funcao_fun = '$funcao',
                                login_fun = '$login',
                                senha_fun = '$senha',
                                status_fun = '$status'
                                
                            WHERE cod_fun = '$cod'";

           $sql_resultado_alteracao = mysqli_query ($conectar, $sql_altera);
           
        
        } 
         /*  
          se alterar: 
         * msg de sucesso 
         * voltar para altera_fun.php */

        if($sql_resultado_alteracao == true){
            echo "<script>
                  alert ('$nome alterado com sucesso')
                  </script>";

            echo "<script>
                 location.href = ('lista_fun.php')
                 </script>";
                 exit();
          
        }
      
   /*
    senão: 
        * msg de erro 
        * voltar para altera_fun.php 
   */
        else{
            echo "<script>
                alert ('Ocorreu um erro no servidor. Dados do funcionário não foram alterados. Tente de novo')
                </script>";
            
            echo "<script>
                location.href = ('altera_fun.php?codigo=<?php echo $cod;?>')
                </script>";
                exit();
        }
    
?>

