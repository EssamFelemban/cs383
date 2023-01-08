<?php
class Database {

  private $host;
  private $username;
  private $password;
  private $dbname;

  public function __construct(){
    $this->host = 'localhost';
    $this->username = 'cs383';
    $this->password = '112233';
    $this->dbname = 'users';
  }

  public function connect(){
    $conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname,$this->username,$this->password);

    return $conn;
  }

  public function select($tableName, $params){
    $query = " Select * from $tableName ";
    //print_r ($params);
    if($params){
        $query .= " WHERE 1=1 ";
        foreach ($params as $key=>$value)
            $query .= " AND $key = '$value' ";
    }
      //$query .= " ORDER BY id ";
    return $query;
  }

}




//$db = new Database();
//print_r($db);
