<?php
  class Database{
    // CONFIGS
    private static $host = 'localhost';
    private static $database = 'loja_virtual';
    private static $user = 'root';
    private static $passwrod = 'aluno';

    public function getConection(){
      try{
        
        $conect = new PDO( "mysql:host=" . $this->host . "; dbname=" . $this->database, $this->user, $this->passwrod );
        $conect -> setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        return $conect;

      } catch(PDOException $e){
        echo "Erro ao conectar ao banco";
      }
    }
  }
?>