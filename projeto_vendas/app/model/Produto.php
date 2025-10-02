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
      if ($this->db === null) {
        throw new Exception("Não foi possível conectar ao banco de dados");
      }
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
    
    public function getById($id) : ? Produto {
      $sql_byId = "SELECT * FROM produtos WHERE prod_id = :id";

      try{
        $stmt_byId = $this->db->prepare($sql_byId);
        $stmt_byId->bindValue(':prod_id', $id);
        $stmt_byId->setFetchMode(PDO::FETCH_CLASS, 'Produto');
        
        $produto = $stmt_byId->fetch();
        return($produto !== false ) ? $produto : null;
      }
      catch(PDOException $e) {
        return null;
      }
    }
    
    public function bringAll() : array {
      $db = Database::getConection();
      $sql_bring = "SELEC * FROM produtos";

      try{
        $stmt_bring = $db->prepare($sql_bring);
        $stmt_bring->execute();
        $stmt_bring->setFetchMode( PDO::FETCH_CLASS, 'Produto' );
        
        $produtos = $stmt_bring->fetchAll();
        return $produtos;

      }catch(PDOException $e){
        return [];
      }
    }

    // METHODS - ACTIVITE
    

    public function remove_qtd($qtd) : bool {
      if( $qtd > $this->qtd){
        return false;
        exit();
      }

      $this->qtd -= $qtd;
      $sql_remove = "UPDATE produto SET prod_quantidade = :quantidade WHERE prod_id = :id"; // QUERY SQL PARA ATUALIZAR

      $stmt_remove = $this->db->prepare($sql_remove);
      $stmt_remove->bindValue( ':id', $this->id );
      $stmt_remove->bindValue(':quantidade', $this->qtd);
      
      return $stmt_remove->execute();
    }
  }
?>