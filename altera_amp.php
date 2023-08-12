﻿<?php 
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
					<h1> ALTERAÇÃO DE AMPLIFICADORES </h1>
				</div>
				<div class="div_esquerda menu_local">					
					<?php

						include "menu_local.php";
					
					?>
				</div>		
				<div id="funcionalidade" class="div_direita">
					<?php
					
						$conectar = mysqli_connect ("localhost", "root", "", "335800");
						
						$cod = $_GET["codigo"];
										
						$sql_pesquisa = "SELECT  cod_amp, marca_amp, modelo_amp,
						                         tipo_amp, preco_amp, foto_amp
										FROM amplificadores
										 WHERE cod_amp = '$cod'";

						$resultado_pesquisa = mysqli_query ($conectar, $sql_pesquisa);	
						
						$registro = mysqli_fetch_row($resultado_pesquisa);

					?>
					<form method="post" action="processa_altera_amp.php" enctype="multipart/form-data">
						<input type="hidden" name="codigo" value="<?php echo "$cod";?>">

								<p> Marca: <input type="text" name="marca" required value="<?php echo "$registro[1]"; ?>"required ></p>
							
								<p> Modelo: <input type="text" name="modelo" required value="<?php echo "$registro[2]"; ?>"required> </p>
								
							    <p> Preço: <input type="text" name="preco" required value="<?php echo "$registro[4]"; ?>" required></p>
								
								<p> Foto:  <input type="file" name = "foto"> </p>
								<p> Tipo: 
										<select name="tipo">
											<option value="guitarra"
												<?php
														if ($registro[3] == "guitarra"){
															echo "selected";
														}
													?>> Guitarra </option>
											<option value="baixo"
												<?php
														if ($registro[3] == "baixo"){ 
															echo "selected";
														}
													?>> Baixo </option>
											<option value="violao"
												<?php
														if ($registro[3] == "violao"){
															echo "selected";
														}
													?>> Violão </option>
										</select>
								</p>
								<p> <input type="submit" value="Alterar Amplificador"> </p>
					</form>
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