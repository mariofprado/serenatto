<?php

require "src/conexao-db.php";
require "src/Modelo/Produto.php";
require "src/Repositorio/ProdutoRepositorio.php";

$listaDeProdutosCafe = new ProdutoRepositorio($pdo);
$tipoProduto = "'Café'";
$listagemCafe = $listaDeProdutosCafe->listarProduto($tipoProduto);

$listaDeProdutosAlmoco = new ProdutoRepositorio($pdo);
$tipoProduto = "'Almoco'";
$listagemAlmoco = $listaDeProdutosAlmoco->listarProduto($tipoProduto);

?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="img/icone-serenatto.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Serenatto - Cardápio</title>
</head>
<body>
    <main>
        <section class="container-banner">
            <div class="container-texto-banner">
                <img src="img/logo-serenatto.png" class="logo" alt="logo-serenatto">
            </div>
        </section>
        <h2>Cardápio Digital</h2>
        <section class="container-cafe-manha">
            <div class="container-cafe-manha-titulo">
                <h3>Opções para o Café</h3>
                <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
            </div>
            <div class="container-cafe-manha-produtos">
            <?php foreach($listagemCafe as $cafe) : ?>
                <div class="container-produto">
                    <div class="container-foto">
                        <img src="<?php echo $cafe->getImagemTratada() ?>">
                    </div>
                    <p><?php echo $cafe->getNome() ?></p>
                    <p><?php echo $cafe->getDescricao() ?></p>
                    <p><?php echo $cafe->getPrecoFormatado()?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
        <section class="container-almoco">
            <div class="container-almoco-titulo">
                <h3>Opções para o Almoço</h3>
                <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
            </div>
            <div class="container-almoco-produtos">
                <?php foreach($listagemAlmoco as $almoco): ?>
                <div class="container-produto">
                    <div class="container-foto">
                        <img src="<?= $almoco->getImagemTratada() ?>">
                    </div>
                    <p><?= $almoco->getNome()?></p>
                    <p><?= $almoco->getDescricao()?></p>
                    <p><?= $almoco->getPrecoFormatado()?></p>
                </div>
                <?php endforeach ?>
            </div>

        </section>
        
        <section class="container-almoco">
            <p align="right" class="">
                <a href="login.php"><img src="img/botao-login.png" width="50" 
                    height="h50" alt="Acesso ao sistema interno"/></a>
            </p>
        </section>
    </main>
</body>
</html>