<?php
  class Produto{
    // PARAMS
    private $id;
    private $name;
    private $value;
    private $qtd; // Quantidade;

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
    public function getById(){}
    public function bringAll(){}

    // METHODS - ACTIVITE
    public function totalCalculate(){}
  }
?>