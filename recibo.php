<?php 
	session_start ();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/layout.css">
		<link rel="stylesheet" type="text/css" href="css/menu.css">
        <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
    </head>
    <body>
        <div id="principal">
			<div id="topo">
				<div id="logo">
					<h1> ROCK N´ROLL Amplificadores </h1>
					<h4> Controle de estoque e venda </h4>
				</div>
				<div class="menu_global">
					<ul>
						<li> <?php include "valida_login.php";?></li>
                        <li><a href="logout.php" class="active">Sair</a></li>                        
                    </ul>                
				</div>
			</div>
			<div id="conteudo_especifico">
				<div class="div_central centralizar">
					<h1> RECIBO</h1>
				
                    <?php
                    /* conectar no banco de dados
                    2º obter o código do funcionário logado no momento e a data 
                    3º inserir novo registro na tabela vendas 
                    4º pesquisar o código do registro inserido acima ( o último)
                    5º alterar o campo chave estrangeira da tabela amplificadores de null para o código acima nos produtos em negociação no momento 
                    mudando também a situação para "v"(vendido) 
                    6º pesquisar o que foi vendido em função do código da venda obtido acima
                    7º extrair os dados da pesquisa acima
                    8º exibir os dados da extração acima*/ 

                    $conectar = mysqli_connect("localhost", "root", "", "335800");

                    // inserindo um registro novo na tabela venda para iniciar o processo de registro/cadastro de uma nova venda
                    $data = date ('d/m/Y');
                    $cod_fun = $_SESSION ['codigo'];

                    $sql_registro_venda = "INSERT  INTO vendas
                                                        (data_ven, funcionarios_cod_fun)
                                            VALUES      ('$data','$cod_fun')";
                    
                    $resultado_registro_venda = mysqli_query($conectar, $sql_registro_venda);
                    //pesquisando e extraindo da pesquisa feita o código da última venda para colocá-lo posteriormente na tabela
                    //dos AMPLIFICADORES para indetificar em que venda o amplifcador está 

                    $sql_consulta_ultima_venda = "SELECT cod_ven FROM vendas ORDER BY cod_ven DESC LIMIT 1";

                    $resultado_consulta = mysqli_query ($conectar, $sql_consulta_ultima_venda);

                    $registro_cod_ven = mysqli_fetch_row ($resultado_consulta);

                    //alteração no campo chave estrangeira na tabela AMPLIFICADORES servirá para saber em que venda está (ou estão)
                    //o (S) amplificador(es)

                    $sql_codigo_venda_em_amp = "UPDATE amplificadores
                                                SET    vendas_cod_ven = '$registro_cod_ven[0]',
                                                       fila_compra_amp = 'V'
                                                WHERE  fila_compra_amp = 'S'";
                                            
                    $resultado_alteracao_amp = mysqli_query ($conectar, $sql_codigo_venda_em_amp);

                    //exibição dos dados do recibo 

                    $sql_consulta_recibo = "SELECT marca_amp, modelo_amp, preco_amp
                                            FROM   amplificadores 
                                            WHERE  vendas_cod_ven = '$registro_cod_ven[0]'";
                    
                    $resultado_consulta = mysqli_query ($conectar, $sql_consulta_recibo);
                    echo "<p> Venda nº: $registro_cod_ven[0]</p>";
                    echo "<p> Data: $data</p>";
                ?>

                <table> 
                    <tr>
                        <td> Marca </td>
                        <td> Modelo </td>
                        <td> Preço</td>
                    </tr>
                 <?php
                    $valor_total = 0;
                    while ($registro = mysqli_fetch_row($resultado_consulta)){
                       ?>
                    <tr>
                        <td> <?php "$registro[0]"; ?> </td>
                        <td> <?php "$registro[1]";?> </td>
                        <td>
                            <?php 
                                echo "$registro[2]";
                                $valor_total = $valor_total + $registro[2];
                            ?>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
                <p> Total: <?php echo $valor_total; ?> </p>
                <p> <a href = "vendas.php"> Fechar recibo </a> </p>
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