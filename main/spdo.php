<?php

define('BDD_HOST', 'localhost');
define('BDD_LOGIN', 'root');
define('BDD_MDP', '');
define('BDD_DATABASE', 'test');

class SPDO{
  private $PDOInstance = null;
  private static $instance = null;
  
  private  function __construct(){
    try {
      $this->PDOInstance = new PDO('mysql:dbname='.BDD_DATABASE.';host='.BDD_HOST, BDD_LOGIN, BDD_MDP);
      $this->PDOInstance->query('SET NAMES utf8');
  	  $this->PDOInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e){
      die('<p>La connexion a Ã©chouÃ©. Erreur['.$e->getCode().'] : '.$e->getMessage().'</p>');
    }
  }
  
  public static function getBD(){  
    if (is_null(self::$instance)){
      //echo "===> Creation instance\r\n";
      self::$instance = new SPDO();
    }
    else
     // echo "Instance existe !\r\n";
    return self::$instance;
  }
  
  public function query($query){
    return $this->PDOInstance->query($query);
  }
  
  public function prepare($query){
    return $this->PDOInstance->prepare($query);
  }
  
  public function lastInsertId($name=null){
    return $this->PDOInstance->lastInsertId($name);
  }  

}


function fonctionA(){
  $pdo = SPDO::getBD();
}

function fonctionB(){
  $pdo = SPDO::getBD();
}

fonctionB();
fonctionA();
$pdo = SPDO::getBD();

?>
