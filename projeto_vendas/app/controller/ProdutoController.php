<?php
  require_once MODEL_PATH.'Produto.php';

  class ProdutoController{
    function newProduct(){
      $name = $_POST['nome'];
      $value = $_POST['valor'];
      $qtd = $_POST['quantidade'];

      $produto = new Produto();
      $produto->setName($name);
      $produto->setName($value);
      $produto->setName($qtd);

      $produto->create();
    }

    function editProdutct(){
      
    }
  }
?>