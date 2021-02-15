<!DOCTYPE html>
<html>
<head>
	<title>Loadsheet</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" type="text/css" href="../css/data.css">
</head>
<body>
<?php
	include '../connection.php';

	$id = $_GET['idr'];
	$idw = $_GET['idw'];
	$waypoint = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM waypoint where id_waypoint=$idw"));
?>
<h3 class="text-center text-white pt-5" align="center" color="white">Add Route</h3> 
<a href="../home.php" class="text-white pl-5">Home</a> 
<a href="../route/view_route.php?id=<?php echo $id;?>" class="text-white pl-5">Back</a> 
<div id="kanvas">
	<form action="update_wp.php?idw=<?php echo $idw;?>&&idr=<?php echo $id;?>" method="POST" role="form">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 form-group">
					<label>Waypoint</label>
					<input type="text" name="way" class="form-control" value="<?php echo $waypoint['name']?>">
				</div>
				<div class="col-md-12 form-group">
					<label>Heading</label>
					<input type="text" name="head" class="form-control" value="<?php echo $waypoint['heading']?>">
				</div>
				<div class="col-md-12 form-group">
					<label>Distance</label>
					<input type="text" name="dist" class="form-control" value="<?php echo $waypoint['distance']?>">
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
	</form>

</div>
</body>
</html>