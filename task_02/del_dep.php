<?php
$dep_id = $_GET['id'];

$conn=mysqli_connect('localhost','root','','task_02');
$sql ="DELETE FROM department WHERE dep_id='$dep_id'";
$result=mysqli_query($conn,$sql) or die("Sql unsuccessful");

header('location:dep_index.php');
?>
