<?php

require 'src/conexao-db.php';
require 'src/Modelo/Produto.php';
require 'src/Repositorio/ProdutoRepositorio.php';


if (isset($_POST['cadastrar'])) {
    
    $arquivo=$_FILES['imagem_nome'];
    
    $novoArquivo = explode('.', $arquivo['name']);
      
    
    if (strcasecmp($novoArquivo[sizeof($novoArquivo)-1], 'jpg') != 0) {
        //compara a etensao recebida com 'jpg' (case insensitive)
        //header("Location:cadastrar-produto.php?msg=Formato de arquivo inválido");
        ?>
            <script language="JavaScript">
            alert("Formato de arquivo inválido! O arquivo precisa ser um JPG");
            </script>
     <?php       
    } else {
        
        move_uploaded_file($arquivo['tmp_name'], 'img/'.$arquivo['name']);
        //seta o arquivo pra subir pelo nome temporario, para a pasta upload, 
        //usando no nome real do arquivo
        
        //var_dump($arquivo['name']);
        //exit();
        
        $produtoRepositorio = new produtoRepositorio($pdo);
        
        
        $produto = new Produto (null, $_POST['tipo'],$_POST['nome'], $_POST['descricao'],
                $_POST['preco'], $arquivo['name']);
        //implode converte o array arquivo em string
        
        
        $produtoRepositorio->inserirProduto($produto);
        
        ?>
            <script language="JavaScript">
                alert("Upload realizado com sucesso");
                </script>

      <?php
    }
      
}

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
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="img/icone-serenatto.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Serenatto - Cadastrar Produto</title>
</head>
<body>
<main>
    <section class="container-admin-banner">
        <img src="img/logo-serenatto-horizontal.png" class="logo-admin" alt="logo-serenatto">
        <h1>Cadastro de Produtos</h1>
        <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
    </section>
    <section class="container-form">
        <form method="post" enctype="multipart/form-data" action="">

            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" placeholder="Digite o nome do produto" required>
            <div class="container-radio">
                <div>
                    <label for="cafe">Café</label>
                    <input type="radio" id="cafe" name="tipo" value="Café" checked>
                </div>
                <div>
                    <label for="almoco">Almoço</label>
                    <input type="radio" id="almoco" name="tipo" value="Almoço">
                </div>
            </div>
            <label for="descricao">Descrição</label>
            <input type="text" id="descricao" name="descricao" placeholder="Digite uma descrição" required>

            <label for="preco">Preço</label>
            <input type="text" id="preco" name="preco" placeholder="Digite uma descrição" required>

            <label for="imagem">Envie uma imagem do produto </label>
            <input type="file" name="imagem_nome" accept="image/*" 
                   id="imagem" placeholder="Escolha uma imagem"/>
            <p class="warning"><?php if (isset($_GET['msg'])) {
                echo $_GET['msg'];
            } 
            ?></p>
            <h6>Tipos aceitos: jpg</h6>
            
            <input type="submit" name="cadastrar" class="botao-cadastrar" value="Cadastrar produto"/>
        </form>
    
    </section>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/index.js"></script>
</body>
</html>