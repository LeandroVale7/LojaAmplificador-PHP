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
						<li> Olá <?php include "valida_login.php";?></li>
                        <li><a href="logout.php" class="active">Sair</a></li>                        
                    </ul>                
				</div>
			</div>
			<div id="conteudo_especifico">
				<div class="div_central centralizar">
					<h1> AMPLIFICADORES </h1>
				</div>
				<div class="div_esquerda menu_local">					
					<?php

						include "menu_local.php";
					
					?>
				</div>		
				<div id="funcionalidade" class="div_direita">

					<?php
					/*conectar no bd
					  2º pesquisar marca, modelo, tipo, preço e código onde a situação é "n (nao está em negociação)
					  s ( está na fila de negociação)
					  v (vendido)"
                      3º extrair cada dado acima
					  4º exibir a situação em uma tabela*/ 

						$conectar = mysqli_connect ("localhost", "root", "", "335800");			
					
						$sql_consulta = "SELECT cod_amp, marca_amp, modelo_amp, 
						                        tipo_amp, preco_amp 

						                 FROM amplificadores 

										 WHERE vendas_cod_ven /* só é preenchido quando faz uma venda, valor null*/

										 IS null AND fila_compra_amp = 'N'";

						$resultado_consulta = mysqli_query ($conectar, $sql_consulta);
							
					?>
					
					<table border=1>
						<tr>
							<td>Marca</td>
							<td> Modelo</td>
							<td>Tipo</td>
							<td>Preço</td>							
							<td> Ação</td>
						</tr>

						<?php		
							while ($registro = mysqli_fetch_row ($resultado_consulta)){
						?>	

						<tr>
							<td> <?php echo $registro[1]; ?></td>
							<td>
								<a href="exibe_amp.php?codigo=<?php echo $registro[0]?>"> 
									<?php 
										echo "$registro[2]";
									?>
								</a>										
							</td>

							<td><?php echo $registro[3]; ?></td>
							<td><?php echo $registro[4]; ?></td>							
							
							<td>
								<a href="processa_fila_compras.php?codigo_amp=<?php echo $registro[0]?>">
									Colocar na fila de compras	
								</a>
							</td>
						</tr>
						
						<?php
							}
						?>
					</table>
					<p> <a href="ver_fila_compras.php"> Ver a fila de compras </a> </p>
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