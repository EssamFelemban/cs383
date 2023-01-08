<?php
class Users{

  private $id; //database fields.
  private $name; //database fields.

  //private $tableName = 'users';

  private $db;
  private $dbConn;

  public function __construct($conn){
    $this->db = $conn;
    $this->dbConn = $this->db->connect();
  }


  public function table_name(){
    return 'users';
  }

  public function find($params){
    $data  = array();

    $query = $this->db->select($this->table_name(), $params);

    $result = $this->dbConn->prepare($query);
    $result->execute();

    while ($row = $result->fetch(PDO::FETCH_ASSOC))

      $data[] = array(
                      $row['id'],
                      $row['name'],
                      '<a href="controller.php?action=update"> update </a>',
                      '<a href="controller.php?action=delete"> delete </a>'

                    );

    return $data;
  }

  public function save(){
      //print_r($_POST);
      $query = "Insert into users values(null,
                '$_POST[name]'

                )";
      $result = $this->dbConn->prepare($query);
      $result->execute();

      return true;
  }

}
 ?>
