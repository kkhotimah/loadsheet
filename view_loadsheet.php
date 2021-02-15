<?php
	include 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Loadsheet</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/data.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	
<h3 class="text-center text-white pt-5" align="center" color="white">Data Loadsheet</h3> 
<a href="home.php" class="text-white pl-5">Home</a> 
<div id="kanvas">
<table class="table table-bordered">
<thead>
	<tr>
		<th>No</th>
		<th>No of Destination</th>
		<th>Date</th>
		<th>Pilot</th>
		<th>Pesawat</th>
		<th>Action</th>
	</tr>
	</thead>
    <tbody>
	<?php
		
	//query menampilkan data
	$sql = mysqli_query($connect,"SELECT * FROM loadsheet INNER JOIN pesawat ON loadsheet.id_pesawat= pesawat.id INNER JOIN pilot ON loadsheet.id_pilot = pilot.id");
	$no = 1;
	while($data = mysqli_fetch_array($sql)){
		echo '
		<tr>
			<td>'.$no.'</td>
			<td>'.$data['no_of_destination'].'</td>
			<td>'.$data['date'].'</td>
			<td>'.$data['nick_name'].'</td>
			<td>PK-'.$data['name'].'</td>
			<td><a href="data.php?id='.$data['id_loadsheet'].'"> <i class="fa fa-folder-open"></i></a> <a href="download.php?id='.$data['id_loadsheet'].'"> <i class="fa fa-download"> </i></a><a href="delete_loadsheet.php?id='.$data['id_loadsheet'].'"> <i class="fa fa-remove" style="color:red"></i> </a></td>
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