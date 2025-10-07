<?php 
  include_once MODEL_PATH.'Produto.php';
  include_once MODEL_PATH.'Venda.php';

  class VendaController{

    public function newVenda(){
      error_log("INFO: acessando método newVenda()");
      $prod_id = $_POST['prod_id'];
      $qtd = $_POST['qtd'];
      $date = $_POST['date'];
      error_log("INFO: Recebendo dados");
      error_log("  - ".$prod_id);
      error_log("  - ".$qtd);
      error_log("  - ".$date);

      error_log("INFO: Criando nova venda...");
      $venda = new Venda();
      $modelProduto = new Produto();

      error_log("INFO: Setando dados iniciais da venda...");
      $venda->setQtd($qtd);
      $venda->setProdId($prod_id);
      $venda->setDate($date);

      error_log("INFO: Adquirindo dados pelo ID");
      $produto = $modelProduto->getById($prod_id);
      error_log("INFO: Produto adquirido ".json_encode($produto));
      
      if ( $produto->removeQtd($qtd) ){
        error_log("INFO: Baixa realizada no banco...");
        $venda->setValue( $venda->totalValue($qtd, $produto->getValue() ) );

        if( $venda->register() ){
          error_log("INFO: Venda registrada com sucesso.");
          error_log("INFO: Tentando acessar ".API_PATH.'?controller=produto&method=listar');
          header("Location: ".API_PATH.'?controller=produto&method=listar');
          exit();
        }

        error_log("ERRO: Venda não foi registrada");

      }

    }

    public static function listar(){

      $vendaModel = new Venda();
      $vendas = $vendaModel->bringAll();
      $vendaController = new VendaController();

      $vendaController->render('vendas', ['listaHistorico' => $vendas]);

    }

    public function render(string $viewName, array $data = []){

      extract($data);
      
      require_once PUBLIC_PATH . $viewName . '.php';
    }
  }
?>