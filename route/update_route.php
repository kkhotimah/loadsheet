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

	$id = $_GET['id'];

	$route = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM penerbangan where id=$id"));
?>
	
<h3 class="text-center text-white pt-5" align="center" color="white">Update Route</h3> 
<a href="../home.php" class="text-white pl-5">Home</a> 
<a href="route.php" class="text-white pl-5">Back</a> 
<div id="kanvas">
	<form action="update_routes.php?id=<?php echo $id;?>" method="POST" role="form">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 form-group">
					<label>Route From</label>
					<input type="text" name="from" class="form-control" value="<?php echo $route['dari'];?>">
				</div>
				<div class="col-md-12 form-group">
					<label>Route Via</label>
					<input type="text" name="via" class="form-control" value="<?php echo $route['via'];?>">
				</div>
				<div class="col-md-12 form-group">
					<label>Route To</label>
					<input type="text" name="to" class="form-control" value="<?php echo $route['ke'];?>">
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
	</form>

</div>
</body>
</html>