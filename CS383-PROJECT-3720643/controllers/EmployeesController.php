<?php
include ('../config/Database.php');
include ('../models/Employees.php');

class EmployeesController{

  function index(){
    echo '<h1>This is the employees controller index</h1>';
  }

  function Employees(){
    $db = new Database();
    $employees = new Employees($db);

    if(isset($_GET['id'])){
      $id = $_GET['id'];
      $params = ['employeeNumber' => $id];
    }else{
      $id = 0;
      $params = null;
    }

    $data = $employees->find($params);

    include('../views/employees-view.php');
  }

  function CreateEmployee(){
    $db = new Database();
    if(isset($_POST['insert'])&& !empty($_POST['employeenumber']) && !empty($_POST['firstName'])&& !empty($_POST['lastName'])&& 
    !empty($_POST['extension'])&& !empty($_POST['email'])&& !empty($_POST['postalCode'])&&
     !empty($_POST['reportsTo'])&& !empty($_POST['jobTitle']))
    {
    $eNum = $_POST['employeenumber'];
    $fname=$_POST['firstName'];
    $lname=$_POST['lastName'];
    $extension=$_POST['extension'];
    $email=$_POST['email'];
    $postalCode=$_POST['postalCode'];
    $reportsTo=$_POST['reportsTo'];
    $jobTitle=$_POST['jobTitle'];
    
    //sendig the variables to the insert function Employee model
    $sql=$db->insertEmployee($eNum,$lname,$fname,$extension,$email,$postalCode,$reportsTo,$jobTitle);
    if($sql)
    {
    echo "<script>alert('Record inserted successfully');</script>";
    echo "<script>window.location.href='index.php'</script>";
    }
    else
    {
    echo "<script>alert('Something went wrong. Please try again');</script>";
    echo "<script>window.location.href='index.php'</script>";
    }
    }
    include('../views/employees-create.php');
}


  
  function getEmployeesAPI(){
    
    return employeesAPI();
  
  }

  function UpdateEmployee(){
    if(isset($_POST['update'])){
      $updatedata=new DB_con();
  
if(isset($_POST['save']))
{
// Get the the employee id from the table
$eID=intval($_POST['id']);
if(!empty($_POST['employeenumber']) && !empty($_POST['firstName'])&& !empty($_POST['lastName'])&& 
    !empty($_POST['extension'])&& !empty($_POST['email'])&& !empty($_POST['postalCode'])&&
     !empty($_POST['reportsTo'])&& !empty($_POST['jobTitle']))
    {
    $eNum = $_POST['employeenumber'];
    $fname=$_POST['firstName'];
    $lname=$_POST['lastName'];
    $extension=$_POST['extension'];
    $email=$_POST['email'];
    $postalCode=$_POST['postalCode'];
    $reportsTo=$_POST['reportsTo'];
    $jobTitle=$_POST['jobTitle'];
    
    //sendig the variables to the insert function Employee model
    $sql=$db->insertEmployee($eNum,$lname,$fname,$extension,$email,$postalCode,$reportsTo,$jobTitle);
    if($sql)
    {
    echo "<script>alert('Record Updated successfully');</script>";
    echo "<script>window.location.href='index.php'</script>";
    }
    else
    {
    echo "<script>alert('Something went wrong. Please try again');</script>";
    echo "<script>window.location.href='index.php'</script>";
    }
    }
    include('../views/employees-create.php');

$sql=$db->updateEmployee($employeeNum,$lname,$fname,$extension,$email,$postalCode,$reportsTo,$jobTitle);
if($sql){
//Function Calling
echo "<script>alert('Record saved, successfully!');</script>";
}else{
      echo  "<script>alert('Something went wrong. Please try again');</script>";

    }
  }


  function DeleteEmployee(){
    if(!empty($_POST['id'])){
      $id=$_POST['id'];
      $sql=$db->deleteEmployee($id);

      if($sql){
        //Function Calling
        echo "<script>alert('Record deleted, successfully!');</script>";
        }else{
              echo  "<script>alert('Something went wrong. Please try again');</script>";
        
            }

      
    }
  }
}
}

}//class ends 

if(isset($_GET['action'])){
  if($_GET['action'] == 'insert')
    echo EmployeesController::CreateEmployee();
  else if($_GET['action'] == 'update')
    echo EmployeesController::UpdateEmployee();
    else if($_GET['action'] == 'delete')
    echo EmployeesController::DeleteEmployee();
    
    else 
    echo EmployeesController::Employees();
}