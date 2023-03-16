
<?php    
	include_once('config.php');

    $dep_id = $_GET['dep_id'];
    $getDepartmentData = mysqli_query($conn, "SELECT * FROM department WHERE dep_id=$dep_id");

    while($department_data = mysqli_fetch_array($getDepartmentData))
    {
        $departmentName = $department_data['dep_name'];
        $departmentCode = $department_data['dep_code'];
    }
?>

<?php
    if(isset($_POST['Update']))
{
	$departmentEditId = $_GET['dep_id'];
    $departmentName = $_POST['departmentName'];
    $departmentCode = $_POST['departmentCode'];
// echo $departmentEditId;
// echo $departmentName;
// echo $departmentCode;
	// update user data
	$departmentDataUpdate = mysqli_query($conn, "UPDATE department SET dep_name='$departmentName',dep_code='$departmentCode' WHERE dep_id=$departmentEditId");
    // mysqli_query($mySqliConnection,"UPDATE department set dep_name='" . $_POST['dep_name'] . "', dep_code='" . $_POST['dep_code'] . "' WHERE id='" . $_POST['id'] . "'");

    if($departmentDataUpdate){
        echo "data update successfully";
    }else{
        echo "Something went wrong";
    }
	// Redirect to homepage to display updated user in list
	header("Location: dep_index.php");
}


?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Department</title>


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

                        <h5 class="card-title">Edit Department</h5>

                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="departmentName" class="form-label">Department Name</label>
                                <input type="text" class="form-control" id="departmentName" value="<?php echo $departmentName;?>" name="departmentName">
                            </div>
                            <div class="mb-3">
                                <label for="departmentCode" class="form-label">Department Code</label>
                                <input type="text" class="form-control" id="departmentCode"  value="<?php echo $departmentCode;?>" name="departmentCode">
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