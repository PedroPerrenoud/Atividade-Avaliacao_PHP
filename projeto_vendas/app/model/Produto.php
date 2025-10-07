<?php
  require_once DATABASE_PATH;

  class Produto{
    // PARAMS
    private $prod_id;
    private $prod_nome;
    private $prod_valor;
    private $prod_estoque; // Quantidade;
    private $db;
    

    public function __construct(){
      $this->db = Database::getConection();
      if ($this->db === null) {
        throw new Exception("Não foi possível conectar ao banco de dados");
      }
    }

    // GETTERS
    public function getId(){ return $this->prod_id; }
    public function getName(){ return $this->prod_nome; }
    public function getValue(){ return $this->prod_valor; }
    public function getQtd(){ return $this->prod_estoque; }

    // SETTERS
    public function setName( $name ){ $this->prod_nome = $name; }
    public function setValue( $value ){ $this->prod_valor = $value; }
    public function setQtd( $qtd ){ $this->prod_estoque = $qtd; }
    
    // METHODS
    public function create(){}
    public function update(){}
    
    public function removeQTD($qtd) : bool {
      if( $qtd > $this->prod_estoque){
        header('Location: '.INDEX_PATH.'?status=error');
        exit();
      }
      $this->prod_estoque -= $qtd;
      $sql_remove = "UPDATE produtos SET prod_estoque = :qtd WHERE prod_id = :id ";

      $stmt_remove = $this->db->prepare($sql_remove);
      $stmt_remove->bindValue(':id', $this->prod_id);
      $stmt_remove->bindValue(':qtd', $this->prod_estoque);
      
      return $stmt_remove->execute();
    }

    public function getById($id){
      $sql_searchId = "SELECT * FROM produtos WHERE prod_id = :id";
      try{
        $stmt_searchId = $this->db->prepare($sql_searchId);
        $stmt_searchId->bindValue(':id', $id );
        $stmt_searchId->execute();

        $stmt_searchId->setFetchMode(PDO::FETCH_CLASS, 'Produto'); 

        $produto = $stmt_searchId->fetch();

        return ($produto !== false) ? $produto : null;
      
      }catch(PDOException $e){
        return null;
      }

    }
    
    public function bringAll() : array {
      $sql_bring = "SELECT * FROM produtos";

      try{
        $stmt_bring = $this->db->prepare($sql_bring);
        $stmt_bring->execute();
        $stmt_bring->setFetchMode( PDO::FETCH_CLASS, 'Produto' );
        
        $produtos = $stmt_bring->fetchAll();
        return $produtos;

      }catch(PDOException $e){
        return [];
      }
    }
  }
?>