<!DOCTYPE html>
<html>
<head>
	<title>Loadsheet</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" type="text/css" href="../css/data.css">
</head>
<body>
<?php
    $id = $_GET['id'];
?>
<h3 class="text-center text-white pt-5" align="center" color="white">Add Route</h3> 
<a href="../home.php" class="text-white pl-5">Home</a> 
<a href="../route/view_route.php?id=<?php echo $id;?>" class="text-white pl-5">Back</a> 
<div id="kanvas">
	<form action="insert_wp.php?id=<?php echo $id;?>" method="POST" role="form">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 form-group">
					<label>Waypoint</label>
					<input type="text" name="way" class="form-control">
				</div>
				<div class="col-md-12 form-group">
					<label>Heading</label>
					<input type="text" name="head" class="form-control">
				</div>
				<div class="col-md-12 form-group">
					<label>Distance</label>
					<input type="text" name="dist" class="form-control">
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
	</form>

</div>
</body>
</html>