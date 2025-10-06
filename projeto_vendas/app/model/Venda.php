<?php

  require_once DATABASE_PATH;

  class Venda{
    // PARAMS
    private $id;
    private $prodId;
    private $prodName;
    private $qtd;
    private $value;
    private $date;
    private $db;

    public function __construct(){
      $this->db = Database::getConection();
    }

    // GETTERS
    public function getId(){ return $this->id; }
    public function getProdId(){ return $this->prodId; }
    public function getProdName(){ return $this->prodName; }
    public function getQtd(){ return $this->qtd; }
    public function getValue(){ return $this->value; }
    public function getDate(){ return $this->date; }

    public function setProdId( $prodId ){ $this->prodId = $prodId; }
    public function setProdName( $prodName ){ $this->prodName = $prodName; }
    public function setQtd( $qtd ){ $this->qtd = $qtd; }
    public function setValue( $value ){ $this->value = $value; }
    public function setDate( $date ){ $this->date = $date; }

    // METHODS
    public function register(){
      $sql = "INSERT INTO vendas (prod_id, quantidade, venda_valor, venda_data) VALUES (:prod_id, :quantidade, :venda_valor, :venda_data)";
      try{  
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':prod_id', $this->prodId);
        $stmt->bindValue(':quantidade', $this->qtd);
        $stmt->bindValue(':venda_valor', $this->value);
        $stmt->bindValue(':venda_data', $this->date);
        
        if($stmt->execute()){
          $this->id = $this->db->lastInsertId();
          return true;
        }
      return false;
      } catch(PDOException $e) {
        return false;
      }
    }

    public function update(){}
    public function getById(){}
    
    public function bringAll() : array {

      $sql_bring = "
        SELECT 
            v.venda_id AS id, 
            v.prod_id AS prodId, 
            v.quantidade AS qtd, 
            v.venda_valor AS value, 
            v.venda_data AS date,
            p.prod_nome AS prodName
        FROM vendas v
        INNER JOIN produtos p ON v.prod_id = p.prod_id
    ";

      try{
        $stmt_bring = $this->db->prepare($sql_bring);
        $stmt_bring->execute();
        
        $vendas = $stmt_bring->fetchAll(PDO::FETCH_ASSOC);
        return $vendas;

      }catch(PDOException $e){
        return [];
      }
    }

    public function totalValue($qtd, $value) : int{
      return $total = $qtd * $value;
    }
  }
?>