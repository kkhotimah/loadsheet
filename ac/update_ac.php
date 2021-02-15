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

	$route = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM pesawat where id=$id"));
?>
<h3 class="text-center text-white pt-5" align="center" color="white">Update A/C</h3> 
<a href="../home.php" class="text-white pl-5">Home</a> 
<a href="ac.php" class="text-white pl-5">Back</a> 
<div id="kanvas">
	<form action="updates_ac.php?id=<?php echo $id;?>" method="POST" role="form">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 form-group">
					<label>A/C Name</label>
					<input type="text" name="name" class="form-control" value="<?php echo $route['name'];?>">
				</div>
				<div class="col-md-12 form-group">
					<label>A/C Weight</label>
					<input type="text"  name="weight" class="form-control" value="<?php echo $route['weight'];?>">
				</div>
			    <button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
	</form>

</div>
</body>
</html>