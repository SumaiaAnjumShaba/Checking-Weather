<!DOCTYPE html>
<?php
$status="";
if(isset($_POST['submit'])){
	$city=$_POST['city'];
	$url="https://api.openweathermap.org/data/2.5/forecast?q=$city&lang=en&units=metric&appid=358ae091de470e7b07965ad69011671f";
	$ch=curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch);
	curl_close($ch);
	$result = json_decode($result, true);
	$status="yes";
}
?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Weather Update!</title>

		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">

	</head>


	<body>
		
		<div class="site-content">
			<div class="site-header">
				<div class="container">
					<a href="index.html" class="branding">
						<img src="images/logo.png" alt="" class="logo">
						<div class="logo-type">
							<h1 class="site-title">Weather App</h1>
						</div>
					</a>
				</div>
			</div> <!-- .site-header -->

			<div class="hero" data-bg-image="images/b1.jpg">
				<div class="container">
					<form action="#" class="find-location" method="post">
						<input type="text" placeholder="Enter your location..." name="city">
						<input type="submit" value="Find" class="submit" name="submit">
					</form>
				</div>
			
			<?php if($status=="yes"){?>
			<div style="height: 130px;">
			</div>
			<div class="forecast-table">
				<div class="container">
					<div class="forecast-container">
						<div class="today forecast">
							<div class="forecast-header">
								<div class="date"><?php echo date('d M Y',$result['list'][0]['dt'])?></div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
								<div class="location"><?php echo $result['city']['name']?></div>
								<div class="degree">
									<div class="num"><?php echo ceil($result['list'][0]['main']['temp']) ?><sup>o</sup>C</div>
									<div class="forecast-icon">
										<img src="http://openweathermap.org/img/wn/<?php echo $result['list'][0]['weather'][0]['icon']?>@2x.png" alt="" width=110>
									</div>
									<small><?php echo ceil($result['list'][0]['main']['temp_min']) ?><sup>o</sup></small>	
								</div>
								<span><img src="images/icon-wind.png" alt=""><?php echo $result['list'][0]['wind']['speed'] ?> km/hr</span>
							</div>
						</div>
						<div class="forecast">
							<div class="forecast-header">
								<div class="date"><?php echo date('d M Y',$result['list'][8]['dt'])?></div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
								<div class="forecast-icon">
								<img src="http://openweathermap.org/img/wn/<?php echo $result['list'][8]['weather'][0]['icon']?>@2x.png" alt="" width=70>
								</div>
								<div class="degree"><?php echo ceil($result['list'][8]['main']['temp_max']) ?><sup>o</sup>C</div>
								<small><?php echo ceil($result['list'][8]['main']['temp_min']) ?><sup>o</sup></small>
							</div>
						</div>
						<div class="forecast">
							<div class="forecast-header">
								<div class="date"><?php echo date('d M Y',$result['list'][16]['dt'])?></div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
								<div class="forecast-icon">
									<img src="http://openweathermap.org/img/wn/<?php echo $result['list'][16]['weather'][0]['icon']?>@2x.png" alt="" width=70>
								</div>
								<div class="degree"><?php echo ceil($result['list'][16]['main']['temp_max']) ?><sup>o</sup>C</div>
								<small><?php echo ceil($result['list'][16]['main']['temp_min']) ?><sup>o</sup></small>
							</div>
						</div>
						<div class="forecast">
							<div class="forecast-header">
								<div class="date"><?php echo date('d M Y',$result['list'][24]['dt'])?></div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
								<div class="forecast-icon">
									<img src="http://openweathermap.org/img/wn/<?php echo $result['list'][24]['weather'][0]['icon']?>@2x.png" alt="" width=70>
								</div>
								<div class="degree"><?php echo ceil($result['list'][24]['main']['temp_max']) ?><sup>o</sup>C</div>
								<small><?php echo ceil($result['list'][24]['main']['temp_min']) ?><sup>o</sup></small>
							</div>
						</div>
						<div class="forecast">
							<div class="forecast-header">
								<div class="date"><?php echo date('d M Y',$result['list'][32]['dt'])?></div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
								<div class="forecast-icon">
									<img src="http://openweathermap.org/img/wn/<?php echo $result['list'][32]['weather'][0]['icon']?>@2x.png" alt="" width=70>
								</div>
								<div class="degree"><?php echo ceil($result['list'][32]['main']['temp_max']) ?><sup>o</sup>C</div>
								<small><?php echo ceil($result['list'][32]['main']['temp_min']) ?><sup>o</sup></small>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			<?php } ?>
			</div>
			<footer class="site-footer">
				<div class="container">
					<p class="colophon">Copyright 2022. Designed by Sumaia Anjum Shaba. All rights reserved</p>
				</div>
			</footer> <!-- .site-footer -->
		</div>
		
		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>

</html>