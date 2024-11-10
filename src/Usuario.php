<?php

require_once "conexao-db.php";

class Usuario {
    protected string $usuario;
    protected string $senha;
    
    public function __construct(string $usuario, string $senha) {
        $this->usuario = $usuario;
        $this->senha = $senha;
    }
    
    public function getUsuario() : string {
        return $this->usuario;
    }
    
    public function getSenha() : string {
        return $this->senha;
    }
   
}

