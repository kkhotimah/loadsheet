<?php
	include '../connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Loadsheet</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" type="text/css" href="../css/data.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	
<h3 class="text-center text-white pt-5" align="center" color="white">Data Pesawat (A/C)</h3> 
<a href="../home.php" class="text-white pl-5">Home</a> 
<a href="insert_ac.php" class="text-white pl-5">Add A/C</a> 
<div id="kanvas">
<table class="table table-bordered">
	<thead>
	<tr>
		<th rowspan="2">No</th>
		<th>Nama Pesawat</th>
		<th>Berat Pesawat</th>
		<th>Action</th>
	</tr>
</thead>
	
	<?php
		
	//query menampilkan data
	//$l_routes = 0;
	$no = 1;
	
	$ac = mysqli_query($connect,"SELECT * FROM pesawat");
	while ($acs = mysqli_fetch_array($ac)) {

		echo '
		<tr>
			<td>'.$no.'</td>
			<td>'.$acs['name'].'</td>
			<td>'.$acs['weight'].'</td>
			<td><a href=update_ac.php?id='.$acs['id'].'> <i class="fa fa-edit"></i> </a><a href="delete_ac.php?id='.$acs['id'].'"> <i class="fa fa-remove" style="color:red"> </a></td>	
		</tr>
		';
		$no++;
	}
	?>
</table>
</div>
</body>
</html>