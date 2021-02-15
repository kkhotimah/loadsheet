<!DOCTYPE html>
<html>
<head>
	<title>Loadsheet</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" type="text/css" href="../css/data.css">
</head>
<body>
	
<h3 class="text-center text-white pt-5" align="center" color="white">Add Pilot</h3> 
<a href="../home.php" class="text-white pl-5">Home</a> 
<a href="pilot.php" class="text-white pl-5">Back</a> 
<div id="kanvas">
	<form action="add_pilot.php" method="POST" role="form">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 form-group">
					<label>Pilot Name</label>
					<input type="text" name="name" class="form-control">
				</div>
				<div class="col-md-12 form-group">
					<label>Pilot Weight</label>
					<input type="text"  name="weight" class="form-control">
				</div>
			    <button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
	</form>

</div>
</body>
</html>