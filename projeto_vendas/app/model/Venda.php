<?php
  require_once DATABASE_PATH;

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

    // SETTERS
    public function setId( $id ){ $this->id = $id; }
    public function setProdId( $prodId ){ $this->prodId = $prodId; }
    public function setQtd( $qtd ){ $this->qtd = $qtd; }
    public function setValue( $value ){ $this->value = $value; }
    public function setDate( $date ){ $this->date = $date; }

    // METHODS
    public function register() : bool{
      try {
        $sql = "INSERT INTO vendas (prod_id, quantidade, venda_valor, venda_data) VALUES (:prod_id, :quantidade, :venda_valor, :venda_data)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':prod_id', $this->prodId);
        $stmt->bindValue(':quantidade', $this->qtd);
        $stmt->bindValue(':venda_valor', $this->value);
        $stmt->bindValue(':venda_data', $this->date);
      
        return $stmt->execute();

      } catch(PDOException $e) {
        return false;
      }
    }

    public function update(){
      try {
        $sql = "UPDATE vendas SET prod_id = :prod_id, quantidade = :quantidade, venda_valor = :venda_valor, venda_data = :venda_data WHERE venda_id = :venda_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':venda_id', $this->id);
        $stmt->bindValue(':prod_id', $this->prodId);
        $stmt->bindValue(':quantidade', $this->qtd);
        $stmt->bindValue(':venda_valor', $this->value);
        $stmt->bindValue(':venda_data', $this->date);
        
        return $stmt->execute();
      } catch(PDOException $e) {
        return false;
      }
    }

    public function getById($id){
      try {
        $sql = "SELECT * FROM vendas WHERE venda_id = :venda_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':venda_id', $id);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result) {
          $this->id = $result['venda_id'];
          $this->prodId = $result['prod_id'];
          $this->qtd = $result['quantidade'];
          $this->value = $result['venda_valor'];
          $this->date = $result['venda_data'];
          return $this;
        }
        return false;
      } catch(PDOException $e) {
        return false;
      }
    }

    public function bringAll() : array {
      try {
        $sql = "SELECT * FROM vendas ORDER BY venda_data DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode( PDO::FETCH_CLASS, 'Venda' );
        
        $vendas = $stmt->fetchAll();
        return $vendas;
        
      } catch(PDOException $e) {
        return [];
      }
    }

    public function totalCalculate($qtd, $value) : int {
      $totalValue = $value * $qtd;
      return $totalValue;
    }
  }
?>