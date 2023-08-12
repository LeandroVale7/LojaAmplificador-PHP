<?php
session_start(); /*inicia*/

$_SESSION = array(); #arry aqui pega todos os num

session_unset(); #desconfigura sessao, encerra a sessão aberta

session_destroy(); #apaga todas as credenciais

echo "<script>
             location.href = ('index.php')
      </script>";

?>
