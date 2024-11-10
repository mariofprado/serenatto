<?php

session_start();

if (isset($_SESSION['usuario']) && isset($_SESSION['senha'])) {
    //continua a execucao da aplicacao
} else {
     header("Location: ../login.php?msgError=Usuário não logado. Efetue o login");
     //retorna a pagina de login
}

