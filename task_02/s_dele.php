<?php
$s_id = $_GET['s_id'];

$conn=mysqli_connect('localhost','root','','task_02');
$sql ="DELETE FROM sections WHERE s_id='$s_id'";
$result=mysqli_query($conn,$sql) or die("Sql unsuccessful");

header('location: s_index.php');
?>
