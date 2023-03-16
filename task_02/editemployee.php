<?php
    
	include_once('config.php');

    $employeeEditId = $_GET['id'];
    $getEmployeeData = mysqli_query($conn, "SELECT * FROM employee 
    WHERE id=$employeeEditId");

    while($department_data = mysqli_fetch_array($getEmployeeData))
    {
        $employeeId = $department_data['emp_id'];
        $employeeName = $department_data['emp_name'];
        $selectedEmployeeDepName = $department_data['dep_id'];
        $selectedEmployeeSecName = $department_data['s_id'];
    }
?>

<?php
    if(isset($_POST['update']))
{
    // echo "<pre>";
    // print_r($_POST);
    // exit;
	$employeeEditId = $_GET['id'];

    $employeeId = $_POST['emp_id'];
    $employeeName = $_POST['emp_name'];
    $employeeDepName = $_POST['inp_dep_id'];
    $employeeSecName = $_POST['inp_s_id'];

	// update user data
	// $employeeDataUpdate = mysqli_query($conn, "UPDATE employee 
    // SET emp_id='$employeeId', emp_name='$employeeName', 
    // dep_id='$employeeDepName',s_id='$employeeSecName' 
    // WHERE id=$employeeEditId");

    // $employeeDataUpdate = mysqli_query($conn, "UPDATE employee a
    // JOIN department b ON a.id = b.dep_id AND a.id = b.dep_id
    // JOIN sections c ON a.id = c.s_id AND a.id = c.dep_id
    // SET a.s_id = a.s_id + 1");

   $ssql_up = "UPDATE employee
    SET emp_id = '$employeeId',
        emp_name = '$employeeName',
        dep_id = '$employeeDepName',
        s_id = '$employeeSecName'
    WHERE (id = $employeeEditId);";

    $employeeDataUpdate = mysqli_query($conn, $ssql_up);




    if($employeeDataUpdate){
        echo "data update successfully";
    }else{
        echo "Something went wrong";
    }
	// Redirect to homepage to display updated user in list
	header("Location: index.php");
}


?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Employee</title>


        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">

            <div class="row">
                
            </div>

            <div class="row justify-content-center">
                <div class="col-5">
                    <div class="card mt-4">
                        <div class="card-body">

                        <h5 class="card-title">Edit Employee</h5>

                        <form action="" method="post">
                        <div class="mb-3">
                                <label for="emp_id" class="form-label">Employee Id</label>
                                <input type="text" name="emp_id" class="form-control" value="<?php echo $employeeId ?>" id="emp_id" aria-describedby="employeeIdHelp">
                            </div>
                            <div class="mb-3">
                                <label for="emp_name" class="form-label">Employee Name</label>
                                <input type="text" class="form-control" id="emp_name" value="<?php echo $employeeName ?>" name="emp_name">
                            </div>
                            <div class="mb-3">
                                <label for="employeeDepName" class="form-label">Employee Department</label>
                                <select class="form-select" aria-label="Default select example" name="inp_dep_id">
                                    <?php
                                        $query = "SELECT * FROM department";

                                        if ($result = $conn->query($query)) {
        
                                            while ($row = $result->fetch_assoc()) {
                                                if ($selectedEmployeeDepName == $row["dep_id"]) {
                                                    echo "<option value=" . $row["dep_id"] ." selected>". $row["dep_name"] . "</option>";
                                                }else{
                                                    echo "<option value=" . $row["dep_id"] .">". $row["dep_name"] . "</option>";
                                                }
                                }

                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="employeeSecName" class="form-label">Employee Sections</label>
                                <select class="form-select" aria-label="Default select example" name="inp_s_id" >
                                    <?php
                                        $query = "SELECT * FROM sections";

                                        if ($result = $conn->query($query)) {
        
                                            while ($row = $result->fetch_assoc()) {
                                    if ($selectedEmployeeSecName == $row["s_id"]) {
                                        echo "<option value='" . $row["s_id"] ."' selected>". $row["s_name"] . "</option>";
                                    }else{
                                        echo "<option value=" . $row["s_id"] .">". $row["s_name"] . "</option>";
                                    }
                                            }

                                        }
                                    ?>
                                </select>
                            </div>
                            
                            <input type="submit" name="update" class="btn btn-primary" value="Submit">
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>