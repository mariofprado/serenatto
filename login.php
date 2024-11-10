<?php

require_once 'src/conexao-db.php';
require_once 'src/Usuario.php';
require_once 'src/UsuarioRepositorio.php';


if (isset($_POST['usuario']) && isset($_POST['senha'])) {
    if (strlen($_POST['usuario']) == 0 || strlen($_POST['senha']) < 6) {
        header("location: login.php?msgError=Usuário ou senha inválidos");
    } else {
        
        $usuario = new usuarioRepositorio($pdo);
        $retorno = $usuario->verificaUsuarioSenha($_POST['usuario'],$_POST['senha']);
        
        if ($retorno == 1) {
            if (!isset($_SESSION)) {
                session_start();
            }    
            $_SESSION['usuario'] = $_POST['usuario'];
            $_SESSION['senha'] = $_POST['senha'];
            
            header("location: admin.php"); 
            } else {    
            header("location: login.php?msgError=Usuário ou senha inválidos");
        }
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
  <link rel="icon" href="img/icone-serenatto.png" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>Serenatto - Login</title>
</head>
<body>
<main>
  <section class="container-admin-banner">
    <img src="img/logo-serenatto-horizontal.png" class="logo-admin" alt="logo-serenatto">
    <h1>Acesso ao sistema interno</h1>
    <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
  </section>
  <section class="container-form">
     
      <form action="#" method="post">
          
      <?php       
        if(isset($_GET['msgError'])) {
            echo "<div>".$_GET['msgError']."</div>";
        } 
      ?>

    <label for="email">Usuário</label>
    <input type="text" name="usuario" placeholder="Digite o usuário" required>

    <label for="password">Senha</label>
    <input type="password" name="senha" placeholder="Digite a sua senha" required>

    <input type="submit" class="botao-cadastrar" value="Entrar"/>
  </form>

  </section>
</main>
</body>
</html>