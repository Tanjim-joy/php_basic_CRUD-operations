<?php
    	include_once('config.php');

        if(isset($_POST['Submit'])) {
            $employeeId = $_POST['employeeId'];
            $employeeName = $_POST['employeeName'];
            $employeeDepName = $_POST['employeeDepName'];
            $employeesecname = $_POST['employeesecname'];
            
            $addEmployeeInTable = "INSERT INTO employee (emp_id, emp_name, dep_id, s_id) VALUES ('$employeeId','$employeeName', '$employeeDepName' , '$employeesecname')";
            
            if (mysqli_query($conn, $addEmployeeInTable)) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $addEmployeeInTable . "<br>" . mysqli_error($conn);
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
        <title>Add Employee</title>


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

                        <h5 class="card-title">Add Employee</h5>

                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="employeeId" class="form-label">Employee Id</label>
                                <input type="text" name="employeeId" class="form-control" id="employeeId" aria-describedby="employeeIdHelp">
                            </div>
                            <div class="mb-3">
                                <label for="employeeName" class="form-label">Employee Name</label>
                                <input type="text" class="form-control" id="employeeName" name="employeeName">
                            </div>
                            <div class="mb-3">
                                <label for="employeeDepName" class="form-label">Employee Department</label>
                                <select class="form-select" aria-label="Default select example" name="employeeDepName">
                                    <option selected>Open this select menu</option>


                                    <?php
                                        $query = "SELECT * FROM department";

                                        if ($result = $conn->query($query)) {
        
                                            while ($row = $result->fetch_assoc()) {
                                    
                                                echo "<option value=" . $row["dep_id"] .">". $row["dep_name"] . "</option>";
                                            }

                                        }
                                    ?>


                                </select>
                            </div>

                            
                            <div class="mb-3">
                                <label for="employeesecname" class="form-label">Employee Department</label>
                                <select class="form-select" aria-label="Default select example" name="employeesecname">
                                    <option selected>Open this select menu</option>


                                    <?php
                                        $query = "SELECT * FROM sections";

                                        if ($result = $conn->query($query)) {
        
                                            while ($row = $result->fetch_assoc()) {
                                    
                                                echo "<option value=" . $row["s_id"] .">". $row["s_name"] . "</option>";
                                            }

                                        }
                                    ?>


                                </select>
                            </div>
                            <input type="submit" name="Submit" class="btn btn-primary" value="Submit">
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>