<?php
session_start(); /*obrigatório estar na primeira linha da página */
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Administração</title>
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
                        <li><?php include "valida_login.php";?></li>

			               <!-- include: inclui o conteúdo de outro script php-->

                        <li><a href="logout.php" >Sair</a></li>
				</ul>
			</div>
		</div>
		<div id="conteudo_especifico">
			<div class="div_central centralizar">
				<h1> ADMINISTRAÇÃO </h1>

				<?php
			        include "menu_local.php";
				?>
				<!--regras de negocios -->
				<!-- administrador tem acesso total 

				Estoquista que acessa somente produtos

				vendedor que acessa somente as vendas-->
				
                   
			</div>

			<div class="div_esquerda">

			</div>
			<div class="div_direita">

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