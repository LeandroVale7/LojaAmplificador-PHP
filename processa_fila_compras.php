<?php
/* conectar no bd
 2º receber o código do amplificador enviado via link
 3º alterar o campo fila_compra_amp para "S" em função do código recebido 
 4ºse alterar: 
 *msg de sucesso
 *volta para vendas.php 
 senão: 
 *msg de sucesso
 *volta para vendas.php*/ 
$conectar = mysqli_connect ("localhost", "root", "", "335800");

$cod = $_GET["codigo_amp"];

$sql_altera = "UPDATE amplificadores 
               SET    fila_compra_amp = 'S'
               WHERE  cod_amp = '$cod'";

$sql_resultado_alteracao = mysqli_query ($conectar, $sql_altera);

if($sql_resultado_alteracao == true){
    echo "<script>
            alert ('Amplificador colocado na fila de compra com sucesso')
          </script>";
    
    echo "<script>
            location.href = ('vendas.php')
          </script>";
    exit();
    
}
else{
    echo "<script>
            alert ('Ocorreu um erro no servidor. O amplificador não foi colocado na fila de compras.
             Tente de novo') 
		  </script>";

	echo "<script> 
			location.href ('vendas.php') 
		  </script>";
}