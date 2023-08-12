<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cadastro de Funcionários</title>
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
				<h1> CADASTRO DE USUÁRIO</h1>

			</div>

			<div class="div_esquerda">
		    <?php

			include "menu_local.php";

			?>
			<!--1º configurar o form 
		     *method: post 
			 *action: processa.cadastra_fun.php
		     *name: nome, função, login, senha
			
			 login é único -->
			</div>
			<div class="div_direita">
					<form action="processa_cadastra_fun.php" method="post">
					<p>
						Nome:<input type="text" name=nome required>
					</p>
					<p>Função:
						<input type="radio" name="funcao" value="estoquista" checked>Estoquista
						<input type="radio" name="funcao" value="vendedor">Vendedor
					</p>
					<p>Login: <input type="text" name="login" required></p>
					<p>Senha: <input type="password" name="senha" required></p>
					
					<p>
						<input type="submit" value="Cadastrar Funcionário">
					</p>
				</form>
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