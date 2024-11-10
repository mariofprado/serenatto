<?php
try {
   $pdo = new PDO('mysql:host=localhost;dbname=serenatto','root','');
} catch (Exception $ex) {
    header("Location: Erros/erroConexao.php?msg=".$ex->getMessage()."");   
}  

?>