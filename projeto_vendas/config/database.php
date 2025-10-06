<?php
  class Database{
    // CONFIGS
    private static $host = 'localhost';
    private static $database = 'loja_virtual';
    private static $user = 'root';
    private static $passwrod = 'aluno';

    public static function getConection(){
      try{
        
        $conect = new PDO( "mysql:host=" . self::$host . "; dbname=" . self::$database, self::$user, self::$passwrod );
        $conect -> setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        return $conect;

      } catch(PDOException $e){
        return null;
      }
    }
  }
?>