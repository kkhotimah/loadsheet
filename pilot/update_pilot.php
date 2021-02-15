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

	$pilot = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM pilot where id=$id"));
?>
<h3 class="text-center text-white pt-5" align="center" color="white">Update Pilot</h3> 
<a href="../home.php" class="text-white pl-5">Home</a> 
<a href="ac.php" class="text-white pl-5">Back</a> 
<div id="kanvas">
	<form action="updates_pilot.php?id=<?php echo $id;?>" method="POST" role="form">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 form-group">
					<label>Pilot Name</label>
					<input type="text" name="name" class="form-control" value="<?php echo $pilot['nick_name'];?>">
				</div>
				<div class="col-md-12 form-group">
					<label>Pilot Weight</label>
					<input type="text"  name="weight" class="form-control" value="<?php echo $pilot['weight'];?>">
				</div>
			    <button type="submit" class="btn btn-primary">Update</button>
			</div>
		</div>
	</form>

</div>
</body>
</html>