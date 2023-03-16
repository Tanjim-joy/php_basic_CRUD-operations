<?php
include_once("config.php");

$result = mysqli_query($conn, "SELECT * FROM department");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Departmet</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<h2>Departmet List</h2>
			<a href="in_dep.php" class="btn btn-primary pull-right">Add New</a>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Departmet Code</th>
						<th>Departmet Name</th>
                        <th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php
					
					while($res = mysqli_fetch_array($result)) { 		
						echo "<tr>";
						echo "<td>".$res['dep_code']."</td>";
						echo "<td>".$res['dep_name']."</td>";
                        echo "<td><a href=\"edit_dept.php?dep_id=$res[dep_id]\">Edit</a> | <a href=\"del_dep.php?id=$res[dep_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
						}
					?>
				</tbody>
			</table>
		</div>		
	</div>
</body>
</html>
