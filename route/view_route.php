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

<?php
	$id_route = $_GET['id'];
	$routes = mysqli_fetch_array(mysqli_query ($connect,"SELECT * FROM penerbangan WHERE id=$id_route"));
	$route = mysqli_query ($connect,"SELECT * FROM waypoint INNER JOIN penerbangan ON waypoint.penerbangan_id = penerbangan.id WHERE waypoint.penerbangan_id =$id_route");
	//$routes = mysqli_fetch_array($route);
	// echo "Route = ".$routes['dari'].$routes['via'].$routes['ke'];
?>

<h3 class="text-center text-white pt-5" align="center" color="white">Data Waypoint Route</h3> 
<a href="../home.php" class="text-white pl-5">Home</a> 
<a href="route.php" class="text-white pl-5">Back</a>
<a href="add_waypoint.php?id=<?php echo $id_route;?>" class="text-white pl-5">Add Waypoint</a>

<div id="kanvas">
<h3>Route = <?=$routes['dari'].$routes['via'].$routes['ke']?></h3>
<table class="table table-bordered">
	<thead>
			<tr>
				<td rowspan="2" align="center">Waypoint</td>
				<td align="center">Trk</td>
				<td align="center">Dist</td>
				<td align="center">GIS</td>
				<td align="center">Time</td>
				<td rowspan="2" align="center" >Estimate</td>
				<td rowspan="2" align="center">Action</td>
			</tr>
			<tr>
				<td align="center">(Deg)</td>
				<td align="center">(Nm)</td>
				<td align="center">(Kts)</td>
				<td align="center">(Minutes)</td>
			</tr>
</thead>
			<!-- <tr>
				<form action="insert_wp.php?id=<?=$id?>" method="POST">
				<td><input type="text" name="way"></td>
				<td><input type="text" name="head"></td>
				<td><input type="text" name="dist"></td>
				<td colspan="3" align="right"><input type="submit" value="Add Waypoint"></td>
				</form>
			</tr> -->
			
			<?php 
			$times=0;
			$dist=0;
			if($route->num_rows > 0){
				while ($waypoint1 = mysqli_fetch_array($route)) {
					$dis = $waypoint1['distance'];
					$dist += $dis;
					$time = $dis /135 *60;
					$times += $time;
					echo '
					<tr>
					<td>'.$waypoint1['name'].'</td>
					<td>'.$waypoint1['heading'].'</td>
					<td>'.$dis.'</td>
					<td></td>
					<td>'.round($time).'</td>
					<td></td>
					<td><a href=update_waypoint.php?idw='.$waypoint1['id_waypoint'].'&&idr='.$id_route.'> <i class="fa fa-edit"></i> </a><a href=delete_way.php?idw='.$waypoint1['id_waypoint'].'&&idr='.$id_route.'> <i class="fa fa-remove" style="color:red"></i> </a></td>
					</tr>
					';
				}
			}
		
			 ?>
			 <tr>
			 	<td colspan="2" align="right">Total Distance</td>
			 	<td><?php echo $dist;?></td>
			 	<td>Time</td>
			 	<td><?php echo round($times);?></td>
			 	<td colspan="2"></td>
			 </tr>
			
		</table>
</div>
</body>
</html>