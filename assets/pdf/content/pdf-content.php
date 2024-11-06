<?php

  require "../../src/conexao-db.php";
  require "../../src/Modelo/Produto.php";
  require "../../src/Repositorio/ProdutoRepositorio.php";
  
  $produtoRepositorio = new ProdutoRepositorio($pdo);
  $produto = $produtoRepositorio->listarTodosProdutos();

?>

<style>
    table{
    width: 90%;
    margin: auto 0;
}
table, th, td{
    border: 1px solid #EBC181;
}

table th{
    padding: 11px 0 11px;
    background-color: #EBC181;
    color: #333B1E;
    font-weight: bold;
    font-size: 18px;
    text-align: left;
    padding: 8px;
}

table tr{
    border: 1px solid #ddd;
}

table td{
    color: #000;
    font-size: 18px;
    padding: 8px;
}
    </style>
<table>
      <thead>
        <tr>
          <th>Produto</th>
          <th>Tipo</th>
          <th>Descricão</th>
          <th>Valor</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($produto as $produto) : ?>
      <tr>
        <td><?php echo $produto->getNome(); ?></td>
        <td><?php echo $produto->getTipo(); ?></td>
        <td><?php echo $produto->getDescricao(); ?></td>
        <td><?php echo $produto->getPrecoFormatado(); ?></td>
        
      </tr>
      <?php endforeach; ?>
      
      </tbody>
    </table>

