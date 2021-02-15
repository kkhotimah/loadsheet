<?php
	include 'connection.php';

	$id = $_GET['id'];
	//include 'insertdata.php';
	$pesawat = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM loadsheet INNER JOIN pesawat ON loadsheet.id_pesawat= pesawat.id  where loadsheet.id_loadsheet = $id"));
	$pilot = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM loadsheet INNER JOIN pilot ON loadsheet.id_pilot= pilot.id  where loadsheet.id_loadsheet = $id"));
	$copilot =  mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM loadsheet INNER JOIN pilot ON loadsheet.id_copilot= pilot.id  where loadsheet.id_loadsheet = $id"));
	$penerbangan_pergi = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM loadsheet INNER JOIN penerbangan ON loadsheet.id_penerbangan_pergi= penerbangan.id  where loadsheet.id_loadsheet = $id"));
	$penerbangan_pulang = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM loadsheet INNER JOIN penerbangan ON loadsheet.id_penerbangan_pulang= penerbangan.id  where loadsheet.id_loadsheet = $id"));
	$penumpang_pergi=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM penumpang INNER JOIN loadsheet ON penumpang.id_loadsheet = loadsheet.id_loadsheet WHERE penumpang.id_loadsheet=$id AND kode_terbang='pergi'"));
	$penumpang_pulang=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM penumpang INNER JOIN loadsheet ON penumpang.id_loadsheet = loadsheet.id_loadsheet WHERE penumpang.id_loadsheet=$id AND kode_terbang='pulang'"));
	$cargo = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM cargo INNER JOIN loadsheet ON cargo.id_loadsheet = loadsheet.id_loadsheet WHERE cargo.id_loadsheet=$id"));
	//waypoint
	$id_penerbangan_pergi=$penerbangan_pergi['id'];
	$waypoint_pergi = mysqli_query($connect,"SELECT * FROM waypoint INNER JOIN penerbangan ON waypoint.penerbangan_id = penerbangan.id WHERE waypoint.penerbangan_id=$id_penerbangan_pergi");
	$waypoint_pergi1 = mysqli_query($connect,"SELECT * FROM waypoint INNER JOIN penerbangan ON waypoint.penerbangan_id = penerbangan.id WHERE waypoint.penerbangan_id=$id_penerbangan_pergi");
	$id_penerbangan_pulang=$penerbangan_pulang['id'];
	$waypoint_pulang = mysqli_query($connect,"SELECT * FROM waypoint INNER JOIN penerbangan ON waypoint.penerbangan_id = penerbangan.id WHERE waypoint.penerbangan_id=$id_penerbangan_pulang");
	$waypoint_pulang1 = mysqli_query($connect,"SELECT * FROM waypoint INNER JOIN penerbangan ON waypoint.penerbangan_id = penerbangan.id WHERE waypoint.penerbangan_id=$id_penerbangan_pulang");
	//mtow
	$from_pergi = $penerbangan_pergi['dari'];
	$to_pergi = $penerbangan_pergi['ke'];
	$mtow_pergi = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM mtow where location ='$from_pergi'"));
	$mldw_pergi = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM mtow where location ='$to_pergi'"));
	$from_pulang = $penerbangan_pulang['dari'];
	$to_pulang = $penerbangan_pulang['ke'];
	$mtow_pulang = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM mtow where location ='$from_pulang'"));
	$mldw_pulang = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM mtow where location ='$to_pulang'"));

	//pob
	$pob_pergi=0;
	for ($i=1; $i <=3 ; $i++) { 
		if ($penumpang_pergi['c'.$i.'a'] >0) {
			$pob_pergi+=1;
		}
		if ($penumpang_pergi['c'.$i.'b'] >0) {
			$pob_pergi+=1;
		}
		if ($penumpang_pergi['c'.$i.'c'] >0) {
			$pob_pergi+=1;
		}
		if ($penumpang_pergi['c'.$i.'d'] >0) {
			$pob_pergi+=1;
		}
	}
	if ($pesawat['id_pilot'] !=0) {
		$pob_pergi+=1;
	}
	if ($pesawat['id_copilot']!=0) {
		$pob_pergi+=1;
	}
	$pob_pulang=0;
	for ($i=1; $i <=3 ; $i++) { 
		if ($penumpang_pulang['c'.$i.'a'] >0) {
			$pob_pulang+=1;
		}
		if ($penumpang_pulang['c'.$i.'b'] >0) {
			$pob_pulang+=1;
		}
		if ($penumpang_pulang['c'.$i.'c'] >0) {
			$pob_pulang+=1;
		}
		if ($penumpang_pulang['c'.$i.'d'] >0) {
			$pob_pulang+=1;
		}
	}
	if ($pesawat['id_pilot'] !=0) {
		$pob_pulang+=1;
	}
	if ($pesawat['id_copilot']!=0) {
		$pob_pulang+=1;
	}

	//fuel
	include 'fuel.php';
	$d1 = 0;
	$w1 = 0;
	$d2 = 0;
	$w2 = 0;
	$total_times= 0;
	while ( $way1 = mysqli_fetch_array($waypoint_pergi)) {
					$dis = $way1['distance'];
					$d1 +=$dis;
					$w1 +=1;
				}
	while ( $way2 = mysqli_fetch_array($waypoint_pulang)) {
		$dis = $way2['distance'];
		$t = $dis/135*60;
		$d2 +=$dis;
		$w2 +=1;
		$total_times+=$t;
	}

	//perhitungan
	$total_c1_pergi = $penumpang_pergi['c1a']+$penumpang_pergi['c1b']+$penumpang_pergi['c1c']+$penumpang_pergi['c1d'];
	$w_c1_pergi = $total_c1_pergi*2.20462; 
	$m_c1_pergi = $w_c1_pergi*135.5/100;
	$total_c1_pulang = $penumpang_pulang['c1a']+$penumpang_pulang['c1b']+$penumpang_pulang['c1c']+$penumpang_pulang['c1d'];
	$w_c1_pulang = $total_c1_pulang*2.20462;
	$m_c1_pulang = $w_c1_pulang*135.5/100;
	$total_c2_pergi = $penumpang_pergi['c2a']+$penumpang_pergi['c2b']+$penumpang_pergi['c2c']+$penumpang_pergi['c2d'];
	$w_c2_pergi = $total_c2_pergi*2.20462; 
	$m_c2_pergi = $w_c2_pergi*166.5/100;
	$total_c2_pulang = $penumpang_pulang['c2a']+$penumpang_pulang['c2b']+$penumpang_pulang['c2c']+$penumpang_pulang['c2d'];
	$w_c2_pulang = $total_c2_pulang*2.20462; 
	$m_c2_pulang = $w_c2_pulang*166.5/100;
	$total_c3_pergi = $penumpang_pergi['c3a']+$penumpang_pergi['c3b']+$penumpang_pergi['c3c']+$penumpang_pergi['c3d'];
	$w_c3_pergi = $total_c3_pergi*2.20462; 
	$m_c3_pergi = $w_c3_pergi*197.5/100;
	$total_c3_pulang = $penumpang_pulang['c3a']+$penumpang_pulang['c3b']+$penumpang_pulang['c3c']+$penumpang_pulang['c3d'];
	$w_c3_pulang = $total_c3_pulang*2.20462; 
	$m_c3_pulang = $w_c3_pulang*166.5/100;
	$cargo_pergi =$cargo['cargo_pergi']; 
	$w_cargo_pergi = $cargo_pergi*2.20462;
	$m_cargo_pergi = $w_cargo_pergi*235/100;
	$cargo_pulang =$cargo['cargo_pulang']; 
	$w_cargo_pulang = $cargo_pulang*2.20462;
	$m_cargo_pulang = $w_cargo_pulang*235/100;
	$tpt_pergi=$total_c1_pergi+$total_c2_pergi+$total_c3_pergi+$cargo['cargo_pergi'];
	$tpw_pergi = $w_c1_pergi+$w_c2_pergi+$w_c3_pergi+$w_cargo_pergi;
	$tpm_pergi=$m_c1_pergi+$m_c2_pergi+$m_c3_pergi+$m_cargo_pergi;
	$tpt_pulang=$total_c1_pulang+$total_c2_pulang+$total_c3_pulang+$cargo['cargo_pulang'];
	$tpw_pulang = $w_c1_pulang+$w_c2_pulang+$w_c3_pulang+$w_cargo_pulang;
	$tpm_pulang=$m_c1_pulang+$m_c2_pulang+$m_c3_pulang+$m_cargo_pulang;
	$crew=$pilot['weight']+$copilot['weight'];
	$w_crew = round($crew*2.20462);
	$m_crew = round($w_crew*102.5/100);
	//$m_crew = round($w_crew*102.5/100);
	$ew_crew=$pesawat['weight']+$w_crew;
	$zfw1 = round($tpw_pergi)+$ew_crew;
	$zfw2 = round($tpw_pulang)+$ew_crew;
	$fr1 = fuelRequired($d1,$w1);
	$fr2= fuelRequired($d2,$w2);
	$tof1= toFuel1($pesawat['fuel']);
	$tof2 = round(toFuel2($pesawat['fuel'],$total_times));
	$e_tow1 =$zfw1-$tof1;
	$e_tow2 =$zfw2-$tof2;
	$tF1 = routeFuel($d1);
	$tF2 = routeFuel($d2);
	$rF1=$tof1-$tF1;
	$aF2 = $rF1-$fr2;
	$rF2=$tof2-$tF2;
	$estimated_ldw1 =$rF1+$zfw1;
	$estimated_ldw2 =$rF2+$zfw2;
?>
<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Loadsheet_$nod.xls");
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Loadsheet</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" type="text/css" href="./css/data.css">
</head>
<body>
	<h3 class="text-center text-white pt-5">Data loadsheet pesawat</h3>
	
	<div id="kanvas">
		<table class="table" border="solid">
			<tr>
				<td colspan="9" align="right">-</td>
				<td rowspan="5" width="10px"></td>
				<td colspan="9" align="right">-</td>
			</tr>
			<tr>
				<td colspan="9" rowspan="2">Sikorsky S-76 Loadsheet</td>
				<td>Prepared by:</td>
				<td colspan="4"><?php echo $pesawat['prepared']; ?></td>
				<td>Acknowledged by:</td>
				<td colspan="3"><?php echo $pesawat['acknowledged']; ?></td>
			</tr>
			
			<tr>
				<td colspan="5">HLO. KENANTO</td>
				<td colspan="4">CAPT. RUDI I</td>
			</tr>
			<tr>
				<td colspan="3">A/C Callsign</td>
				<td>PK    -</td>
				<td>
					<?php 
					echo $pesawat['name'];
					?>
				</td>
				<td colspan="3">A/C Empty Weight</td>
				<td>
					<?php
						echo $pesawat['weight'];
						
					?>
				</td>
				<td colspan="2">Captain</td>
				<td colspan="3">
					<?php
						echo $pilot['nick_name'];
					?>
				</td>
				<td colspan="2">Date</td>
				<td colspan="2">
				<?php
				echo $pesawat['date'];
				?>
				</td>
			</tr>
			<tr>
				<td colspan="3">Customer</td>
				<td colspan="2">
					<?php echo $pesawat['customer']; ?>
				</td>
				<td colspan="3">No.of Destination</td>
				<td>
					<?php echo $pesawat['no_of_destination'];?>
				</td>
				<td colspan="2">Copilot</td>
				<td colspan="3">
					<?php echo $copilot['nick_name']; ?>
				</td>
				<td colspan="2">Refuel </td>
				<td colspan="2"></td>
			</tr>
			<tr>
				<td colspan="19" height="5px"></td>
			</tr>
			<tr>
				<td colspan="2">From</td>
				<td colspan="2">
					<?php echo $penerbangan_pergi['dari'];?>
				</td>
				<td colspan="2">MTOW</td>
				<td><?php echo $mtow_pergi['mtow'];?></td>
				<td>POB</td>
				<td><?php echo $pob_pergi;?></td>
				<td rowspan="34"></td>
				<td colspan="2">From</td>
				<td colspan="2">
					<?php echo $penerbangan_pulang['dari'];?>
				</td>
				<td colspan="2">MTOW</td>
				<td><?php echo $mtow_pulang['mtow'];?></td>
				<td>POB</td>
				<td><?php echo $pob_pulang;?></td>
			</tr>
			<tr>
				<td colspan="2">Via</td>
				<td colspan="2">
					<?php echo $penerbangan_pergi['via'];?>
				</td>
				<td colspan="2">MLDW</td>
				<td><?php echo $mldw_pergi['mtow'];?></td>
				<td>OAT</td>
				<td><?php echo $pesawat['oat'];?></td>
				<td colspan="2">Via</td>
				<td colspan="2">
					<?php echo $penerbangan_pulang['via'];?>
				</td>
				<td colspan="2">MLDW</td>
				<td><?php echo $mldw_pulang['mtow'];?></td>
				<td>OAT</td>
				<td><?php echo $pesawat['oat'];?></td>
			</tr>
			<tr>
				<td colspan="2">To</td>
				<td colspan="2">
					<?php echo $penerbangan_pergi['ke'];?>
				</td>
				<td colspan="2">Max.P/L</td>
				<td>-</td>
				<td>O/L</td>
				<td>-</td>
				<td colspan="2">To</td>
				<td colspan="2">
					<?php echo $penerbangan_pulang['ke'];?>
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
					<?php echo $penumpang_pergi['c1a'] ?>
				</td>
				<td><?php echo $penumpang_pergi['c1b'] ?></td>
				<td><?php echo $penumpang_pergi['c1c'] ?></td>
				<td><?php echo $penumpang_pergi['c1d'] ?></td>
				<td>
					<?php
						echo $total_c1_pergi;
					?>
				</td>
				<td>
					<?php 
					echo round($w_c1_pergi);
					?>
						
				</td>
				<td>136</td>
				<td>
					<?php
					echo round($m_c1_pergi);
					?>
				</td>
				<td>C1</td>	
				<td><?php echo $penumpang_pulang['c1a'] ?></td>
				<td><?php echo $penumpang_pulang['c1b'] ?></td>
				<td><?php echo $penumpang_pulang['c1c'] ?></td>
				<td><?php echo $penumpang_pulang['c1d'] ?></td>
				<td>
					<?php echo $total_c1_pulang;?>
				</td>
				<td>
					<?php 
					echo round($w_c1_pulang);
					?>
				</td>
				<td>136</td>
				<td>
					<?php
					echo round($m_c1_pulang);
					?>
				</td>
			</tr>
			<tr>
				<td>C2</td>
				<td><?php echo $penumpang_pergi['c2a'] ?></td>
				<td><?php echo $penumpang_pergi['c2b'] ?></td>
				<td><?php echo $penumpang_pergi['c2c'] ?></td>
				<td><?php echo $penumpang_pergi['c2d'] ?></td>
				<td>
					<?php
						echo $total_c2_pergi;
					?>
				</td>
				<td>
					<?php 
					echo round($w_c2_pergi);
					?>
				</td>
				<td>167</td>
				<td>
					<?php
					echo round($m_c2_pergi);
					?>
				</td>
				<td>C2</td>
				<td><?php echo $penumpang_pulang['c2a'] ?></td>
				<td><?php echo $penumpang_pulang['c2b'] ?></td>
				<td><?php echo $penumpang_pulang['c2c'] ?></td>
				<td><?php echo $penumpang_pulang['c2d'] ?></td>
				<td>
					<?php
						echo $total_c2_pulang;
					?>
				</td>
				<td>
					<?php 
					echo round($w_c2_pulang);
					?>
				</td>
				<td>167</td>
				<td>
					<?php
					echo round($m_c2_pulang);
					?>
				</td>
			</tr>
			<tr>
				<td>C3</td>
				<td><?php echo $penumpang_pergi['c3a'] ?></td>
				<td><?php echo $penumpang_pergi['c3b'] ?></td>
				<td><?php echo $penumpang_pergi['c3c'] ?></td>
				<td><?php echo $penumpang_pergi['c3d'] ?></td>
				<td>
					<?php
						echo $total_c3_pergi;
					?>
				</td>
				<td>
					<?php 
					echo round($w_c3_pergi);
					?>
				</td>
				<td>198</td>
				<td>
					<?php
					echo round($m_c3_pergi);
					?>
				</td>
				<td>C3</td>
				<td><?php echo $penumpang_pulang['c3a'] ?></td>
				<td><?php echo $penumpang_pulang['c3b'] ?></td>
				<td><?php echo $penumpang_pulang['c3c'] ?></td>
				<td><?php echo $penumpang_pulang['c3d'] ?></td>
				<td>
					<?php
						echo $total_c3_pulang;
					?>
				</td>
				<td>
					<?php 
					echo round($w_c3_pulang);
					?>
				</td>
				<td>198</td>
				<td>
					<?php
					echo round($m_c3_pulang);
					?>
				</td>
			</tr>
			<tr>
				<td colspan="4">Cargo (Kgs)</td>
				<td>
					<?php 
					echo $cargo_pergi;
					?>
				</td>
				<td><?php echo $cargo_pergi;?></td>
				<td>
					<?php
					echo round($w_cargo_pergi);
					?>
				</td>
				<td>235</td>
				<td>
					<?php
					echo round($m_cargo_pergi);
					?>
				</td>
				<td colspan="4">Cargo (Kgs)</td>
				<td>
					<?php 
					echo $cargo_pulang;
					?>
				</td>
				<td><?php echo $cargo_pulang;?></td>
				<td>
					<?php
					echo round($w_cargo_pulang);
					?>
				</td>
				<td>235</td>
				<td>
					<?php
					echo round($m_cargo_pulang);
					?>
				</td>
			</tr>
			<tr>
				<td rowspan="25" >OUT BOUND</td>
				<td rowspan="13" >TAKE OFF</td>
				<td colspan="3" align="right">Total Payload </td>
				<td>
					<?php
					echo round($tpt_pergi);
					?>
				</td>
				<td>
					<?php
					echo round($tpw_pergi);
					?>
				</td>
				<td></td>
				<td>
					<?php
					echo round($tpm_pergi);
					?>
				</td>
				<td rowspan="25" >OUT BOUND</td>
				<td rowspan="13" >TAKE OFF</td>
				<td colspan="3" align="right">Total Payload </td>
				<td>
					<?php
					echo round($tpt_pulang);
					?>
				</td>
				<td>
					<?php
					echo round($tpw_pulang);
					?>
				</td>
				<td></td>
				<td>
					<?php
					echo round($tpm_pulang);
					?>
				</td>
			</tr>
			<tr>
				<td>Crew</td>
				<td>
					<?php echo $pilot['weight'];?>
				</td>
				<td>
					<?php echo $copilot['weight'];?>
				</td>
				<td>
					<?php
						echo $crew;
					?>
				</td>
				<td>
					<?php
						echo $w_crew;
					?>
				</td>
				<td>103</td>
				<td>
					<?php
					echo $m_crew;
					?>
				</td>
				<td>Crew</td>
				<td>
					<?php echo $pilot['weight'];?>
				</td>
				<td>
					<?php echo $copilot['weight'];?>
				</td>
				<td><?php
						echo $crew;
					?>
				</td>
				<td>
					<?php
						echo $w_crew;
					?>
				</td>
				<td>103</td>
				<td>
					<?php
					echo $m_crew;
					?>
				</td>
			</tr>
			<tr>
				<td colspan="4" align="right">Empty Weight + Crew</td>
				<td>
					<?php
					echo $ew_crew;
					?>
				</td>
				<td></td>
				<td>-</td>
				<td colspan="4" align="right">Empty Weight + Crew</td>
				<td><?php echo $ew_crew; ?></td>
				<td>-</td>
				<td>-</td>
			</tr>
			<tr>
				<td colspan="4">ZFW</td>
				<td><?php  echo $zfw1;?></td>
				<td></td>
				<td>-</td>
				<td colspan="4">ZFW</td>
				<td><?php echo $zfw2;?></td>
				<td></td>
				<td>-</td>
			</tr>
			<tr>
				<td colspan="4" align="right">Fuel Required</td>
				<td><?php  echo $fr1;?></td>
				<td rowspan="2">
					<?php echo $pesawat['fuel'];?>
				</td>
				<td rowspan="2">TOTAL FUEL</td>
				<td colspan="4" align="right">Fuel Required</td>
				<td><?php  echo $fr2;?></td>
				<td colspan="2" rowspan="2"></td>
			</tr>
			<tr>
				<td colspan="4" align="right">Additional Fuel</td>
				<td><?php echo $pesawat['fuel']-fuelRequired($d1,$w1); ?></td>
				<td colspan="4" align="right">Additional Fuel</td>
				<td><?php
					echo $aF2;
				?></td>
			</tr>
			<tr>
				<td colspan="4" align="right">T/O Fuel</td>
				<td><?php echo $tof1; ?></td>
				<td></td>
				<td>-</td>
				<td colspan="4" align="right">T/O Fuel</td>
				<td><?php echo $tof2;?></td>
				<td></td>
				<td>-</td>
			</tr>
			<tr>
				<td colspan="4" align="right">Estimated TOW</td>
				<td><?php
					echo $e_tow1;
				?></td>
				<td></td>
				<td>-</td>
				<td colspan="4" align="right">Estimated TOW</td>
				<td><?php
					echo $e_tow2;
				?></td>
				<td></td>
				<td>-</td>
			</tr>
			<tr>
				<td colspan="4" align="right">LMC +/-</td>
				<td>90</td>
				<td></td>
				<td></td>
				<td colspan="4" align="right">LMC +/-</td>
				<td></td>
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
				<td colspan="4" align="right">C of G limit  ->      Fwd:</td>
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
				<td><?php echo $tof1; ?></td>
				<td colspan="2" rowspan="2"></td>
				<td rowspan="12">LANDING</td>
				<td colspan="4" align="right">T/O Fuel</td>
				<td><?php echo $tof2; ?></td>
				<td colspan="2" rowspan="2"></td>
			</tr>
			<tr>
				<td colspan="4" align="right">Trip Fuel</td>
				<td>
				<?php
				echo $tF1;
				?>
				</td>
				<td colspan="4" align="right">Trip Fuel</td>
				<td>
				<?php
				echo $tF2;
				?>
				</td>
			</tr>
			<tr>
				<td colspan="4" align="right">Remaining Fuel</td>
				<td><?php
					echo $rF1;
				?></td>
				<td></td>
				<td>-</td>
				<td colspan="4" align="right">Remaining Fuel</td>
				<td><?php echo $rF2;?></td>
				<td></td>
				<td>-</td>
			</tr>
			<tr>
				<td colspan="4" align="right">ZFW</td>
				<td><?php echo $zfw1; ?></td>
				<td></td>
				<td>-</td>
				<td colspan="4" align="right">ZFW</td>
				<td><?php echo $zfw2; ?></td>
				<td></td>
				<td>-</td>
			</tr>
			<tr>
				<td colspan="4" align="right">Estimated LDW</td>
				<td><?php echo $estimated_ldw1;?></td>
				<td></td>
				<td>-</td>
				<td colspan="4" align="right">Estimated LDW</td>
				<td><?php echo $estimated_ldw2;?></td>
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
				<td colspan="4" align="right">C of G limit Fwd:</td>
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

		<h3 class="text-center">Flight Plan</h3>
		<table class="table" border="solid">
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
			</tr>
			
			<?php
			
			$total_times1=0;
			$total_dist1=0;
			if($waypoint_pergi1 ->num_rows > 0){
				while ($oke = mysqli_fetch_array($waypoint_pergi1)) {
					$dist1 = $oke['distance'];
					$total_dist1 += $dist1;
					$time1 = $dist1 /135 *60;
					$total_times1 += $time1;
					
					if($waypoint_1['heading']==0){
						echo '
					<tr>
					<td>'.$waypoint_1['name'].'</td>
					<td>'.$waypoint_1['heading'].'</td>
					<td>'.$dist1.'</td>
					<td>135</td>
					<td>'.round($time1).'</td>
					<td></td>
					</tr>
					';
					}else{
					echo '
					<tr>
					<td>'.$waypoint_1['name'].'</td>
					<td>'.$waypoint_1['heading'].'</td>
					<td>'.$dist1.'</td>
					<td></td>
					<td>'.round($time1).'</td>
					<td></td>
					</tr>
					 ';}
				}
			}else{
				echo 'error';
			}
		
			 ?>
			 <tr>
			 	<td colspan="2">Total Distance</td>
			 	<td><?php echo $total_dist1;?></td>
			 	<td>Time</td>
			 	<td><?php echo round($total_times1);?></td>
			 	<td colspan="2"></td>
			 </tr>
			
		</table>
		<br/>
		<table class="table" border="solid">
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
			</tr>
			
			<?php
			
			$total_times2=0;
			$total_dist2=0;
			if($waypoint_pulang1 ->num_rows > 0){
				while ($waypoint_2 = mysqli_fetch_array($waypoint_pulang1)) {
					$dist2 = $waypoint_2['distance'];
					$total_dist2 += $dist2;
					$time2 = $dist2 /135 *60;
					$total_times2 += $time2;
					
					if($waypoint_2['heading']==0){
						echo '
					<tr>
					<td>'.$waypoint_2['name'].'</td>
					<td>'.$waypoint_2['heading'].'</td>
					<td>'.$dist1.'</td>
					<td>135</td>
					<td>'.round($time1).'</td>
					<td></td>
					</tr>
					';
					}else{
					echo '
					<tr>
					<td>'.$waypoint_2['name'].'</td>
					<td>'.$waypoint_2['heading'].'</td>
					<td>'.$dist2.'</td>
					<td></td>
					<td>'.round($time2).'</td>
					<td></td>
					</tr>
					 ';}
				}
			}else{
				echo 'error';
			}
		
			 ?>
			 <tr>
			 	<td colspan="2">Total Distance</td>
			 	<td><?php echo $total_dist2;?></td>
			 	<td>Time</td>
			 	<td><?php echo round($total_times2);?></td>
			 	<td colspan="2"></td>
			 </tr>
			
		</table>
		
	</div>
</body>
</html>