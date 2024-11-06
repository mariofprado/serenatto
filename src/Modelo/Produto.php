    <?php

class Produto {

    //a interrogacao antes do tipo da variavel informa ao programa
    //que a variavel pode ser inicializada com um valor nulo
    protected ?int $id;
    protected string $tipo;
    protected string $nome;
    protected string $descricao;
    protected string $imagem;
    protected float $preco;

    public function __construct (?int $id, string $tipo, string $nome, string $descricao, 
    float $preco, string $imagem) {
        $this->id = $id;
        $this->tipo = $tipo;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->preco = $preco;
        $this->imagem = $imagem;
        
    }

    public function getId() : string {
        return $this->id;
    }

    public function getTipo() : string {
        return $this->tipo;
    }

    public function getNome() : string {
        return $this->nome;
    }

    public function getDescricao() : string {
        return $this->descricao;
    }

    public function getImagem() : string {
        return $this->imagem;
    }
    
    public function getImagemTratada() : string {
        $enderecoImagem = "img/".$this->imagem;
        return $enderecoImagem;
    }

    public function getPreco() : float {
        return $this->preco;
    }

    public function getPrecoFormatado() : string {
        $precoFinal = "R$ ".str_replace('.',',',number_format($this->preco,2));
        return $precoFinal;
    }

    public function setId($id) {
        $this->id = $id;
    }

}