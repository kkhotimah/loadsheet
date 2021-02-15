<?php
	include 'connection.php';

	$errors = array(); 

	// get id_pesawat
	$ac = $_POST['ac'];
	//if (empty($ac)) { array_push($errors, "A/C tidak boleh kosong"); }
	$id_pesawat=mysqli_query($connect,"select * from pesawat where weight=$ac");
	$row = mysqli_fetch_array($id_pesawat);
	$id_pesawat=$row['id'];

	$tanggal=date("y-m-d");
	$customer=$_POST['customer'];
	if (empty($customer)) { $customer = "a"; }

	//get id pilot
	$pilot = $_POST['pilot'];
	$id_pil = mysqli_fetch_array(mysqli_query($connect,"select * from pilot where nick_name='$pilot'"));
	$id_pilot = $id_pil['id'];

	$nod = $_POST['nod'];
	if (empty($nod)){$nod = 0;}

	//get id copilot
	$copilot = $_POST['copilot'];
	$id_copil = mysqli_fetch_array(mysqli_query($connect,"select * from pilot where nick_name='$copilot'"));
	$id_copilot = $id_copil['id'];	

	//get id penerbangan pergi
	$from1 = $_POST['from1'];
	$via1 = $_POST['via1'];
	$to1 = $_POST['to1'];
	$penerbangan_pergi =mysqli_fetch_array(mysqli_query($connect, "select * from penerbangan where dari='$from1' and via='$via1' and ke='$to1' "));
	$id_penerbangan_pergi= $penerbangan_pergi['id'];


	//get id penerbangan pulang
	$from2 = $_POST['from2'];
	$via2 = $_POST['via2'];
	$to2 = $_POST['to2'];
	$penerbangan_pulang =mysqli_fetch_array(mysqli_query($connect, "select * from penerbangan where dari='$from2' and via='$via2' and ke='$to2'  "));
	$id_penerbangan_pulang= $penerbangan_pulang['id'];

	$fuel=$_POST['fuel'];
	if(empty ($fuel)){$fuel = 0;}

	//get oat
	$oat = $_POST['oat'];
	if(empty ($oat)){$oat = 0;}

	$prepared = $_POST['prepared'];
	$acknowledged = $_POST['acknowledged'];

	//insert ke table loadsheet						
	$query = "INSERT INTO loadsheet (no_of_destination,date,customer,id_pilot,id_copilot,id_pesawat,id_penerbangan_pergi,id_penerbangan_pulang,fuel,oat,prepared,acknowledged) VALUES('$nod','$tanggal','$customer', '$id_pilot','$id_copilot','$id_pesawat','$id_penerbangan_pergi','$id_penerbangan_pulang','$fuel','$oat','$prepared','$acknowledged')";
	//mysqli_query($connect,$query);
	if ($connect->query($query) === TRUE) {
	  echo "New record created successfully";
	} else {
	  echo "Error: " . $query . "<br>" . $connect->error;
	}

	// get id loadsheet
	$loadsheet = mysqli_query($connect, "select * from loadsheet");
	while($data_loadsheet = mysqli_fetch_array($loadsheet)){
	$id_loadsheet = $data_loadsheet['id_loadsheet'];}

	//insert data penumpang
	$c1a = $_POST['c1a'];
	if (empty ($c1a)){$c1a =0;} 
	$c1b = $_POST['c1b']; 
	if (empty ($c1b)){$c1b =0;} 
	$c1c = $_POST['c1c']; 
	if (empty ($c1c)){$c1c =0;} 
	$c1d = $_POST['c1d']; 
	if (empty ($c1d)){$c1d =0;} 
	$c1e = $_POST['c1e']; 
	if (empty ($c1e)){$c1e =0;} 
	$c1f = $_POST['c1f']; 
	if (empty ($c1f)){$c1f =0;} 
	$c1g = $_POST['c1g']; 
	if (empty ($c1g)){$c1g =0;} 
	$c1h = $_POST['c1h'];
	if (empty ($c1h)){$c1h =0;} 

	$c2a = $_POST['c2a']; 
	if (empty ($c2a)){$c2a =0;} 
	$c2b = $_POST['c2b'];
	if (empty ($c2b)){$c2b =0;}  
	$c2c = $_POST['c2c'];
	if (empty ($c2c)){$c2c =0;}  
	$c2d = $_POST['c2d']; 
	if (empty ($c2d)){$c2d =0;} 
	$c2e = $_POST['c2e']; 
	if (empty ($c2e)){$c2e =0;} 
	$c2f = $_POST['c2f']; 
	if (empty ($c2f)){$c2f =0;} 
	$c2g = $_POST['c2g']; 
	if (empty ($c2g)){$c2g =0;} 
	$c2h = $_POST['c2h'];
	if (empty ($c2h)){$c2h =0;} 

	$c3a = $_POST['c3a']; 
	if (empty ($c3a)){$c3a =0;} 
	$c3b = $_POST['c3b'];
	if (empty ($c3b)){$c3b =0;}  
	$c3c = $_POST['c3c']; 
	if (empty ($c3c)){$c3c =0;} 
	$c3d = $_POST['c3d']; 
	if (empty ($c3d)){$c3d =0;} 
	$c3e = $_POST['c3e']; 
	if (empty ($c3e)){$c3e =0;} 
	$c3f = $_POST['c3f']; 
	if (empty ($c3f)){$c3f =0;} 
	$c3g = $_POST['c3g']; 
	if (empty ($c3g)){$c3g =0;} 
	$c3h = $_POST['c3h'];
	if (empty ($c3h)){$c3h =0;} 

	$query1= "INSERT INTO penumpang(c1a,c1b,c1c,c1d,c2a,c2b,c2c,c2d,c3a,c3b,c3c,c3d,kode_terbang,id_loadsheet) VALUES
			('$c1a','$c1b','$c1c','$c1d','$c2a','$c2b','$c2c','$c2d','$c3a','$c3b','$c3c','$c3d','pergi','$id_loadsheet'),
			('$c1e','$c1f','$c1g','$c1h','$c2e','$c2f','$c2g','$c2h','$c3e','$c3f','$c3g','$c3h','pulang','$id_loadsheet')";

	if ($connect->query($query1) === TRUE) {
	  echo "New record penumpang created successfully";
	} else {
	  echo "Error: " . $query1 . "<br>" . $connect->error;
	}

	//insert data cargo
	$cargo1 = $_POST['cargo1'];
	if (empty ($cargo1)){$cargo1 = 0;}
	$cargo2 = $_POST['cargo2'];
	if (empty ($cargo2)){$cargo2 = 0;}

	$query2 = "INSERT INTO cargo(cargo_pergi,cargo_pulang,id_loadsheet) VALUES ('$cargo1','$cargo2','$id_loadsheet')";
	if ($connect->query($query2) === TRUE) {
	  echo "New record penumpang created successfully";
	} else {
	  echo "Error: " . $query2 . "<br>" . $connect->error;
	}
	
	header('location: data.php?id='.$id_loadsheet);			  
?>