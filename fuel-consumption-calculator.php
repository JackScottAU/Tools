<!DOCTYPE html>
<html>
<head>
	<title>Fuel Consumption Calculator</title>

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
	<h1 style="text-align: center;">Fuel Consumption Calculator</h1>
	
	<!-- Banner Ad Unit -->
	<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-9448968331199066" data-ad-slot="4253773439" data-ad-format="auto"></ins>
	<script>(adsbygoogle = window.adsbygoogle || []).push({});</script>

	<form class="form-horizontal" method="get" action="">
		<div class="form-group">
			<label for="price">Price per Litre</label>
			<input type="text" name="price" id="price" class="form-control" value="" />
		</div>
		
		<div class="form-group">
			<label for="litres">Litres</label>
			<input type="text" name="litres" id="litres" class="form-control" value="" />
		</div>

		<div class="form-group">
			<label for="distance">Distance</label>
			<input type="text" name="distance" id="distance" class="form-control" value="" />
		</div>
		
		<input type="submit" name="submit" value="Calculate" class="btn btn-success" style="display: block; margin: auto;" />
	</form>
<?php
	if(isset($_GET['submit']) && is_numeric($_GET['price']) && is_numeric($_GET['litres']) && is_numeric($_GET['distance']))
	{
		$price = $_GET['price'];
		$litres = $_GET['litres'];
		$distance = $_GET['distance'];
		
		echo '<table class="table"><tbody>';
		
		echo '<tr><th>L/100km</th><td>';
		echo ($litres / $distance) * 100;
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

