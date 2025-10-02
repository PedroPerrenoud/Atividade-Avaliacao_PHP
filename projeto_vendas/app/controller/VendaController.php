<?php 
  include_once MODEL_PATH.'Produto.php';
  include_once MODEL_PATH.'Venda.php';

  class VendaController{
    public function newVenda(){
      $prod_id = $_POST['prod_id'];
      $qtd = $_POST['qtd'];
      $date = $_POST['date'];

      $venda = new Venda();
      $modelProduto = new Produto();

      $venda->setQtd($qtd);
      $venda->setProdId($prod_id);
      $venda->setDate($date);
      $produto = $modelProduto->getById($prod_id);
      
      if ($produto->removeQtd($qtd) ){
        $venda->setValue( $venda->totalValue($qtd, $produto->getValue() ) );
        if( $venda->register() ){
          header("Location: ".INDEX_PATH."?status=vendaSucesso");
        }
      }

    }
  }
?>