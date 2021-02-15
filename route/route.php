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
	
<h3 class="text-center text-white pt-5" align="center" color="white">Data Route</h3> 
<a href="../home.php" class="text-white pl-5">Home</a> 
<a href="add_route.php" class="text-white pl-5">Add Route</a> 
<div id="kanvas">
<table class="table table-bordered">
	<thead>
	<tr>
		<th>No</th>
		<th>Route</th>
		<th>Total Distance</th>
		<th>Total Time</th>
		<th>Action</th>
	</tr>
</thead>
	<?php
		
	//query menampilkan data
	//$l_routes = 0;
	$no = 1;
	$dist=0;
	$times=0;

	$route = mysqli_query($connect,"SELECT * FROM penerbangan");
	while ($routes = mysqli_fetch_array($route)) {
		$i = $routes['id'];
		$sql = mysqli_query($connect,"SELECT * FROM waypoint INNER JOIN penerbangan ON waypoint.penerbangan_id = penerbangan.id WHERE waypoint.penerbangan_id =$i");
		$sql1 = mysqli_query($connect,"SELECT * FROM penerbangan WHERE id=$i");
		$data = mysqli_fetch_array($sql1);
		while($datas = mysqli_fetch_array($sql)){
			$dis = $datas['distance'];
			$dist += $dis;
			$time = $dis /135 *60;
			$times += $time;

		}
		echo '
		<tr>
			<td>'.$no.'</td>
			<td><a href="view_route.php?id='.$data['id'].'">'.$data['dari'].$data['via'].$data['ke'].'</a></td>
			<td>'.$dist.'</td>
			<td>'.round($times).'</td>
			<td><a href=update_route.php?id='.$data['id'].'> <i class="fa fa-edit"></i> </a><a href="delete_route.php?id='.$data['id'].'"> <i class="fa fa-remove" style="color:red"> </a></td>	
		</tr>
		';
		$no++;
		$dist=0;
		$times=0;
	}
	//echo $l_routes;
	
	
	// for ($i=1; $i <= $l_routes; $i++) { 
	// 	$sql = mysqli_query($connect,"SELECT * FROM waypoint INNER JOIN penerbangan ON waypoint.penerbangan_id = penerbangan.id WHERE waypoint.penerbangan_id =$i");
	// 	$sql1 = mysqli_query($connect,"SELECT * FROM penerbangan WHERE id=$i");
	// 	$data = mysqli_fetch_array($sql1);
	// 	while($datas = mysqli_fetch_array($sql)){
	// 		$dis = $datas['distance'];
	// 		$dist += $dis;
	// 		$time = $dis /135 *60;
	// 		$times += $time;

	// 	}
	// 	echo '
	// 	<tr>
	// 		<td>'.$no.'</td>
	// 		<td><a href="view_route.php?id='.$data['id'].'">'.$data['dari'].$data['via'].$data['ke'].'</a></td>
	// 		<td>'.$dist.'</td>
	// 		<td>'.round($times).'</td>	
	// 	</tr>
	// 	';
	// 	$no++;
	// 	$dist=0;
	// 	$times=0;
	// }
	?>
</table>
</div>
</body>
</html>