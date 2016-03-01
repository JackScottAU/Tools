<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
<table class="table">
<thead>
<tr>
	<th>Note #</th>
	<th>Note</th>
	<th>Pitch</th>
	<th>IW</th>
	<th>ID</th>
	<th>IL</th>
	<th>MH</th>
	<th>WST</th>
	<th>Flow Rate</th>
</tr>
</thead>
<tbody>
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$pressure = 2.00;
$sw = 2.431;
$sd = 3.084;
$hn = 18;
$mh = 0.3;
$ising = 2.00;
$os = 1;
$rank = 4;
$pitch = 440;

for($i=1;$i<=61;$i++)
{
	echo "<tr>";
	echo "<td>$i</td>";
	echo "<td>TODO</td>";
	$i_pitch = round($pitch/pow(2,((log($rank)/log(2)*12-$i-2)/12)), 2);
	echo "<td>$i_pitch</td>";
	$i_iw = round($sw/pow(2,(($i-1)/($hn-1))), 4);
	echo "<td>$i_iw</td>";
	$i_id = round($sd/pow(2,(($i-1)/($hn-1))), 4);
	echo "<td>$i_id</td>";
	$i_ih = round(343.32/$i_pitch/2/$os*39.37-(3-$os)*$i_iw, 2);
	echo "<td>$i_ih</td>";
	$i_mh = round($i_iw * $mh, 4);
	echo "<td>$i_mh</td>";
	$i_wst = round(pow($ising,2)*pow($i_pitch,2)*1.239*pow(($i_mh*0.0254),3)/2/($pressure*249.089)*39.37, 4);
	echo "<td>$i_wst</td>";
	$i_flow = round(pow((2*$pressure*249.089/1.239),0.5)*($i_iw*0.0254)*($i_wst*0.0254)*2118.88, 2);
	echo "<td>$i_flow</td>";
	echo "</tr>";
}
?>
</tbody>
</table>
</body>
</html>

