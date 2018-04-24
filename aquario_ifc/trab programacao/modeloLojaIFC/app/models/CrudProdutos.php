<?php


require_once "Conexao.php";
require_once "Produto.php";

class CrudProdutos {

    private $conexao;
    private $produto;

    public function __construct() {
        $this->conexao = Conexao::getConexao();
    }

    public function salvar(Produto $produto){
        $sql = "INSERT INTO tb_produtos (nome,nome_cient, preco, categoria, qtd_estoque) VALUES ('$produto->nome', $produto->preco, '$produto->categoria', '$produto->id_categoria', '$produto->estoque', '$produto->descricao')";

        $this->conexao->exec($sql);
    }


    public function getProduto(int $codigo){
        $consulta = $this->conexao->query("SELECT * FROM tb_produtos WHERE codigo = $codigo");
        $prod = $consulta->fetch(PDO::FETCH_ASSOC);

        return new Produto($prod['nome'],$prod['nome_cient'], $prod['preco'], $prod['categoria'], $prod['id_categoria'], $prod['qtd_estoque'], $prod['descricao'], $prod['codigo']);
    }

    public function getProdutos(){
        $consulta = $this->conexao->query("SELECT * FROM tb_produtos");
        $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);

        $listaNova = [];
        foreach($resultados as $prod){
            $listaNova[] = new Produto($prod['nome'],$prod['nome_cient'] , $prod['preco'], $prod['categoria'], $prod['id_categoria'], $prod['qtd_estoque'], $prod['descricao'], $prod['codigo']);
        }
        return $listaNova;
    }



}

