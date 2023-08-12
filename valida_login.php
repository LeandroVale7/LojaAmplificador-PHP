<?php

/* se estiver com a credencial, dizer olá user; senão, msg de erro, voltar p/ index.php */

#função isset( variavel )
#isset serve para ver se a variável está definida, ela retorna um valor booleano(true or false)
#se uma variável não for definida ela possui o valor nulo (null)
if (isset($_SESSION["nome"])){
    echo"Olá ".$_SESSION["nome"];
} else{

    echo "<script>
                alert ('Você não está logado!!!')
          </script>";

    echo "<script>
          location.href = ('index.php')
          </script>";
}
?>