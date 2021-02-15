<?php
	include '../connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Loadsheet</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/data.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	
<h3 class="text-center text-white pt-5" align="center" color="white">Data Pilot</h3> 
<a href="../home.php" class="text-white pl-5">Home</a> 
<a href="insert_pilot.php" class="text-white pl-5">Add Pilot</a>
<div id="kanvas">
<table class="table table-bordered">
<thead>
	<tr>
		<th rowspan="2">No</th>
		<th>Nama Pilot</th>
		<th>Berat Pilot</th>
		<th>Action</th>
	</tr>
	</thead>
	<tbody>

	<?php
		
	//query menampilkan data
	//$l_routes = 0;
	$no = 1;
	
	$pilot = mysqli_query($connect,"SELECT * FROM pilot");
	while ($pilots = mysqli_fetch_array($pilot)) {

		echo '
		<tr>
			<td>'.$no.'</td>
			<td>'.$pilots['nick_name'].'</td>
			<td>'.$pilots['weight'].'</td>
			<td><td><a href=update_pilot.php?id='.$pilots['id'].'> <i class="fa fa-edit"></i> </a><a href="delete_pilot.php?id='.$pilots['id'].'"><i class="fa fa-remove" style="color:red"></i> </a></td>	
		</tr>
		';
		$no++;
	}
	?>
	</tbody>
</table>
</div>
</body>
</html>