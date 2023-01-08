<?php
  include ('../config/dbConfig.php');

class employeeAPI{
  
  public function getAPI($employees_array){
    while($row = mysqli_fetch_row($result))
      $employees_array[] = $row;
      if(!$employees_array){
       JSONResponse('404', 'No Data found', null);
      }else{
        JSONResponse('200', 'OK', $employees_array);
      }
  }
      function JSON($status, $message, $data ){
        header("HTTP/1.2 ".$message);
        $response['status'] = $status;
        $response['message'] = $message;
        $response['data'] = $data;
        print_r(json_encode($response));
  
      }
}
 ?>
