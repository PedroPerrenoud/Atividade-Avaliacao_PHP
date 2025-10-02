<?php
  require_once MODEL_PATH.'Venda.php';
  require_once MODEL_PATH.'Produto.php';

  class VendaController {
    public function newVenda() : bool {
      if( isset($_POST['prod_id']) ){
        $prodId = $_POST['prod_id'];
        $qtd = $_POST['quantidade'];
        $date = $_POST['venda_data'];

        $venda = new Venda();
        $venda->setDate($date);
        $venda->setQtd($qtd);

        $produtoModel = new Produto();
        $produto = $produtoModel->getById($prodId);
        $venda->setProdId( $produto->getId() );
        
        if( $produto->remove_qtd($qtd) ){
          $venda->setValue($venda->totalCalculate( $qtd, $produto->getValue()) );
          return $venda->register();
        }

        //Tratar erro em caso de quantidade insuficiente de produto
        return false;

      }

      //Tratar erro caso não haja um prod_id
      return false;
      
    }
  }
?>