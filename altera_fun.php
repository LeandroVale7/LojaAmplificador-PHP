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
					<h1> ALTERAÇÃO DE USUÁRIOS </h1>
				</div>
				<div class="div_esquerda menu_local">					
					<?php

						include "menu_local.php";
					
					?>
				</div>		
				<div id="funcionalidade" class="div_direita">
					<?php
					/*
					1º conectar no bd
					2º receber o código enviado via link 
					3º pesquisar nome, função, login, senha e status em função do código recebido acima
					4º extraír cada dado da pesquisa acima 
					5º se a função for admin: exibir os dados do user admin
					senão: exibir os dados dos demais users 
					*/
						$conectar = mysqli_connect ("localhost", "root", "", "335800");
						
						$cod = $_GET["codigo"]; /* variavel($cod) recebe o que veio via get*/
										
						$sql_pesquisa = "SELECT  nome_fun, funcao_fun, 
						                        login_fun, senha_fun, 
												status_fun
										 FROM funcionarios
										 WHERE cod_fun = '$cod'"; /*esse é o terceiro passo(pesquisar nome
										 função)*/

						$resultado_pesquisa = mysqli_query ($conectar, $sql_pesquisa);/* resultado do select
						vai ser o mysqli_query, está tudo dentro da $resultado_pesquisa*/
						
						$registro = mysqli_fetch_row($resultado_pesquisa);

					?>
					<!--html-->
					<form method="post" action="processa_altera_fun.php">
						<input type="hidden" name="codigo" value="<?php echo $cod;?>">
                    <!--fim do html-->

						<?php 

							if ($registro[1] == "administrador") /*posição 1 está a função*/
							{ 

						?>
								<input type="hidden" name="funcao" value="<?php echo $registro[1];?>">
								
									<p> ADMINISTRADOR </p>

									<p> Senha:  <input type="password" name="senha" value="<?php echo "$registro[3]";?>" required></p>
								
									
						<?php
							}
							else {
						?>
									<p> Nome: <input type="text" name="nome" value="<?php echo "$registro[0]";?>" required></p>
								
									<p> funcao:  <input type="radio" name="funcao" value="estoquista" 
									<?php
									    if ($registro [1] == "estoquista"){
											echo "checked";
										}
										?>>Estoquista
										<input type="radio" name="funcao" value="vendedor"
									<?php
										if ($registro[1] == "vendedor"){
											echo "checked";
										}
										?>>Vendedor
							
									</p>
									<p> Login: <input type="text" name="login" value="<?php echo "$registro[2]";?>" required></p>
								
									<p> Senha: <input type="password" name="senha" value="<?php echo "$registro[3]";?>" required></p>
								
									<p> Status:  
										<select name="status" >
											<option value="Ativo"
											    <?php
												    if($registro[4]== "A"){
														 echo "selected";
													}
												?>>Ativo
											</option>
											<option value="Inativo"
											    <?php 
												   if($registro[4] == "I"){
													     echo "selected";
												   }
												?>>inativo
											</option>
										</select>
									
								<?php
							     }
						        ?>
							<p> <input type="submit" value="Alterar Usuario"></p>
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