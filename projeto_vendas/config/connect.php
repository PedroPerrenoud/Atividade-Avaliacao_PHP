<?php
  class Connect{
    // CONFIGS
    private static $host = 'localhost';
    private static $database = '';
    private static $user = 'root';
    private static $passwrod = 'aluno';

    public function getConection(){
      $conect = new PDO( "mysql:host=" . $this->host . "; dbname=" . $this->database, $this->user, $this->passwrod );
      $conect -> setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
      return $conect;
    }
  }
?>