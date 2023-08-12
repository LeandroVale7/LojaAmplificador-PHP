<?PHP
/*1º coisa a fazer: 
conexão com banco de dados

2º receber nome, função, login e senha

3º verificar (select) se o login recebido já existe
se existir: msg de erro( login já existe) 
--> voltar para cadastra_fun.php 

senão: insere o user(funcionário) no bd

se inseriu:
*msg de sucesso
*voltar para cadastra_fun.php 

senão:
*msg de erro
*voltar para cadastra_fun.php*/ 


/*estabeler a conexão com bd*/ 
$conectar = mysqli_connect ("localhost", "root", "", "335800");

#receber nome, função login e senha
$nome = $_POST["nome"];
$login =  $_POST["login"];
$senha = $_POST["senha"];
$funcao = $_POST["funcao"];

#pesquisar no bd se já existe o login que foi recebido acima
$sql_consulta = "SELECT login_fun FROM funcionarios
                 where login_fun = '$login'";

#faz a ação diretamente com o banco (query) query com select retorna tabela
$resultado_consulta = mysqli_query ($conectar, $sql_consulta);

#variavel que recebeu o resultado_consulta, conta qntas linhas tem na tabela e armazena 
$linhas = mysqli_num_rows ($resultado_consulta);

if($linhas == 1){

    echo "<script>
                alert ('Login já cadastrado. Tente outro!')
          </script>";

    echo "<script>
                location.href = ('cadastra_fun.php')
          </script>";
}
else{ #para o usuario que não existe
    
    $sql_cadastrar = "INSERT INTO funcionarios
                                  (nome_fun,
                                  funcao_fun,
                                  login_fun,
                                  senha_fun)
                        VALUES
                                  ('$nome',
                                  '$funcao',
                                  '$login',
                                  '$senha')";
    
    $resultado_cadastrar = mysqli_query ($conectar, $sql_cadastrar);

    if($resultado_cadastrar == true){
       
        echo "<script>
                    alert ('$nome cadastrado com sucesso')
              </script>";

        echo "<script>
             location.href = ('cadastra_fun.php')
             </script>";
    }
    else{

        echo "<script>
                    alert ('ocorreu um erro no servidor. Tente novamente')
             </script>";

        echo "<script>
             location.href = ('cadastra_fun.php')
             </script>";
 
    }

}

?>