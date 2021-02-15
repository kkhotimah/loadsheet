<?php
	include '../connection.php';

    //update data pesawat
    $id = $_GET['id'];
	$name = $_POST['name'];
	$weight = $_POST['weight'];
						
	$query = "UPDATE pesawat SET name='$name', weight='$weight' WHERE id=$id";
	//mysqli_query($connect,$query);
	if ($connect->query($query) === TRUE) {
	  echo "Update successfully";
	} else {
	  echo "Error: " . $query . "<br>" . $connect->error;
	}
	header('location: ac.php');

?>