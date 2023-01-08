<?php
include ('../config/Database.php');
include ('../models/Users.php');

class Controller{

  function index(){
    echo '<h1>This is the controller index</h1>';
  }

  function Users(){
    $db = new Database();
    $users = new Users($db);

    if(isset($_GET['id'])){
      $id = $_GET['id'];
      $params = ['id' => $id];
    }else{
      $id = 0;
      $params = null;
    }

    $data = $users->find($params);

    include('../views/users-view.php');
  }

  function CreateUser(){

      include('../views/users-create.php');
  }

  function SaveUser(){
    $db = new Database();
    $user = new Users($db);

    if($user->save())
        echo Controller::Users();
  }

}

if(isset($_GET['action'])){
  if($_GET['action'] == 'create')
    echo Controller::CreateUser();
  else if($_GET['action'] == 'save')
    echo Controller::SaveUser();
  else
    echo Controller::Users();
}
