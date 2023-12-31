﻿<?php 
	session_start ();
?><!DOCTYPE html>
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
						<li><?php include "valida_login.php";?></li>
                        <li><a href="logout.php" class="active">Sair</a></li>                        
                    </ul>                
				</div>
			</div>
			<div id="conteudo_especifico">
				<div class="div_central centralizar">
					<h1> EXIBIÇÃO DE AMPLIFICADORES </h1>
				</div>
				<div class="div_esquerda menu_local">					
					<?php

						include "menu_local.php";
					
					?>
				</div>		
				<div id="funcionalidade" class="div_direita">					
					<?php	

					/*1º conectar no banco de dados 
					  2º Receber o código do amp enviado via link 
					  3º pesquisar imagem, marca, modelo, preço e tipo do amp em função do código recebido acima 
					  4º extraír os dados da pesquisa acima (fetch row)
					  5º exibir os dados extraídos acima*/


					$conectar = mysqli_connect ("localhost", "root", "", "335800");

					$codigo_amp = $_GET["codigo"];

					$sql_pesquisa_amp = "SELECT marca_amp, modelo_amp, tipo_amp, preco_amp, foto_amp
											  FROM amplificadores
											  WHERE cod_amp = '$codigo_amp'";

					$resultado_pesquisa_amp = mysqli_query ($conectar, $sql_pesquisa_amp);

					$registro_amp = mysqli_fetch_row($resultado_pesquisa_amp); /* variavel que se torna array
					de 5 posições(registro_amp)*/ 

					?>

					<table class="esquerda" border = "1">
						<tr>
							<td colspan="2">
								<img src="<?php echo "$registro_amp[4]"; ?>">
							</td>							
						<tr>
						<tr>
							<td>
								<?php
									echo "<p> Marca: $registro_amp[0] </p>";
									echo "<p> Modelo: $registro_amp[1]</p>";						
								?>
								
							</td>
							<td>
								<?php
									echo "<p> Tipo: $registro_amp[2] </p>";
									echo "<p> Preço: $registro_amp[3]</p>";
								?>
							</td>
						</tr>
					</table>							
				</div>		
				
				
			</div>	
			<div id="rodape">
				<div id="texto_institucional">
					<div id="texto_institucional">
						<h6> AMPLI - CONTROL </h6> 
						<h6> Rua do Rock, 666 -- E-mail: contato@ampli_control.com.br -- Fone: (61) 9966 - 6677 </h6> 
					</div> 
				</div>
		</div>
    </body>
</html>