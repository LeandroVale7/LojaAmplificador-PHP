<?php
session_start(); 
#uma sessão é o que identifica o usuário. A função só deverá sr usada uma vezz após o login do usuário

/*uando se utiliza o session_start() é criado (ou utilizado) o cookie de PHPSESSID com um valor que deve ser único,
 isso permite que o usuário navegue em várias páginas e seja sempre reconhecido pelo mesmo cookie e portanto pela
  mesma sessão.*/ 

#mysqli mais fácil e básica de usar

#root = usuário padão 

/* a conexão com o banco, usando a função mysqli, deve estar contida a uma variável, desta forma:*/
  $conectar = mysqli_connect ("localhost", "root","", "335800"); #estilo procedural 
#variável responsável por salvar o identificador da conexão($conectar)
    /* Página que recebe informações da index*/
    $login = $_POST["login"];
    $senha = $_POST["senha"];

   /*login é unico
   *processa login: -> conectar no bd, -> receber o login e a senha, -> verificar no bd se o login e a senha batem,
   se bater vai para administração.php, senão; msg de erro, volta para o servidor */

    $sql_consulta = "SELECT cod_fun, nome_fun, login_fun, senha_fun, status_fun, funcao_fun
                    FROM funcionarios
                    WHERE 
                          login_fun = '$login'
                    AND 
                          senha_fun = '$senha'
                    AND 
                          status_fun = 'A'";

    #query ação direto no banco de dados
    $resultado_consulta= mysqli_query ($conectar, $sql_consulta);  #query com SQL(select) retorna uma tabela

    /*toda função retorna alguma coisa, o query quando tem select, ele sempre retorna uma tabela, se der um echo
    na tabela
    tem que tirar de dentro da tabela e usar o fetch row(senão, não mostra a tabela), colocando 6 dados dentro
    o registro*/ 

    $linhas = mysqli_num_rows ($resultado_consulta);  #num row retorna a quantidade de linhas

    #saber se a conexão deu errado ou não:
    if($linhas == 1){

      $registro = mysqli_fetch_row ($resultado_consulta);

       /*será utilizado para ler, mostrar e gravar as informações da respectiva sessão, melhor dizendo, o $_SESSION é 
       usado para
       ler os dados do arquivo da sessão.*/

      $_SESSION["codigo"] = $registro[0];
      $_SESSION["nome"] = $registro[1];
      $_SESSION["funcao"] = $registro[5];

        echo "<script>
                    location.href = ('administracao.php')
              </script>";
    }
    else{
        echo "<script>
                   alert ('Login ou Senha Incorretos! Digite Novamente!!!')
             </script>";
        echo "<script>
                    location.href = ('index.php') 
             </script>";
    }
  
?>