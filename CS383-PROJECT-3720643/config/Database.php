<?php
class Database {

  private $host;
  private $username;
  private $password;
  private $dbname;

  public function __construct(){
    $this->host = 'localhost';
    $this->username = 'root';
    $this->password = '';
    $this->dbname = 'test';
  }

  public function connect(){
    $conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname,$this->username,$this->password);

    return $conn;
  }

  public function select($tableName, $params){
    $query = " Select * from $tableName ";
    if($params){
        $query .= " WHERE 1=1 ";
        foreach ($params as $key=>$value)
            $query .= " AND $key = '$value' ";
    }
    return $query;
  }


  /*
  public function join($tableNames,$params,$aliases){
    $query = "SELECT ";
    print_r($tableNames);
    print_r ($params);
    print_r($aliases);

  }
  */
  public function insertEmployee($tableName,$lname,$fname,$extension,$email,$officeCode,$reportsTo,$jobTitle){
    $query = " INSERT INTO $tableName ";
    
    return $query;
  }
  



}
