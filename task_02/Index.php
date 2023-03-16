<?php
    include_once("config.php");

    $getDepartmentData = mysqli_query($conn, "SELECT * FROM department");

    while($department_data = mysqli_fetch_array($getDepartmentData))
    {
        $departmentId = $department_data['dep_id'];
        $departmentName = $department_data['dep_name'];
        $departmentCode = $department_data['dep_code'];
    }
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Employee</title>


        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">

            <div class="row">
                <nav class="navbar navbar-expand-lg bg-light">
                    <a class="navbar-brand" href="hindex.php">My Task</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav ms-auto">
                            <a class="nav-link active" aria-current="page" href="index.php/">Employee</a>
                            <a class="nav-link" href="dep_index.php">Department</a>
                            <a class="nav-link" href="S_index.php">Section</a>
                        </div>
                    </div>
                </nav>
            </div>


            <div class="add-employee mt-4">
                <a type="button" href="add_employee.php" class="btn btn-primary">Add Employee</a>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card mt-4">
                        <div class="card-body">

                        <h5 class="card-title">All Employee</h5>


                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Employee Id</th>
                                    <th scope="col">Employee Name</th>
                                    <th scope="col">Department</th>
									<th scope="col">Sections</th>
                                    <!-- <th scope="col">Section</th> -->
                                    <th scope="col">Acton</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                                $i = 1;
                                $employeequery = "SELECT
										*
									FROM
										employee
									INNER JOIN department ON employee.dep_id = department.dep_id
									INNER JOIN sections ON employee.s_id = sections.s_id";

                                if ($employeeData = $conn->query($employeequery)) {

                                    /* fetch associative array */
                                    while ($data = $employeeData->fetch_assoc()) {
                                
                                    echo "<tr>";
                                    echo "<th>" . $i++ . "</th>";
                                    echo "<th>" . $data['emp_id'] . "</th>";
                                    echo "<th>" . $data['emp_name'] . "</th>";
                                    echo "<th>" . $data['dep_name']. "</th>";
									echo "<th>" . $data['s_name'] . "</th>";
                                    // echo "<th>" . $data['dep_id'] . "</th>";
                                    echo "<td>";
                                        echo "<a type='button' href='editemployee.php?id=$data[id]' class='btn btn-warning'>Edit</a>";
                                        echo "<a type='button' href='deleteemployee.php?id=$data[id]' class='btn btn-danger'\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>";
                                        
                                    echo "</td>";
                                    echo "</tr>";
                                }


                                   /* free result set */
                                   $employeeData->free();
                                }
                            ?>
                                
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>