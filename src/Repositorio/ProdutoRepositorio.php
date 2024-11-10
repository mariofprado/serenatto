<?php

class produtoRepositorio {
    protected PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function listarProduto(string $tipo) : array {
        
        $sql = "SELECT * FROM produtos WHERE tipo = $tipo ORDER BY preco";
        $statement = $this->pdo->query($sql);
        $produtos = $statement->fetchAll(PDO::FETCH_ASSOC);

        //esta forma abaixo subistitui as 3 linhas de cima
        //$produtos = $this->pdo->query("SELECT * FROM produtos WHERE tipo = $tipo")
        //->fetchAll(PDO::FETCH_ASSOC);

        $dados = array_map (function ($buscaProduto) {
            return new Produto ($buscaProduto['id'],$buscaProduto['tipo'],$buscaProduto['nome'],
            $buscaProduto['descricao'],$buscaProduto['preco'], $buscaProduto['imagem']);
        },$produtos);

        return $dados;
    }

    public function listarTodosProdutos() : array {
        $sql = "SELECT * FROM produtos ORDER BY preco";
        $statement = $this->pdo->query($sql);
        $produtos = $statement->fetchAll(PDO::FETCH_ASSOC); 

        $dados = array_map(function($buscaProduto) {
            return new Produto ($buscaProduto['id'],$buscaProduto['tipo'],$buscaProduto['nome'],
            $buscaProduto['descricao'],$buscaProduto['preco'], $buscaProduto['imagem']);
        },$produtos);

        return $dados;
    }
    
    public function buscarProduto($id) {
        $sql = "SELECT * FROM produtos WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();
        
        $dados = $statement->fetch(PDO::FETCH_ASSOC);
        
        return $this->criaObjeto($dados);
        
    }
    
    public function criaObjeto($dados) {
        return new Produto($dados['id'],
                $dados['tipo'],
                $dados['nome'],
                $dados['descricao'],
                $dados['preco'],
                $dados['imagem']
                );
    }
    
    public function excluirProduto($id) {
        $sql = "DELETE FROM produtos WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();
    }
    
    public function inserirProduto(Produto $Produto) {
        $sql = "INSERT INTO produtos (tipo, nome, descricao, preco, imagem) VALUES (?,?,?,?,?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $Produto->getTipo());
        $statement->bindValue(2, $Produto->getNome());
        $statement->bindValue(3, $Produto->getDescricao());
        $statement->bindValue(4, $Produto->getPreco());
        $statement->bindValue(5, $Produto->getImagem());
        $statement->execute();
    }
    
    public function editarProduto(Produto $produto) {
        $sql = "UPDATE produtos SET tipo = ?, nome = ?, descricao = ?,
            preco = ?, imagem = ? WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $produto->getTipo());
        $statement->bindValue(2, $produto->getNome());
        $statement->bindValue(3, $produto->getDescricao());
        $statement->bindValue(4, $produto->getPreco());
        $statement->bindValue(5, $produto->getImagem());
        $statement->bindValue(6, $produto->getId());
        $statement->execute();
    }
}