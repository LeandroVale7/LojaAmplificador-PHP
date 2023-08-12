<?php

/*conectar no bd
2º receber código, marca, modelo, preço, foto e tipo do produto
3º alterar os dados do produto no banco de dados em função do código recebido
4º se alterar: 
*msg de sucesso 
*voltar para lista_amp.php 
senão:
*msg de erro
*voltar para altera_amp.php 
*/
 
$conectar = mysqli_connect("localhost", "root", "", "335800");

$cod = $_POST["codigo"];
$marca = $_POST["marca"];
$modelo = $_POST["modelo"];
$preco = $_POST["preco"];
$tipo = $_POST["tipo"];
$foto = $_FILES["foto"];

/*upload da imagem*/
if ($foto ["name"]<> ""){
    $foto_nome = "img/".$foto["name"];
    move_uploaded_file($foto["tmp_name"], $foto_nome);
}
else{
$pesquisa_foto = "SELECT foto_amp FROM amplificadores

                  WHERE  cod_amp =   '$cod'";
  
 
 $resultado_pesquisa_foto = mysqli_query ($conectar, $pesquisa_foto);
 $registro_foto =  mysqli_fetch_row ($resultado_pesquisa_foto);
 $foto_nome = $registro_foto[0];
}

$sql_altera = "UPDATE amplificadores 
               SET    marca_amp = '$marca',
                      modelo_amp = '$modelo',
                      preco_amp = '$preco', 
                      tipo_amp = '$tipo',
                      foto_amp = '$foto_nome'
            WHERE     cod_amp = '$cod'";

$sql_resultado_alteracao = mysqli_query($conectar, $sql_altera);
 
if($sql_resultado_alteracao == true){
    echo "<script>
           alert ('$modelo alterado com sucesso')
          </script>";
        
    echo "<script>
           location.href = ('lista_amp.php')
          </script>";
          exit();
}

else{
    echo "<script>
           alert ('Ocorreu um erro no servidor. Dados do amplificador não foram alterados. Tente de novo')
          </script>";
    
    echo "<script>
          alert ('altera_amp.php?codigo_amp=<?php echo $cod;?>')
         </script>";
}
?>
