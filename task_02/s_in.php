<?php
include_once("config.php");
  if(isset($_POST['regist'])){
      
      $s_code=$_POST['s_code'];
      $s_name=$_POST['s_name'];
      
      
      $result=mysqli_query($conn,"insert into sections (s_name,s_code) 
      values ('$s_name', '$s_code')");

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
			<h2>Add New Sections</h2>			
	</div>
          <form method ="POST">
                 
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label">Sections Code</label>
      <input type="text" name ="s_code" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">Please Enter Sections Code</small>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label">Sections Name</label>
      <input type="text" name ="s_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">Please Enter Sections Name</small>
    </div>
   
    <input type = "submit" name = "regist"  value = " Add Now">
    </form>
    <a href="s_index.php" class="btn btn-primary pull-right">Back to Home Page</a>
</body>

    </html>