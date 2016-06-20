    <!DOCTYPE html>
   
	<?php
/*	$allowedExts = array("gif", "jpeg", "jpg", "png");
	$temp = explode(".", $_FILES["file"]["name"]);
	$extension = end($temp);
	if (($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/jpg") && ($_FILES["file"]["size"] < 20000) && in_array($extension, $allowedExts))
	{
		if ($_FILES["file"]["error"] > 0){
		echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
	} else {
		// echo "Upload: " . $_FILES["file"]["name"] . "<br>";
		// echo "Type: " . $_FILES["file"]["type"] . "<br>";
		// echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
		// echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists("upload/" . $_FILES["file"]["name"])){
		echo $_FILES["file"]["name"] . " already exists. ";
	} else {
		move_uploaded_file($_FILES["file"]["tmp_name"], "" . $_FILES["file"]["name"]);
      }
    }
	} else {
	echo "Invalid file";
	}
	$value1=$_FILES["file"]["name"];
	$result = shell_exec("python new1.py ".$value1); 
	echo $result;
*/	?>
	

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
    <div class="logo-menu">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" data-spy="affix" data-offset-top="50">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header col-md-3">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <img src="assets/atos-logo.png"/>
        </div>

        <div class="collapse navbar-collapse" id="navbar">
                            <ul class="nav navbar-nav col-md-9 pull-right">
                            <li class="active"></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            </ul>
        </div>
      </div>
    </nav>
    </div>
<!-- Nav Menu Section End -->

<!-- Hero Area Section -->

<section id="hero-area">
<div class="container">
    <div class="row">
<div class="col-md-12">
        <h2 class="title">Optical Character Recognition</h2>
        <h3 class="subtitle">Your data has been saved.</h3>
<?php 	
set_time_limit(0);	
/* uploading diectory of images and processing on each file present in it*/
$count = 0;
$doctype = $_POST['typeofdoc'];

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    foreach ($_FILES['files']['name'] as $i => $name) {
        if (strlen($_FILES['files']['name'][$i]) > 1 && (($_FILES['files']['type'][$i] == "image/jpg") || ($_FILES['files']['type'][$i] == "image/png") || ($_FILES['files']['type'][$i] == "image/jpeg"))) 
		{
            if (move_uploaded_file($_FILES['files']['tmp_name'][$i], "upload/".$name)) {
               
				echo "<br>";
				echo $name;
				
				if($doctype == "cheque"){
					//echo $doctype;
					echo "<br>";
					$result1=shell_exec("python crop_morphology.py ".$name);
					//echo $result1;
				    
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
			if($doctype == 'adhar'){
				//echo $doctype;
				echo "<br>";
				//$result1=shell_exec("python crop_morphology.py ".$name);
					//echo $result1;
				
				$result = shell_exec("python taadhar.py ".$name);
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
				$count++;
            }
        }
    }
	
}?>
 
       

        <div class="col-md-12 col-sm-12 col-xs-12 animated fadeInLeft delay-0-5 button" style="text-align:center;">
		<h3 style="padding-bottom:50px;">Click <a href="index.php">here</a> to process another document.</h3>
		<h4>Click <a href="download.php">here</a> to download files</h4>
		
</div>

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

