<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>TheatreNow</title>
	<link rel = "stylesheet" type = "text/css" href = "../main/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Changa+One" rel="stylesheet">
	
</head>

<body>
	<?php
		$name = "";
		$location = "";
		$date = "";
		$url = "http://www.stleos.uq.edu.au/wp-content/uploads/2016/08/image-placeholder-350x350.png";
		$time = "";
		$files = "";
		$imagename= "";
		$image = "";
		if(!empty($_POST)) {
			function getimg($url) {         
				$headers[] = 'Accept: image/gif, image/x-bitmap, image/jpeg, image/pjpeg';              
				$headers[] = 'Connection: Keep-Alive';         
				$headers[] = 'Content-type: application/x-www-form-urlencoded;charset=UTF-8';         
				$user_agent = 'php';         
				$process = curl_init($url);         
				curl_setopt($process, CURLOPT_HTTPHEADER, $headers);         
				curl_setopt($process, CURLOPT_HEADER, 0);         
				curl_setopt($process, CURLOPT_USERAGENT, $user_agent);        
				curl_setopt($process, CURLOPT_TIMEOUT, 30);         
				curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);         
				curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1);         
				$return = curl_exec($process);         
				curl_close($process);         
				return $return;     
			} 
		$name = $_POST['event_name'];
		$location = $_POST['event_location'];
		$date = $_POST['event_date'];
		$url = $_POST['event_url'];
		$time = $_POST['event_time'];

		$files = glob('./tmp/'); 
			foreach($files as $file){ // iterate files
			  if(is_file($file))
				unlink($file); // delete file
			}
		$imagename= basename($url); // get file name
			if(!file_exists('./tmp/'.$imagename)){ // check for existing file with same name, just in case
				$image = getimg($url); // get image data to variable
				file_put_contents('tmp/'.$imagename,$image); // make image in tmp folder
			}
		} else {
		}
	?>
	
	<div class="container-fluid">
		<div class="nav-row">
			<div class="col-12">
				<img class="logo" src="../images/uhs_logo.png">
			</div>
		</div>
		<div class="row">
			<div class="nav">
				<a href="social.html"><div class="nav-dot">Social Media</div></a><br>
				<a href="streams.html"><div class="nav-dot">Upload Stream</div></a><br>
				<a href="merch.html"><div class="nav-dot">Custom Merch</div></a><br>
				<a href="resources.html"><div class="nav-dot">Show Resources</div></a><br>
				<a href="account.html"><div class="nav-dot">My Account</div></a>
			</div>
			
			<div class="main">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="home.html">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Social Media</li>
					</ol>
				</nav>
				<form name="event" action="#" method="post">
					<ul class="generate">
						<li>
							<label for="event_name">Show Name: </label><br>
							<input type="text" name="event_name" placeholder="" />
						</li>
						<br>
						<li>
							<label for="event_name">Location: </label><br>
							<input type="text" name="event_location" placeholder="" />
						</li>
						<br />
						<li>
							<label for="event_name">Date: </label><br>
							<input type="text" name="event_date" placeholder="05/11/2019" />
						</li>
						<br />
						<li>
							<label for="event_name">Time: </label><br>
							<input type="text" name="event_time" placeholder="7:45PM" />
						</li><br />
						<li>
							<label for="event_name">Background Image: </label><br>
							<input type="text" name="event_url" placeholder="Enter image URL..." />
						</li>
						<br />

						<li><button type="submit">Generate</button></li>
					</ul>
				</form>
				<div style="max-width:500px; max-height:500px; background-image:url('<?php echo $url; ?>'); position: relative; ">
				<div style="position: absolute; top:0; left:0; width:500px; height:500px; overflow:hidden;">
					<img src="<?php echo $url; ?>" style="width:500px; height:500px;" />
				</div>
				<div style="width:80%; margin:0 auto; height:500px; position: relative; top: 50%;">
					<div style="width:100%; position:absolute; background-color: rgba(255,255,255,.8); top: 25%;">
						<h1 style="text-align: center; font-size: 48px; line-height: 54px; color: #FFF; font-weight: 700; text-transform: uppercase; letter-spacing: 2px;">
							<?php echo $name; ?>		
						</h1>
						<span style="float: left; width: 100%; color: #222; font-size: 24px; line-height: 32px; padding-bottom: 15px; margin-bottom: 15px; text-align: center;">
							<i class="fa fa-map-marker"></i>
							<?php echo $location; ?>
						</span>
						<div style="width:100%;">
							<div style="float: left; width: 100%; color: #444; font-size: 24px; line-height: 32px; margin-bottom: 15px; text-align: center;">
								
							</div>
							<div style="float: left; width: 50%; color: #444; font-size: 24px; line-height: 32px; margin-bottom: 15px; text-align: center;">
								<i class="fa fa-calendar-o" style="margin-right: 5px;"></i><?php echo $date; ?>
							</div>
							<div style="float: left; width: 50%; color: #444; font-size: 24px; line-height: 32px; margin-bottom: 25px; text-align: center;">
								<i class="fa fa-clock-o" style="margin-right: 5px;"></i><?php echo $time; ?>
							</div>

						</div>
					</div>
				</div>
				</div>
		</div>
	</div>
	</div>
</body>
</html>
