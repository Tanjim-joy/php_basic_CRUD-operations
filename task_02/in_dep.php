<?php
include_once("config.php");
  if(isset($_POST['regist'])){
      
      $dep_code=$_POST['dep_code'];
      $dep_name=$_POST['dep_name'];
      
      
      $result=mysqli_query($conn,"insert into department (dep_name,dep_code) 
      values ('$dep_name', '$dep_code')");

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
			<h2>Add New Department</h2>			
	</div>
          <form method ="POST">
                 
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label">Department Code</label>
      <input type="text" name ="dep_code" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">Please Enter Department Code</small>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label">Department Name</label>
      <input type="text" name ="dep_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">Please Enter Department Name</small>
    </div>
   
    <input type = "submit" name = "regist"  value = " Add Now">
    </form>
    <a href="dep_index.php" class="btn btn-primary pull-right">Back to Home Page</a>
</body>

    </html>