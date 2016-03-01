<!DOCTYPE html>
<html>
<head>
	<title>Organ Pipe Calculator</title>

	<!-- BootStrap Stuff -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" />
	
	<!-- Google Adsense -->
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	
	<!-- PHP Initialisation -->
	<?php
		$notes = ['C', 'C#', 'D', 'D#', 'E', 'F', 'F#', 'G', 'G#', 'A', 'A#', 'B'];

		$pressure = isset($_GET['pressure']) ? $_GET['pressure'] : 2.00;
		$sw = isset($_GET['sw']) ? $_GET['sw'] : 2.431;
		$sd = isset($_GET['sd']) ? $_GET['sd'] : 3.084;
		$hn = isset($_GET['hn']) ? $_GET['hn'] : 18;
		$mh = isset($_GET['mh']) ? $_GET['mh'] : 0.3;
		$ising = isset($_GET['ising']) ? $_GET['ising'] : 2.00;
		$os = isset($_GET['os']) ? $_GET['os'] : 1;
		$rank = isset($_GET['rank']) ? $_GET['rank'] : 4;
		$pitch = isset($_GET['pitch']) ? $_GET['pitch'] : 440;
	?>
</head>
<body>
<div class="container">
	<h1 style="text-align: center;">Organ Pipe Calculator</h1>
	
	<!-- Banner Ad Unit -->
	<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-9448968331199066" data-ad-slot="4253773439" data-ad-format="auto"></ins>
	<script>(adsbygoogle = window.adsbygoogle || []).push({});</script>

	<form class="form-horizontal" method="get" action="">
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="pressure">Pressure</label>
					<input type="text" name="pressure" id="pressure" class="form-control" value="<?= $pressure; ?>" />
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="sw">Starting Width</label>
					<input type="text" name="sw" id="sw" class="form-control" value="<?= $sw; ?>" />
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="sd">Starting Depth</label>
					<input type="text" name="sd" id="sd" class="form-control" value="<?= $sd; ?>" />
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="hn">Halving Number</label>
					<input type="text" name="hn" id="hn" class="form-control" value="<?= $hn; ?>" />
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="mh">Mouth Height Ratio</label>
					<input type="text" name="mh" id="mh" class="form-control" value="<?= $mh; ?>" />
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="ising">Ising Number</label>
					<input type="text" name="ising" id="ising" class="form-control" value="<?= $ising; ?>" />
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="os">Open or Stopped</label>
					<select name="os" id="os" class="form-control">
						<option <?= $os==1 ? "selected" : "" ?> value="1">Open</option>
						<option <?= $os==2 ? "selected" : "" ?> value="2">Closed</option>
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="rank">Pitch of Rank</label>
					<input type="text" name="rank" id="rank" class="form-control" value="<?= $rank; ?>" />
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="pitch">Pitch of Middle A</label>
					<input type="text" name="pitch" id="pitch" class="form-control" value="<?= $pitch; ?>" />
				</div>
			</div>
		</div>
		
		<input type="submit" value="Calculate" class="btn btn-success" style="display: block; margin: auto;" />
	</form>

	<table class="table">
	<thead>
		<tr>
			<th>Note #</th>
			<th>Note</th>
			<th>Pitch (Hz)</th>
			<th>IW (in)</th>
			<th>ID (in)</th>
			<th>IL (in)</th>
			<th>MH (in)</th>
			<th>WST (in)</th>
			<th>Flow Rate (cfm)</th>
		</tr>
	</thead>
	<tbody>
<?php
for($i=1;$i<=61;$i++)
{
	echo "<tr>";
	echo "<td>$i</td>";
	$i_note = $notes[($i-1) % 12];
	$i_note2 = floor(($i-1) / 12)+3;
	echo "<td>$i_note<sub>$i_note2</sub></td>";
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

	<hr />
	
	<p>
	This page was created based on formulas available from <a href="http://www.rwgiangiulio.com/math/pipescaling.htm">here</a>. Code available on GitHub <a href="https://github.com/JackScottAU/Tools/blob/master/organ-pipe-calculator.php">here</a>.
	</p>

	<!-- Banner Ad Unit -->
	<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-9448968331199066" data-ad-slot="4253773439" data-ad-format="auto"></ins>
	<script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
</div>
</body>
</html>

