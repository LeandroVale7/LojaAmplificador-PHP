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

					<!--1º configuração do formulario
				* method -> post/get
			    * action -> processa_cadastra.php
			    * enc-type 
			    * name: marca, modelo, preço, foto, tipo-->
				</div>
				<div class="menu_global">
					<ul>
						<li> Olá <?php include "valida_login.php";?></li>
                        <li><a href="logout.php" class="active">Sair</a></li>                        
                    </ul>                
				</div>
			</div>
			<div id="conteudo_especifico">
				<div class="div_central centralizar">
					<h1> CADASTRO DE AMPLIFICADORES </h1>
				</div>
				<div class="div_esquerda menu_local">					
					<?php

						include "menu_local.php";
					
					?>
				</div>		
				<div id="funcionalidade" class="div_direita">
					<form method="post" action="processa_cadastra_amp.php" enctype="multipart/form-data">
					
									<p> Marca: <input type="text" name="marca" required> </p>
						
									<p> Modelo: <input type="text" name="modelo" required> </p>
							
									<p> Preço:  <input type="text" name="preco" required> </p>

									<p> Foto: <input type="file" name = "foto" required> </p>
								
									<p>
										 Tipo: 
										<select name="tipo">
											<option value="guitarra"> Guitarra </option>
											<option value="baixo"> Baixo </option>
											<option value="violao"> Violão </option>
										</select>
									</p>
								
								<p>
									 <input type="submit" value="Cadastrar Amplificador"> 
								</p>
								
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
		</div>
    </body>
</html>