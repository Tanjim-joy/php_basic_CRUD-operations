
<?php    
	include_once('config.php');

    $s_id = $_GET['s_id'];
    $getDepartmentData = mysqli_query($conn, "SELECT * FROM sections WHERE s_id=$s_id");

    while($department_data = mysqli_fetch_array($getDepartmentData))
    {
        $s_name = $department_data['s_name'];
        $s_code = $department_data['s_code'];
    }
?>

<?php
    if(isset($_POST['Update']))
{
	$s_id = $_GET['s_id'];
    $s_name = $_POST['s_name'];
    $s_code = $_POST['s_code'];
// echo $departmentEditId;
// echo $departmentName;
// echo $departmentCode;
	// update user data
	$departmentDataUpdate = mysqli_query($conn, "UPDATE sections 
    SET s_name='$s_name',s_code='$s_code' WHERE s_id=$s_id");
    // mysqli_query($mySqliConnection,"UPDATE department set dep_name='" . $_POST['dep_name'] . "', dep_code='" . $_POST['dep_code'] . "' WHERE id='" . $_POST['id'] . "'");

    if($departmentDataUpdate){
        echo "data update successfully";
    }else{
        echo "Something went wrong";
    }
	// Redirect to homepage to display updated user in list
	header("Location: s_index.php");
}


?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit sections</title>


        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">

            <div class="row">
                <nav class="navbar navbar-expand-lg bg-light">
                    <a class="navbar-brand" href="http://localhost/joy_task/">My Task</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav ms-auto">
                            <a class="nav-link active" aria-current="page" href="http://localhost/joy_task/">Employee</a>
                            <a class="nav-link" href="http://localhost/joy_task/department.php">Department</a>
                            <a class="nav-link" href="http://localhost/joy_task/section.php">Section</a>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="row justify-content-center">
                <div class="col-5">
                    <div class="card mt-4">
                        <div class="card-body">

                        <h5 class="card-title">Edit sections</h5>

                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="s_name" class="form-label">sections Name</label>
                                <input type="text" class="form-control" id="s_name" value="<?php echo $s_name;?>" name="s_name">
                            </div>
                            <div class="mb-3">
                                <label for="s_code" class="form-label">sections Code</label>
                                <input type="text" class="form-control" id="s_code"  value="<?php echo $s_code;?>" name="s_code">
                            </div>
                            <input type="submit" name="Update" class="btn btn-primary" value="Update">
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>