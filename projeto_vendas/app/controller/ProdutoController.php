<?php
  require_once MODEL_PATH.'Produto.php';

  class ProdutoController{
    public function newProduct(){
      $name = $_POST['nome'];
      $value = $_POST['valor'];
      $qtd = $_POST['quantidade'];

      $produto = new Produto();
      $produto->setName($name);
      $produto->setName($value);
      $produto->setName($qtd);

      $produto->create();
    }

    public function editProdutct(){

    }

    public static function listar(){
      $produtoModel = new Produto();
      $produtos = $produtoModel->bringAll();
      $produtoController = new ProdutoController();

      $produtoController->render($produtos);
    }

    public function render( array $data = []){
      extract($data);
      require_once INDEX_PATH;
    }
  }
?>