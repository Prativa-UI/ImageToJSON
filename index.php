<<<<<<< HEAD
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
	<link rel="stylesheet" media="screen" href="assets/fonts/font-awesome/font-awesome.min.css">
	<!-- Extras -->
	<link rel="stylesheet" type="text/css" href="assets/extras/animate.css">
	<link rel="stylesheet" type="text/css" href="assets/extras/lightbox.css">
	<!-- jQuery Load -->
	<script src="assets/js/jquery-min.js"></script>
</head>

<body data-spy="scroll" data-offset="20" data-target="#navbar">
	<!-- Nav Menu Section End -->
	<!-- Hero Area Section -->
	<section id="hero-area">
	<div class="container">
	<div class="row">
	<div class="col-md-12">
	<h2 class="title">Optical Character Recognition</h2>
	<h3 class="subtitle">Extract data from documents!</h3>
	<div class="col-md-6 col-sm-6 col-xs-12 animated fadeInRight delay-0-5 button" style="text-align:center;" style="border:5 px;">

<!--	<form action="up.php" enctype="multipart/form-data" method="post" style="float: right; width:100%;">
	<input type="file" name="files" id="files">
	<input type="submit" value="Upload image" name="submit">
<!--	<select class="btn col-md-4 col-md-offset-3" name="typeofdoc" style="color:black; top: 0%;position: absolute;">
		<option>Choose Option</option>
		<option value="aadhaar">Aadhaar Card</option>
		<option value="cheque">Cheque</option>
		<option value="pan">PAN Card</option>
		<option value="license">Driving License</option>
		<option value="other">Other</option>		
	</select>
	<input class="btn col-md-4 col-md-offset-3" type="submit" value="Upload & Process" name="Submit" style="margin-top: 20%; color:black;" />
	<img class="col-md-6 col-sm-6 col-xs-12 animated fadeInLeft uimage" id="output" />
	</form>-->
	
	<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
	
	</div>
	</div>
	</div>
	</div>
	</section>
=======
    <!DOCTYPE html>
	<?php
	array_map('unlink', glob("json_file/*"));
	array_map('unlink', glob("upload/*"));
	?>	
	
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
		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
		
		<script type="text/javascript">
			$(document).ready(function(){
				$("select").change(function(){
					$(this).find("option:selected").each(function(){
						if($(this).attr("value")=="cheque"){
							$(".box").not(".cheque").hide();	
							$(".cheque").show();
							}
						else if($(this).attr("value")=="pan"){
								$(".box").not(".pan").hide();
								$(".pan").show();
								}
							else{
								$(".box").hide();
								}
							});
						}).change();
					});
		</script>
		
		<script>
			$(document).ready(function() {
				$('.checkbox').each(function() {
				$(this).addClass('unselected');
					});
  
			$('.checkbox').on('click', function() {
			$(this).toggleClass('unselected');
				$(this).toggleClass('selected');
					$('.checkbox').not(this).prop('checked', false);
					$('.checkbox').not(this).removeClass('selected');
					$('.checkbox').not(this).addClass('unselected');
					}); 
				});
		</script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

      </head>

    <body data-spy="scroll" data-offset="20" data-target="#navbar" >
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
        <h3 class="subtitle">Extract data from documents!</h3>
    
       

        <div class="col-md-6 col-sm-6 col-xs-12 animated fadeInLeft delay-0-5 button" style="text-align:left;">
        <h3 style="padding-bottom:20px;">Upload your document to get the data.</h3>
            <h4 style="padding-bottom:60px;">Choose File  >  Upload  >  Done!</h4>
            <p><strong>OCR Process:</strong></p>
            <ul style="list-style:none;">
            <li>Image should be in high quality.</li>
            <li>Choose a directory containing only one type of Image</li>
            <li>select the type of Image from drop-down</li></ul>
		</div>
		
		<div class="col-md-6 col-sm-6 col-xs-12 animated fadeInRight delay-0-5 button" style="text-align:center;">
		<form action="up.php" enctype="multipart/form-data" method="post" style="float: right; width:100%;">
		
		 <input type="file" name="files[]" id="files" multiple="" directory="" webkitdirectory="" mozdirectory=""> <br/>
		 <select name="typeofdoc" style="color:black; top: 0%;position: absolute;">
		<option value="Select" > Select</option> 
		<option value="adhar">Aadhar Card</option>
		<option value= "cheque">Cheque </option>
		<option value= "pan">PAN Card </option>
		<option value="license">Driving License</option>
		</select>
		
		 <div class="cheque box" style=" margin-left:27%; position:relative;">
		 
			<input type="radio" name="option" value="HDFC" id="HDFC" /> HDFC
			<input type="radio" name="option"  value="ICICI" id="ICICI"/> ICICI
			<input type="radio" name="option"  value="SBI" id="SBI"/> SBI
		</div>
		<!--
		 <label ><input type="checkbox" id="hdfc" class="checkbox " value="HDFC"/>HDFC</label><br>
		 <label >
		 <input type="checkbox" id="icici" class="checkbox" value="ICICI"/> ICICI
		 </label><br>
		 <label >
		 <input type="checkbox" id="sbi" class="checkbox " value="SBI"/> SBI
         </label>
		 </div>
		 -->
		 <div class="pan box" style=" margin-left:27%;">
			<input type="radio" name="option" value="NEW" id="NEW" /> New 
			<input type="radio" name="option" value="OLD" id="OLD" /> Old <br>
		 <!--
		 <label >
		 <input type="checkbox" id="pnew" class="checkbox " value="New"/> New<br>
		 </label>
		 <label >
		 <input type="checkbox" id="pold" class="checkbox " value="Old"/> Old<br>
		 </label>
		 -->
		 </div>
		 
		
            <input class="btn col-md-4 col-md-offset-3" type="submit" value="Upload Images" name="Submit" style="margin-top: 20%; color:black;" />
			<img class="col-md-6 col-sm-6 col-xs-12 animated fadeInLeft uimage" id="output" />
		</form>

       
        </div>
         </br>
	<div class="col-md-12">
		<table style="width:40% ">
		<tr>
		<th>Properties</th>
		<th></th>
		</tr>
		
		<tr>
		<td>DPI</td>
		<td>Maximum 300</td>
		</tr>
		
		<tr>
		<td>Image_width</td>
		<td>2400-3000 pixels</td>
		</tr>
		
		<tr>
		<td>Image_height</td>
		<td>1500-2000 pixels</td>
		</tr>
		
		</table>		
	
	
</div>

    </div>
</div>
</section>
>>>>>>> c0f643ecd4acf0102c4e396798269a5920e3310f

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
