<?php
include_once("config.php");
  if(isset($_POST['regist'])){
      $nameid=$_POST['emp_id'];
      $name=$_POST['emp_name'];
      $email=$_POST['email'];
      $address=$_POST["address"];
      $salary=$_POST["salary"];
      
      $result=mysqli_query($conn,"insert into employee (emp_id,emp_name,email,address,salary) values ('$nameid', '$name','$email','$address','$salary')");

      if($result){
          echo ("Data insert succesfully");
		  //header("location:view.php");
      }
    
      else{
          echo ("Failed");
      }     
}
?>

<html>
    <head>
        <title> insert </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>
    <div class="container">
    <div class="row">
			<h2>Add New Employee</h2>			
	</div>
          <form method ="POST">
                 
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label">Employee ID</label>
      <input type="text" name ="emp_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">Please Enter Employee ID</small>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label">Employee Name</label>
      <input type="text" name ="emp_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">Please Enter Employee Name</small>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label">Employee Email</label>
      <input type="email" name ="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">Please Enter Employee Email</small>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label">Address</label>
      <input type="address" name ="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">Please Enter Employee Address</small>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label">Salary</label>
      <input type="salary" name ="salary" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">Add Employee salary</small>
    </div>
    <input type = "submit" name = "regist"  value = " Add Now">
    </form>
    <a href="index.php" class="btn btn-primary pull-right">Back to Home Page</a>
</body>

    </html>