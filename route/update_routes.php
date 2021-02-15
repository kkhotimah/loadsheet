<?php
	include '../connection.php';

    //insert ke table penerbangan
    $id = $_GET['id'];
	$dari = $_POST['from'];
	$via = $_POST['via'];
	$ke = $_POST['to'];					
	$query = "UPDATE penerbangan SET dari='$dari', via='$via', ke='$ke' WHERE id=$id ";
	//mysqli_query($connect,$query);
	if ($connect->query($query) === TRUE) {
	  echo "Updated successfully";
	} else {
	  echo "Error: " . $query . "<br>" . $connect->error;
	}
	header('location: route.php');
	
?> 