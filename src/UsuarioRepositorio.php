<?php

require_once 'Usuario.php';

class usuarioRepositorio {
    protected PDO $pdo;
    
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }
   
    public function buscaUsuario($usuario) : bool {
        //retorna o numero de usuarios encontrados no db
        $sql = "SELECT usuario FROM si_usuarios WHERE usuario = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $usuario);
        $statement->execute();
        $retorno = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        if ($retorno) {
            return true;
        } else return false;
     
    }
    
    public function verificaUsuarioSenha($usuario,$senha) : bool {
        //retorna true caso usurio e senha sejam verificados
        $sql = "SELECT * FROM si_usuarios WHERE usuario = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1,$usuario);
        $statement->execute();
        
        $dados = $statement->fetch(PDO::FETCH_ASSOC);
        
        $verifica = false;
        
        if ($dados) {
            //verifica se o usuario foi encontrado
            if (password_verify($senha, $dados['senha']) == 1) {
                //decodifica a senha do db e compara com a senha digitada
                $verifica =  true;
            }
        } else {
            $verifica = false;     
        }
        return $verifica;
        
    }
    
}



