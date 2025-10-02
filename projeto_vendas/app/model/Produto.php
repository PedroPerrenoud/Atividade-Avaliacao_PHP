<?php
  require_once DATABASE_PATH;

  class Produto{
    // PARAMS
    private $id;
    private $name;
    private $value;
    private $db;
    private $qtd; // Quantidade;

    public function __construct(){
      $this->db = Database::getConection();
    }

    // GETTERS
    public function getId(){ return $this->id; }
    public function getName(){ return $this->name; }
    public function getValue(){ return $this->value; }
    public function getQtd(){ return $this->qtd; }

    // SETTERS
    public function setName( $name ){ $this->name = $name; }
    public function setValue( $value ){ $this->value = $value; }
    public function setQtd( $qtd ){ $this->qtd = $qtd; }
    
    // METHODS
    public function create(){}
    public function update(){}
    
    public function removeQTD($qtd) : bool {
      if( $qtd > $this->qtd){
        header('Location: '.INDEX_PATH.'?status=error');
        exit();
      }
      $this->qtd -= $qtd;
      $sql_remove = "UPDATE produtos SET prod_qtd = :qtd WHERE id = :id ";

      $stmt_remove = $this->db->prepare($sql_remove);
      $stmt_remove->bindValue(':id', $this->id);
      $stmt_remove->bindValue(':qtd', $this->qtd);
      
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
      $sql_bring = "SELEC * FROM produtos";

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

    // METHODS - ACTIVITE
  }
?>