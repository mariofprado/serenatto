<?php

require_once 'Usuario.php';

class usuarioRepositorio {
    protected PDO $pdo;
    
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }
   
    public function buscaUsuario($usuario,$senha) : bool {
        //retorna true caso usurio e senha sejam verificados
        $sql = "SELECT * FROM si_usuarios WHERE usuario = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1,$usuario);
        $statement->execute();
        
        $dados = $statement->fetch(PDO::FETCH_ASSOC);
        
        $verifica = false;
        
        if ($dados) {
            //verifica se o usuario foi encontrado
            if ($dados['senha'] == $senha) {
                //se encontrado, verifica se a senha bate
                $verifica =  true;
            }
        } else {
            $verifica = false;     
        }
        return $verifica;
        
    }
    
}



