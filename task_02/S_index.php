<?php
include_once("config.php");

$result = mysqli_query($conn, "SELECT * FROM sections");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sections</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	
	<div class="container">
		<div class="row">
			<h2>Sections List</h2>
			<a href="s_in.php" class="btn btn-primary pull-right">Add New</a>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Section Code</th>
						<th>Section Name</th>
                        <th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php
					
					while($res = mysqli_fetch_array($result)) { 		
						echo "<tr>";
						echo "<td>".$res['s_code']."</td>";
						echo "<td>".$res['s_name']."</td>";
                        echo "<td><a href=\"s_edit.php?s_id=$res[s_id]\">Edit</a> | <a href=\"s_dele.php?id=$res[s_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
						}
					?>
				</tbody>
			</table>
		</div>		
	</div>
</body>
</html>
