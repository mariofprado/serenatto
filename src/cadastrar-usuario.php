<?php

require_once '../interno/Session.php';
require_once 'UsuarioRepositorio.php';

require_once 'conexao-db.php';

if (isset($_POST['usuario']) && isset($_POST['senha'])) {
   
    $buscaUsuario = new usuarioRepositorio($pdo);

    $numeroDeUsuarios = $buscaUsuario->buscaUsuario($_POST['usuario']);
    
    if ($numeroDeUsuarios == 1) {
        
        echo "<script>alert('Usuário já cadastrado no sistema. Escolha "
        . "outro nome');</script>";  
        
    } else {
        
        $sql = "INSERT INTO si_usuarios (usuario, senha) VALUES (?,?)";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $_POST['usuario']);
        $statement->bindValue(2, password_hash($_POST['senha'], PASSWORD_DEFAULT));
        //criptografa a senha e para gravacao no db
        $statement->execute(); 
        unset($_POST['usuario']);
        unset($_POST['senha']);
        //destroi as superglobais para evitar novo cadastro em caso de 
        //atualizacao da pagina
        echo "<script>alert('Usuário cadastrado com sucesso');</script>";
        
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
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../css/admin.css">
  <link rel="stylesheet" href="../css/form.css">
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
    <img src="../img/logo-serenatto-horizontal.png" class="logo-admin" alt="logo-serenatto">
    <h1>Sistema Interno - Cadastro de usuário</h1>
    <img class= "ornaments" src="../img/ornaments-coffee.png" alt="ornaments">
  </section>
  <section class="container-form">
     
      <form action="" method="post">

    <label for="email">Usuário</label>
    <input type="text" name="usuario" placeholder="Digite o usuário" required>

    <label for="password">Senha</label>
    <input type="password" name="senha" placeholder="Digite uma senha" required>

    <input type="submit" class="botao-cadastrar" value="Cadastrar usuário"/>
  </form>

  </section>
    <section>
        <p align="right">
        <a href="../interno/logout.php"><img src="../img/botao-logout.png"
            width="50" height="50" alt="Logout"/></a>
    </p>
    </section>
</main>
</body>
</html>