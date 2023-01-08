<?php

class Form {

  private $id;
  private $method;
  private $action;

  public function __construct($id, $method, $action){
    $this->id = $id;
    $this->method = $method;
    $this->action = $action;
  }

  public function form_start(){
      return '<form id="'.$this->id.'" method="'.$this->method.'" action="'.$this->action.'">';
  }

  public function form_submit($name, $value=""){
      return '<input type="submit" name="'.$name.'" value="'.$value.'">';
  }

  public function form_text($name, $value=""){
      return '<input type="text" name="'.$name.'" value="'.$value.'">';
  }

  public function form_label($id, $value=""){
      return '<strong><lable id="'.$id.'">'.$value.'</lable></strong><br>';
  }


  public function form_end(){
      return '</from>';
  }
}


 ?>
