<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lista de Funcionário</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
</head>

<body>
    <div id="principal">
        <div id="topo">
            <div id="logo">
                <h1> ROCK N'ROLL Amplificadores </h1>
                <h4> Controle de estoque e venda </h4>
            </div>
            <div id="menu_global" class="menu_global">
                <ul>
                    <li>Olá Administrador do Sistema</li>
                    <li><a href="index.php" class="active">Home</a></li>
                </ul>
            </div>
        </div>
        <div id="conteudo_especifico">
            <div class="div_central centralizar">
                <h1> FUNCIONÁRIOS </h1>

                <!-- 
                    1º Pesquisar o que se quer mostrar 
                    2º extrair os dados da pesquisa 
                    3º mostrar o que foi extraído 
                    essas 3 coisas acontecem o tempo todo 
                -->

                <!-- 
                    1º Conectar no bd 
                    2º Pesquisar o cod, nome, função e status (select/mysqli_query)
                    3º Extrair cada dado da pesquisa acima(fecth_row)
                    4º Exibir cada dado extraído acima  (exibir em html: tabela)
                    passo 4 e 3 precisam estar em loop
                -->

            </div>
            <div class="div_esquerda menu_local">
            <?php
			        include "menu_local.php";
				?>
            </div>
            <div class="div_direita">
                <p> 
                    <a href="cadastra_fun.php"> Cadastro de funcionário </a>
                </p>

                <?php
                    $conectar = mysqli_connect("localhost","root","", "335800");

                    $sql_consulta = "SELECT  cod_fun, nome_fun, funcao_fun, status_fun
                                     FROM  funcionarios";

                    $resultado_consulta = mysqli_query ($conectar, $sql_consulta);
                ?>

                <table border=1>
                    <tr>
                        <td class="esquerda">

                            <p> Nome </p>
                            
                        </td>
                        <td>

                            <p> Função </p>
                           
                        </td>
                        <td>

                            <p> Status </p>
                           
                        </td>
                        <td>

                            <p> Ação </p>
                          
                        </td>
                    </tr>

                <?php
                    
                    while($registro = mysqli_fetch_row($resultado_consulta))
                    {
                
            ?>
                <tr>
                    <td>
                        <p>
                            <a href="exibe_fun.php?codigo=<?php echo $registro[0];?>">
                        
                            <?php
                                 echo "$registro[1]";
                            ?>
                           </a>
                        </p>
                    </td>
                    <td>
                        <p>
                            <?php 
                                 echo "$registro[2]";
                            ?>
                        </p>
                    </td>
                    <td>
                        <p>
                            <?php
                                  echo "$registro[3]";
                            ?>
                        </p>
                    </td>
                    <td>
                        <p>
                        <a href="altera_fun.php?codigo=<?php echo $registro[0]?>">
                            Alterar 
                        </p>
                    </td>
                </tr>
                <?php
                    }
                ?>
                </table>
            </div>
        </div>
        <div id="rodape">
            <div id="texto_institucional">
                <h6> AMPLI - CONTROL </h6>
                <h6> Rua do Rock, 666 -- E-mail: contato@ampli_control.com.br -- Fone: (61) 9966 - 6677 </h6>
            </div>
        </div>
    </div>
</body>

</html>