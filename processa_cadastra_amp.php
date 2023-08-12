<?php
/*
 1º conectar no bd 
 2º recebem o modelo, marca, tipo, preço e foto
 3º efetuar o upload da imagem 
 4ºinserir os dados recebidos acima
 se inserir: 
 *msg de sucesso 
 *voltar para cadastra_amp.php
 senão:
 *msg de erro 
 *voltar para cadastra_amp.php
*/

$conectar = mysqli_connect ("localhost", "root", "", "335800");

$marca = $_POST["marca"];
$modelo = $_POST["modelo"];
$preco = $_POST["preco"];
$tipo = $_POST["tipo"];
$foto = $_FILES["foto"]; /*variável do tipo array, tem nomes, não números*/

/*colocar o nome do arquivo em uma das posições(nome)*/
$foto_nome = "img/".$foto["name"];/*caminho e nome do ar
quivo*/
move_uploaded_file($foto["tmp_name"], $foto_nome);/*cria outro arquivo e faz uma cópia*/

$sql_cadastrar = "INSERT INTO amplificadores (marca_amp,
                                             modelo_amp,
                                             preco_amp, 
                                             tipo_amp,
                                             foto_amp)
                   VALUES                    ('$marca',
                                              '$modelo',
                                              '$preco',
                                              '$tipo',
                                              '$foto_nome')";

$sql_resultado_cadastrar = mysqli_query ($conectar, $sql_cadastrar);
/*aqui é para inserir o resultado(query), o resultado da inserção é verdadeiro ou falso*/

if($sql_resultado_cadastrar == true){
     echo "<script>
                alert ('$modelo cadastro com sucesso')
           </script>";

     echo "<script>
                location.href = ('cadastra_amp.php')
           </script>";
}
else{
     echo "<script>
                alert ('ocorreu um erro no servidor ao tentar cadastrar!! Tente novamente!!!')
           </script>";
}
?>
