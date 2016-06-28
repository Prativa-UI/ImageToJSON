<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Optical Character Recognition</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <!-- Main Style -->
        <link rel="stylesheet" type="text/css" href="assets/css/main.css">
        <!-- Responsive Style -->
        <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
        <!--Icon Fonts-->
        <link rel="stylesheet" media="screen" href="assets/fonts/font-awesome/font-awesome.min.css" />
        <!-- Extras -->
        <link rel="stylesheet" type="text/css" href="assets/extras/animate.css">
        <link rel="stylesheet" type="text/css" href="assets/extras/lightbox.css">
        <!-- jQuery Load -->
        <script src="assets/js/jquery-min.js"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>
<body data-spy="scroll" data-offset="20" data-target="#navbar">
<!-- Nav Menu Section -->
<!-- Nav Menu Section End -->
<!-- Hero Area Section -->
<section id="hero-area">
<div class="container">
<div class="row">
<div class="col-md-12">
<h2 class="title">Optical Character Recognition</h2>
<h3 class="subtitle">Your data has been saved.</h3>
<div class="col-md-12 col-sm-12 col-xs-12 animated fadeInLeft delay-0-5 button" style="text-align:center;">
<h3 style="padding-bottom:50px;">Click <a href="index.php">here</a> to process another document.</h3>
<h4>Click <a href="download.php">here</a> to download files</h4>
</div>

<?php 	
set_time_limit(0);	
/* uploading diectory of images and processing on each file present in it*/
$count = 0;
$doctype = $_POST['typeofdoc'];
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    foreach ($_FILES['files']['name'] as $i => $name){
        if (strlen($_FILES['files']['name'][$i]) > 1 && (($_FILES['files']['type'][$i] == "image/jpg") || ($_FILES['files']['type'][$i] == "image/png") || ($_FILES['files']['type'][$i] == "image/jpeg"))){

	move_uploaded_file($_FILES["file"]["tmp_name"], $_FILES["file"]["name"]);

	if($doctype == "cheque"){
		echo "<br>";
		$result1=shell_exec("python crop_morphology.py ".$name);
		$result = shell_exec("python cheque.py ".$result1);
		 //$obj = json_encode($result);
		echo $result;
		//$info = pathinfo($name);
		//$file_name = $info['filename'];
		//$fp = fopen('upload/'.$file_name.'.json', 'w');
		//fwrite($fp, json_encode($result));
		//fclose($fp);
		echo "<br>";
	}
	if($doctype == 'aadhaar'){
		echo "<br>";
		//$result1=shell_exec("python crop_morphology.py ".$name);
		//echo $result1;

		$result = shell_exec("python taadhar.py ".$name);
		echo $name;
		echo $result;
	}
	if($doctype == 'pan'){
		//echo $doctype;
		echo "<br>";
		$result = shell_exec("python pan.py ".$name);
		echo $result;
	}  
	if($doctype == 'license'){
		//echo $doctype;
		echo "<br>";
		$result = shell_exec("python license.py ".$name);
		echo $result;
	}  
	//echo $result;
	echo"<br>";
		}
	}
}?>

		</div>
	</div>
</section>

<!-- Hero Area Section End-->
<!-- Copyright Section End-->
<!-- Bootstrap JS -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Smooth Scroll -->
<!-- Smooth Scroll -->
<script src="assets/js/smooth-scroll.js"></script>
<script src="assets/js/lightbox.min.js"></script>
<!-- All JS plugin Triggers -->
<script src="assets/js/main.js"></script>
</body>
</html>
