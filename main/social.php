<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>TheatreNow</title>
	<link rel = "stylesheet" type = "text/css" href = "../main/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">	
	
</head>

<body>
	<?php
// Check if submit
	$name = "";
	$location = "";
	$date = "";
	$url = "https://dhggywfvre0o8.cloudfront.net/app/uploads/2017/11/22153252/Typeform-Blog-BlackFriday-Cover-AskAwesomely.jpg";
	$time = "";
	$files = "";
	$imagename= "redsquare.jpg";
	$image = "";
if(!empty($_POST)) {
	// get vars
	
	// get image data as var from remote url
	function getimg($url) {         
	    $headers[] = 'Accept: image/gif, image/x-bitmap, image/jpeg, image/pjpeg';              
	    $headers[] = 'Connection: Keep-Alive';         
	    $headers[] = 'Content-type: application/x-www-form-urlencoded;charset=UTF-8';         
	    $user_agent = 'php';         
	    $process = curl_init($url);         
	    curl_setopt($process, CURLOPT_HTTPHEADER, $headers);         
	    curl_setopt($process, CURLOPT_HEADER, 0);         
	    curl_setopt($process, CURLOPT_USERAGENT, $user_agent); //check here         
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
	// delete all files in temp folder before uploading new one
	$files = glob('./tmp/'); // get all file names
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
	// HTML Input here
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
					<label for="event_name">Event Name: </label>
					<input type="text" name="event_name" placeholder="Event Name" /><br />

					<label for="event_name">Event Location: </label>
					<input type="text" name="event_location" placeholder="Location" /><br />

					<label for="event_name">Event Date: </label>
					<input type="text" name="event_date" placeholder="Date -- 05/11/2019" /><br />

					<label for="event_name">Event Time: </label>
					<input type="text" name="event_time" placeholder="Time -- 7:30 AM" /><br />

					<label for="event_name">Background Image (URL): </label>
					<input type="text" name="event_url" placeholder="Image URL..." /><br />

					<button type="submit">Submit</button>
				</form>
		
				<div style="width:500px; height:500px; background-image:url('<?php echo 'tmp/'.$imagename; ?>'); font-family: 'Montserrat'; position: relative;">
				<div style="position: absolute; top:0; left:0; width:100%; height:1000px; overflow:hidden;">
					<img src="<?php echo 'tmp/'.$imagename; ?>" style="width:auto; height:1000px;" />
				</div>
				<div style="width:50%; margin:0 auto; position:relative; height:1000px;">
					<div style="width:100%; position:absolute; bottom:0; background-color:#F5CB5C;">
						<h1 style="font-family: 'Montserrat'; text-align: center; font-size: 48px; line-height: 54px; color: #FFF; font-weight: 700; text-transform: uppercase; letter-spacing: 2px;">
							<?php echo $name; ?>		
						</h1>
						<span style="float: left; width: 100%; color: #222; font-size: 24px; line-height: 32px; padding-bottom: 15px; margin-bottom: 15px; text-align: center;">
							<i class="fa fa-map-marker"></i>
							<?php echo $location; ?>
						</span>
						<div style="width:100%;">
							<div style="float: left; width: 100%; color: #444; font-size: 24px; line-height: 32px; margin-bottom: 15px; text-align: center;">
								Starts:
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
