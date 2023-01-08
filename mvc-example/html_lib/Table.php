<?php

class Table{

    public function table_header($table_header){
      $tableHeader = '<table border=1>';
      $tableHeader .= '<tr>';

      foreach ($table_header as $th)
        $tableHeader .= '<th>'.$th.'</th>';

      $tableHeader .= '</tr>';

      return $tableHeader;
    }

    public function table_body($data){
      $tableBody = '';

      foreach ($data as $tr){
        $tableBody .= '<tr>';

        foreach ($tr as $key => $value){
          $tableBody .= "<td>" . $value . "</td>";
        }

        $tableBody .= '</tr>';
      }

      return $tableBody;
    }

    public function table_footer(){
        return '</table>';
    }
}


 ?>
