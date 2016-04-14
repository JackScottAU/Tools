<!DOCTYPE html>
<html>
<head>
	<title>Electricity Cost Calculator</title>

	<!-- BootStrap Stuff -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" />
	
	<!-- Google Adsense -->
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

	<!-- Google Analytics -->
	<script>
  		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  		ga('create', 'UA-39588636-3', 'auto');
		ga('send', 'pageview');
	</script>
</head>
<body>
<div class="container">
	<h1 style="text-align: center;">Electricity Cost Calculator</h1>
	
	<!-- Banner Ad Unit -->
	<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-9448968331199066" data-ad-slot="4253773439" data-ad-format="auto"></ins>
	<script>(adsbygoogle = window.adsbygoogle || []).push({});</script>

	<form class="form-horizontal" method="get" action="">
		<div class="form-group">
			<label for="price">Price per KWH (dollars)</label>
			<input type="text" name="price" id="price" class="form-control" value="<?= is_numeric($_GET['price']) ? $_GET['price'] : "0.252" ?>" />
		</div>
		
		<div class="form-group">
			<label for="wattage">Appliance Wattage</label>
			<input type="text" name="wattage" id="wattage" class="form-control" value="<?= is_numeric($_GET['wattage']) ? $_GET['wattage'] : "" ?>" />
		</div>

		<div class="form-group">
			<label for="hours">Hours per Day</label>
			<input type="text" name="hours" id="hours" class="form-control" value="<?= is_numeric($_GET['hours']) ? $_GET['hours'] : "" ?>" />
		</div>
		
		<input type="submit" name="submit" value="Calculate" class="btn btn-success" style="display: block; margin: auto;" />
	</form>
<?php
	if(isset($_GET['submit']) && is_numeric($_GET['price']) && is_numeric($_GET['wattage']) && is_numeric($_GET['hours']))
	{
		$price = $_GET['price'];
		$wattage = $_GET['wattage']/1000; // Convert to kilowatts.
		$hours = $_GET['hours'];
		
		$pricewhenon = ($price * $wattage);
		$hoursperday = (24 / $hours);
		
		echo '<table class="table"><tbody>';
		
		echo '<tr><th>$/hour (when on)</th><td>';
		echo $pricewhenon;
		echo '</td></tr>';
		
		echo '<tr><th>$/day<td>';
		echo $pricewhenon / $hoursperday;
		echo '</td></tr>';
		
		echo '<tr><th>$/week<td>';
		echo $pricewhenon / $hoursperday * (365.25 / 52);
		echo '</td></tr>';
		
		echo '<tr><th>$/month<td>';
		echo $pricewhenon / $hoursperday * (365.25 / 12);
		echo '</td></tr>';
		
		echo '<tr><th>$/year<td>';
		echo $pricewhenon / $hoursperday * 365.25;
		echo '</td></tr>';
		
		echo '</tbody></table>';
	}
?>
	<hr />
	
	<p>
	Code available on <a href="https://github.com/JackScottAU/Tools">GitHub</a>.
	</p>

	<!-- Banner Ad Unit -->
	<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-9448968331199066" data-ad-slot="4253773439" data-ad-format="auto"></ins>
	<script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
</div>
</body>
</html>

