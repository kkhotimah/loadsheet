<?php
	include '../connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Loadsheet</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" type="text/css" href="../css/data.css">
</head>
<body>
	
<h3 class="text-center text-white pt-5" align="center" color="white">Data Route</h3> 
<a href="../home.php" class="text-white pl-5">Home</a> 
<a href="route.php" class="text-white pl-5">Back</a> 
<div id="kanvas">
	<form action="insert_route.php" method="POST" role="form">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 form-group">
					<label>From</label>
					<input type="text" name="from" class="form-control">
				</div>
				<div class="col-md-4 form-group">
					<label>Via</label>
					<input type="text" name="via" class="form-control">
				</div>
				<div class="col-md-4 form-group">
					<label>To</label>
					<input type="text" name="to" class="form-control">
				</div>
				<div class="col-md-12 form-group">
					<table class="table" border="solid">
						<tr>
							<th>Waypoint</th>
							<th>Heading</th>
							<th>Distance</th>
							<th>GIS</th>
							<th>Time</th>
						</tr>
						<tr>
							<td><input type="text" name="way1" class="form-control"></td>
							<td><input type="text" name="head1" class="form-control" ></td>
							<td><input type="text" name="dist1" class="form-control"></td>
							<td rowspan="8">135</td>
							<td rowspan="8"></td>
						</tr>
						<tr>
							<td><input type="text" name="way2" class="form-control" ></td>
							<td><input type="text" name="head2" class="form-control"></td>
							<td><input type="text" name="dist2"class="form-control"></td>
						</tr>
						<tr>
							<td><input type="text" name="way3" class="form-control"></td>
							<td><input type="text" name="head3" class="form-control"></td>
							<td><input type="text" name="dist3" class="form-control"></td>
						</tr>
						<tr>
							<td><input type="text" name="way4" class="form-control"></td>
							<td><input type="text" name="head4" class="form-control"></td>
							<td><input type="text" name="dist4" class="form-control"></td>
						</tr>
						<tr>
							<td><input type="text" name="way5" class="form-control"></td>
							<td><input type="text" name="head5" class="form-control"></td>
							<td><input type="text" name="dist5" class="form-control"></td>
						</tr>
						<tr>
							<td><input type="text" name="way6" class="form-control"></td>
							<td><input type="text" name="head6" class="form-control"></td>
							<td><input type="text" name="dist6" class="form-control"></td>
						</tr>
						<tr>
							<td><input type="text" name="way7" class="form-control"></td>
							<td><input type="text" name="head7" class="form-control"></td>
							<td><input type="text" name="dist7" class="form-control"></td>
						</tr>
						<tr>
							<td><input type="text" name="way8" class="form-control"></td>
							<td><input type="text" name="head8" class="form-control"></td>
							<td><input type="text" name="dist8" class="form-control"></td>
						</tr>
					</table>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
	</form>
<?php
	// $id = $_GET['id'];
	// $route = mysqli_query ($connect,"SELECT * FROM waypoint INNER JOIN penerbangan ON waypoint.penerbangan_id = penerbangan.id WHERE waypoint.penerbangan_id =$id");
	// $routes = mysqli_fetch_array($route);
	// echo "Route = ".$routes['dari'].$routes['via'].$routes['ke'];
?>
<!-- <table class="table" border="solid">
			<tr>
				<td rowspan="2" align="center">Waypoint</td>
				<td align="center">Trk</td>
				<td align="center">Dist</td>
				<td align="center">GIS</td>
				<td align="center">Time</td>
				<td rowspan="2" align="center">Estimate</td>
			</tr>
			<tr>
				<td align="center">(Deg)</td>
				<td align="center">(Nm)</td>
				<td align="center">(Kts)</td>
				<td align="center">(Minutes)</td>
			</tr> -->
			
			<?php 
			// $times=0;
			// $dist=0;
			// 	while ($waypoint1 = mysqli_fetch_array($route)) {
			// 		$dis = $waypoint1['distance'];
			// 		$dist += $dis;
			// 		$time = $dis /135 *60;
			// 		$times += $time;
					// if($waypoint1['heading']==0){
					// 	echo '
					// <tr>
					// <td>'.$waypoint1['name'].'</td>
					// <td>'.$waypoint1['heading'].'</td>
					// <td>'.$dis.'</td>
					// <td>135</td>
					// <td>'.round($time).'</td>
					// <td></td>
					// </tr>
					// ';
					// }else{
					// echo '
					// <tr>
					// <td>'.$waypoint1['name'].'</td>
					// <td>'.$waypoint1['heading'].'</td>
					// <td>'.$dis.'</td>
					// <td></td>
					// <td>'.round($time).'</td>
					// <td></td>
					// </tr>
					// ';
				// }
		
			 ?>
			 <!-- <tr>
			 	<td colspan="2" align="right">Total Distance</td>
			 	<td><?php echo $dist;?></td>
			 	<td>Time</td>
			 	<td><?php echo round($times);?></td>
			 	<td colspan="2"></td>
			 </tr>
			
		</table> -->
</div>
</body>
</html>