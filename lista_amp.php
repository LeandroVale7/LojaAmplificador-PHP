<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Lista Amplificadores</title>
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
				<h1> AMPLIFICADORES </h1>
				<!--
					1º conectar no bd
					2º pesquisar marca, modelo, tipo, preço, situação e código
					3º extrair os dados pesquisados acima
					4º mostrar na tela (página) os dados extraídos 
				-->
			</div>

			<div class="div_esquerda">
			<?php
			        include "menu_local.php";
				?>
			</div>
			<div id = "funcionalidade" class="div_direita">

			<p align="left"> <a href="cadastra_amp.php"> Cadastrar Amplificador </a> </p>
				<?php
				    $conectar = mysqli_connect("localhost", "root", "", "335800");

					$sql_consulta = "SELECT marca_amp, modelo_amp,
					                        tipo_amp, preco_amp, fila_compra_amp, cod_amp
									FROM amplificadores"; /*isso tudo vai para $registro*/

					$resultado_consulta = mysqli_query($conectar, $sql_consulta);
				?>

			<table border = 1>
				
			     <tr>
					<td >
						<p> Marca </p>
					</td>
					<td>
						<p> Modelo </p>
					</td>
					<td>
						<p> Tipo </p>
					</td>
					<td>
						<p> Preço </p>
					</td>
					<td>
						<p> Situação </p>
					</td>
					<td>
						<p> Ação</p>
					</td>
                 </tr>
				 
				 <?php 
				  
				      while ($registro = mysqli_fetch_row( $resultado_consulta)){/* tira as linhas o select e coloca na variavel 
						                                                             registro*/
				?>

				<tr>
					<td>
						<p>
							<?php echo $registro[0]; ?>
						</p>
					</td>
					<td>
						<p>
							<a href="exibe_amp.php?codigo=<?php echo $registro[5]?>">
						    
							<?php echo "$registro[1]";?>
						    </a>
						</p>
					</td>
					<td>
						<p>
							<?php echo $registro[2];?>
						</p>
					</td>
					<td>
						<p>
							<?php echo $registro[3];?>
						</p>
					</td>
					<td>
						<p>
							<?php echo $registro[4];?>
						</p>
					</td>
					<td>
						<p>
						<a href="altera_amp.php?codigo=<?php echo $registro[5]?>">Alterar</a> 
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