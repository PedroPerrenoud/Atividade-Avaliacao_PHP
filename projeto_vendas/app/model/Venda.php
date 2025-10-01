<?php
  class Venda{
    // PARAMS
    private $id;
    private $prodId;
    private $qtd;
    private $value;
    private $date;

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
    public function register(){}
    public function update(){}
    public function getById(){}
    public function bringAll(){}
  }
?>