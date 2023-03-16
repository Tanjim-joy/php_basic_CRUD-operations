<?php
    include_once("config.php");

    $employeeEditId = $_GET['id'];
    $deleteemployee = mysqli_query($conn, "DELETE FROM employee WHERE id=$employeeEditId");


    header("Location: index.php");
?>