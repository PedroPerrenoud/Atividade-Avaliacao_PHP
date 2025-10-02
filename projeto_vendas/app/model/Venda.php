<?php
  class Venda{
    // PARAMS
    private $id;
    private $prodId;
    private $qtd;
    private $value;
    private $date;
    private $db;

    public function __construct(){
      $database = new Database();
      $this->db = $database->getConection();
      if ($this->db === null) {
        throw new Exception("Não foi possível conectar ao banco de dados");
      }
    }

    // GETTERS
    public function getId(){ return $this->id; }
    public function getProdId(){ return $this->prodId; }
    public function getQtd(){ return $this->qtd; }
    public function getValue(){ return $this->value; }
    public function getDate(){ return $this->date; }

    public function setProdId( $prodId ){ $this->prodId = $prodId; }
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
      $sql_bring = "SELECT * FROM vendas";

      try{
        $stmt_bring = $this->db->prepare($sql_bring);
        $stmt_bring->execute();
        $stmt_bring->setFetchMode( PDO::FETCH_CLASS, 'Venda' );
        
        $vendas = $stmt_bring->fetchAll();
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