<?php 
	
	include 'server.php';
	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Loadsheet</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" type="text/css" href="./css/home.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="dropdown">
  <button class="dropbtn">Input Data</button>
  <div class="dropdown-content">
    <a href="./route/route.php">Input Route</a>
    <a href="./ac/ac.php">Input A/C</a>
    <a href="./pilot/pilot.php">Input Pilot</a>
  </div>
</div>
<div class="dropdown">
  <button class="dropbtn" >View Data</button>
  <div class="dropdown-content">
    <a href="view_loadsheet.php">Data Loadsheet</a>
    
    
  </div>
</div>
        <h3 class="text-center text-white pt-5" align="center" color="white">Sikorsky S-76 Loadsheet</h3>  
	<div id="kanvas">
	<div class="table-responsive">  
	<form action="insertdata.php" method="POST" class="form">
	  
		<table class="table table-bordered" >
            
            <tr>
				<td colspan="9" align="right">-</td>
				<td rowspan="5" width="10px"></td>
				<td colspan="9" align="right">-</td>
			</tr>
			<tr>
				<td colspan="9" rowspan="2">Sikorsky S-76 Loadsheet</td>
				<td >Prepared by:</td>
				<td colspan="4"><input class="innerbox" type="text" name="prepared"></td>
				<td >Acknowledged by:</td>
				<td colspan="3"><input class="innerbox" type="text" name="acknowledged"></td>
			</tr>
			
			<tr>
				<td colspan="5">HLO. KENANTO</td>
				<td colspan="4">CAPT. RUDI I</td>
			</tr>			
			<tr>
				<td colspan="3" id="ac">A/C Callsign</td>
				<td>PK-
				</td>
				<td>
					<select name="ac" id="ac_select" onchange="myAc()" >
					<?php
							include 'connection.php';
							$query=mysqli_query($connect,"select * from pesawat");
							while ($data = mysqli_fetch_array($query)){
						?>
						<option value="<?=$data['weight']?>"><?=$data['name']?></option>
						<?php
							}
						?>
						
					</select>
					<script>
					function myAc() {
						var weight =document.getElementById("ac_select").value;
						
						document.getElementById("demo").innerHTML = weight;
						
					}
						
					</script>
				</td>
				<td colspan="3">A/C Empty Weight</td>
                <td>
				<p id="demo"></p>
				</td>
                <td colspan="2" id="pilot">Captain</td>
				<td colspan="3">
					<select name="pilot" >
						<?php
							
							$query=mysqli_query($connect,"select * from pilot");
							while ($data = mysqli_fetch_array($query)){
						?>
						<option value="<?=$data['nick_name']?>"><?=$data['nick_name']?></option>
						<?php
							}
						?>
					</select>
				</td>
				<td colspan="2">Date</td>
				<td colspan="2">
					<?php echo date("d-M-y");?>
				</td>
			</tr>
			
			<tr>
				<td colspan="3">Customer</td>
				<td colspan="2">
					<input class="innerbox" type="text" name="customer">		
				</td>
				<td colspan="3">No.of Destination</td>
				<td><input type="text" name="nod" maxlength="4" size="4"></td>
				<td colspan="2">Copilot</td>
				<td colspan="3">
				<select name="copilot" >
						<?php
							
							$query=mysqli_query($connect,"select * from pilot");
							while ($data = mysqli_fetch_array($query)){
						?>
						<option value="<?=$data['nick_name']?>"><?=$data['nick_name']?></option>
						<?php
							}
						?>
					</select>		
				</td>
				<td colspan="2">Refuel </td>
				<td colspan="2"></td>
            </tr>
            
			<tr>
				<td colspan="19" height="5px"></td>
            </tr>
            
			<tr>
				<td colspan="2" id="route">From</td>
				<td colspan="2">
				<select name="from1">
					<?php
							
							$query=mysqli_query($connect,"SELECT DISTINCT dari from penerbangan");
							while ($data = mysqli_fetch_array($query)){
						?>
						<option value="<?=$data['dari']?>"><?=$data['dari']?></option>
						<?php
							}
						?>
				</select>
				</td>
				<td colspan="2">MTOW</td>
				<td>-</td>
				<td>POB</td>
				<td>-</td>
				<td rowspan="34"></td>
				<td colspan="2">From</td>
				<td colspan="2">
				<select name="from2">
					<?php
							
							$query=mysqli_query($connect,"SELECT DISTINCT dari from penerbangan");
							while ($data = mysqli_fetch_array($query)){
						?>
						<option value="<?=$data['dari']?>"><?=$data['dari']?></option>
						<?php
							}
						?>
				</select>
				</td>
				<td colspan="2">MTOW</td>
				<td>-</td>
				<td>POB</td>
				<td>-</td>
			</tr>
			
			<tr>
				<td colspan="2">Via</td>
				<td colspan="2">
					<select name="via1">
					<?php
							
							$query=mysqli_query($connect,"SELECT DISTINCT via from penerbangan");
							while ($data = mysqli_fetch_array($query)){
						?>
						<option value="<?=$data['via']?>"><?=$data['via']?></option>
						<?php
							}
						?>
					</select>
				</td>
				<td colspan="2">MLDW</td>
				<td>-</td>
				<td>OAT</td>
				<td>
					<input type="text" name="oat" maxlength="4" size="4">
				</td>
				<td colspan="2">Via</td>
				<td colspan="2">
					<select name="via2">
						<?php
							
							$query=mysqli_query($connect,"SELECT DISTINCT via from penerbangan");
							while ($data = mysqli_fetch_array($query)){
						?>
						<option value="<?=$data['via']?>"><?=$data['via']?></option>
						<?php
							}
						?>
					</select>
				</td>
				<td colspan="2">MLDW</td>
				<td>-</td>
				<td>OAT</td>
				<td>
					<input type="text" name="oat1" maxlength="4" size="4">
				</td>
            </tr>
           
			<tr>
				<td colspan="2">To</td>
				<td colspan="2">
					<select name="to1">
						<?php
							
							$query=mysqli_query($connect,"SELECT DISTINCT ke from penerbangan");
							while ($data = mysqli_fetch_array($query)){
						?>
						<option value="<?=$data['ke']?>"><?=$data['ke']?></option>
						<?php
							}
						?>
					</select>
				</td>
				<td colspan="2">Max.P/L</td>
				<td>-</td>
				<td>O/L</td>
				<td>-</td>
				<td colspan="2">To</td>
				<td colspan="2">
					<select name="to2">
						<?php
							
							$query=mysqli_query($connect,"SELECT DISTINCT ke from penerbangan");
							while ($data = mysqli_fetch_array($query)){
						?>
						<option value="<?=$data['ke']?>"><?=$data['ke']?></option>
						<?php
							}
						?>
					</select>
				</td>
				<td colspan="2">Max.P/L</td>
				<td>-</td>
				<td>O/L</td>
				<td>-</td>
			</tr>
			<tr>
				<td>Row</td>
				<td colspan="4">Passengers (Kgs)</td>
				<td>Total</td>
				<td>Weight</td>
				<td>Arm</td>
				<td>Mom</td>
				<td>Row</td>
				<td colspan="4">Passengers (Kgs)</td>
				<td>Total</td>
				<td>Weight</td>
				<td>Arm</td>
				<td>Mom</td>
			</tr>
			<tr>
				<td>C1</td>
				<td>
					<input type="text" name="c1a" maxlength="4" size="4">
				</td>
				<td><input type="text" name="c1b" maxlength="4" size="4"></td>
				<td><input type="text" name="c1c" maxlength="4" size="4"></td>
				<td><input type="text" name="c1d" maxlength="4" size="4"></td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>C1</td>	
				<td><input type="text" name="c1e" maxlength="4" size="4"></td>
				<td><input type="text" name="c1f" maxlength="4" size="4"></td>
				<td><input type="text" name="c1g" maxlength="4" size="4"></td>
				<td><input type="text" name="c1h" maxlength="4" size="4"></td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
			</tr>
			<tr>
				<td>C2</td>
				<td><input type="text" name="c2a" maxlength="4" size="4"></td>
				<td><input type="text" name="c2b" maxlength="4" size="4"></td>
				<td><input type="text" name="c2c" maxlength="4" size="4"></td>
				<td><input type="text" name="c2d" maxlength="4" size="4"></td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>C2</td>
				<td><input type="text" name="c2e" maxlength="4" size="4"></td>
				<td><input type="text" name="c2f" maxlength="4" size="4"></td>
				<td><input type="text" name="c2g" maxlength="4" size="4"></td>
				<td><input type="text" name="c2h" maxlength="4" size="4"></td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
			</tr>
			<tr>
				<td>C3</td>
				<td><input type="text" name="c3a" maxlength="4" size="4"></td>
				<td><input type="text" name="c3b" maxlength="4" size="4"></td>
				<td><input type="text" name="c3c" maxlength="4" size="4"></td>
				<td><input type="text" name="c3d" maxlength="4" size="4"></td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>C3</td>
				<td><input type="text" name="c3e" maxlength="4" size="4"></td>
				<td><input type="text" name="c3f" maxlength="4" size="4"></td>
				<td><input type="text" name="c3g" maxlength="4" size="4"></td>
				<td><input type="text" name="c3h" maxlength="4" size="4"></td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
			</tr>
			<tr>
				<td colspan="4">Cargo (Kgs)</td>
				<td>
					<input type="text" name="cargo1" maxlength="4" size="4">
				</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td colspan="4">Cargo (Kgs)</td>
				<td>
					<input type="text" name="cargo2" maxlength="4" size="4">
				</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
			</tr>
			<tr>
				<td rowspan="25" >OUT BOUND</td>
				<td rowspan="13" >TAKE OFF</td>
				<td colspan="3" align="right">Total Payload </td>
				<td>-</td>
				<td>-</td>
				<td></td>
				<td>-</td>
				<td rowspan="25" >OUT BOUND</td>
				<td rowspan="13" >TAKE OFF</td>
				<td colspan="3" align="right">Total Payload </td>
				<td>-</td>
				<td>-</td>
				<td></td>
				<td>-</td>
			</tr>
			<tr>
				<td>Crew</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>Crew</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
			</tr>
			<tr>
				<td colspan="4" align="right">Empty Weight + Crew</td>
				<td>-</td>
				<td></td>
				<td>-</td>
				<td colspan="4" align="right">Empty Weight + Crew</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
			</tr>
			<tr>
				<td colspan="4">ZFW</td>
				<td>-</td>
				<td></td>
				<td>-</td>
				<td colspan="4">ZFW</td>
				<td>-</td>
				<td></td>
				<td>-</td>
            </tr>
            
			<tr>
				<td colspan="4" align="right" id="fuel">Fuel Required</td>
				<td>-</td>
				<td rowspan="2">
					<input type="text" name="fuel" maxlength="4" size="4">
				</td>
				<td rowspan="2">TOTAL FUEL</td>
				<td colspan="4" align="right">Fuel Required</td>
				<td></td>
				<td colspan="2" rowspan="2">
					
				</td>
			</tr>
			
			<tr>
				<td colspan="4" align="right">Additional Fuel</td>
				<td>-</td>
				<td colspan="4" align="right">Additional Fuel</td>
				<td>-</td>
			</tr>
			<tr>
				<td colspan="4" align="right">T/O Fuel</td>
				<td>-</td>
				<td></td>
				<td>-</td>
				<td colspan="4" align="right">T/O Fuel</td>
				<td>-</td>
				<td></td>
				<td>-</td>
            </tr>
            
			<tr>
				<td colspan="4" align="right">Estimated TOW</td>
				<td>-</td>
				<td></td>
				<td>-</td>
				<td colspan="4" align="right">Estimated TOW</td>
				<td>-</td>
				<td></td>
				<td>-</td>
			</tr>
			<tr>
				<td colspan="4" align="right">LMC +/-</td>
				<td>-
					<!-- <input type="text" name="lmc1" maxlength="4" size="4"> -->
				</td>
				<td></td>
				<td></td>
				<td colspan="4" align="right">LMC +/-</td>
				<td>-
					<!-- <input type="text" name="lmc2" maxlength="4" size="4"> -->
				</td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td colspan="4" align="right">Corr. TOW</td>
				<td></td>
				<td></td>
				<td>-</td>
				<td colspan="4" align="right">Corr. TOW</td>
				<td></td>
				<td></td>
				<td>-</td>
			</tr>
			<tr>
				<td colspan="7"></td>
				<td colspan="7"></td>
			</tr>
			<tr>
				<td colspan="4" align="right" id="cog">C of G limit  ->      Fwd:</td>
				<td>-</td>
				<td>Aft:</td>
				<td>-</td>
				<td colspan="4" align="right">C of G limit  ->      Fwd:</td>
				<td>-</td>
				<td>Aft:</td>
				<td>-</td>
			</tr>
			<tr>
				<td colspan="4" align="right">Take Off C.G.</td>
				<td colspan="3" align="center">-</td>
				<td colspan="4" align="right">Take Off C.G.</td>
				<td colspan="3" align="center">-</td>
			</tr>
			<tr>
				<td rowspan="12">LANDING</td>
				<td colspan="4" align="right">T/O Fuel</td>
				<td>-</td>
				<td colspan="2" rowspan="2"></td>
				<td rowspan="12">LANDING</td>
				<td colspan="4" align="right">T/O Fuel</td>
				<td>-</td>
				<td colspan="2" rowspan="2"></td>
			</tr>
			<tr>
				<td colspan="4" align="right">Trip Fuel</td>
				<td>-</td>
				<td colspan="4" align="right">Trip Fuel</td>
				<td>-</td>
			</tr>
			<tr>
				<td colspan="4" align="right">Remaining Fuel</td>
				<td>-</td>
				<td></td>
				<td>-</td>
				<td colspan="4" align="right">Remaining Fuel</td>
				<td>-</td>
				<td></td>
				<td>-</td>
            </tr>
			<tr>
				<td colspan="4" align="right">ZFW</td>
				<td>-</td>
				<td></td>
				<td>-</td>
				<td colspan="4" align="right">ZFW</td>
				<td>-</td>
				<td></td>
				<td>-</td>
			</tr>
			<tr>
				<td colspan="4" align="right">Estimated LDW</td>
				<td>-</td>
				<td></td>
				<td>-</td>
				<td colspan="4" align="right">Estimated LDW</td>
				<td>-</td>
				<td></td>
				<td>-</td>
			</tr>
			<tr>
				<td colspan="4" align="right">LMC +/-</td>
				<td></td>
				<td></td>
				<td></td>
				<td colspan="4" align="right">LMC +/-</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td colspan="4" align="right">Corr. LDW</td>
				<td></td>
				<td></td>
				<td>-</td>
				<td colspan="4" align="right">Corr. LDW</td>
				<td></td>
				<td></td>
				<td>-</td>
			</tr>
			<tr>
				<td colspan="7"></td>
				<td colspan="7"></td>
            </tr>          
			<tr>
				<td colspan="4" align="right" >C of G limit Fwd:</td>
				<td>-</td>
				<td></td>
				<td>-</td>
				<td colspan="4" align="right">C of G limit Fwd:</td>
				<td>-</td>
				<td></td>
				<td>-</td>
            </tr>
            
			<tr>
				<td colspan="7"></td>
				<td colspan="7"></td>
			</tr>
			<tr>
				<td colspan="4" align="right">Landing C.G.</td>
				<td colspan="3" align="center">-</td>
				<td colspan="4" align="right">Landing C.G.</td>
				<td colspan="3" align="center">-</td>
			</tr>
		</table>
		<button type="submit" class="btn btn-primary">Submit</button>
		</form>
    </div>
	</div>
    <!-- <div id="coba">
        <p>
            ini percobaan link
        </p>
    </div> -->
</body>
</html>