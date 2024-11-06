<?php

require "src/conexao-db.php";
require "src/Repositorio/ProdutoRepositorio.php";

$produtoRepositorio = new produtoRepositorio($pdo);

$produtoRepositorio->excluirProduto($_POST['id']);

$Message = urlencode("Produto excluído com sucesso");
header("Location:admin.php?Message=".$Message);
die;
