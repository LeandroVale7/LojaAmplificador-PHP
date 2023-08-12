<?php
/* conectar no banco de dados
2º receber o código enviado via link 
3º alterar o campo da situação de "s" para "n" em função do código recebido no link acima 
4º se alterou: 
*msg de sucesso(produto retirado da fila)
*voltar para vendas.php
senão:
*msg de erro
*voltar para ver_fila_compras.php*/

$conectar = mysqli_connect("localhost", "root", "", "335800");

$cod = $_GET["codigo_amp"];

$sql_altera = "UPDATE amplificadores 
               SET    fila_compra_amp = 'N'
               WHERE  cod_amp = '$cod'";

$sql_resultado_alteracao = mysqli_query($conectar, $sql_altera);

if($sql_resultado_alteracao == true){
    echo "<script>
            alert ('Amplificador retirado da fila de compra com sucesso')
          </script>";

    echo "<script>
            location.href = ('vendas.php')
          </script>";
        exit();
}
else{
    echo "<script>
            alert ('Ocorreu um erro no servidor. O amplificador não foi retirado da fila de compras. Tente de novo')
          </script>";
    
    echo "<script>
            location.href = ('ver_fila_compras.php')
          </script>";
}
?>