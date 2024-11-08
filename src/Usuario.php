<?php

class Usuario {
    protected ?int $id;
    protected string $usuario;
    protected string $senha;
    
    public function __construct(?int $id, string $usuario, string $senha) {
        $this->id = $id;
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

