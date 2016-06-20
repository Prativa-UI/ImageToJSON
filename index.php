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
            <p><strong>OCR steps:</strong></p>
            <ul style="list-style:none;">
            <li>Image should be in high quality.</li>
			<li>Choose a directory containing only one type of Image</li>
            <li>select the type of Image from drop-down</li></ul>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12 animated fadeInRight delay-0-5 button" style="text-align:center;">
		<form action="up.php" enctype="multipart/form-data" method="post" style="float: right; width:100%;">
		
		 <input type="file" name="files[]" id="files" multiple="" directory="" webkitdirectory="" mozdirectory=""> <br/>
		 <select name="typeofdoc" style="color:black; top: 0%;position: absolute;">
		<option value="adhar">Aadhar Card</option>
		<option value= "cheque">Cheque </option>
		<option value= "pan">PAN Card </option>
		<option value="license">Driving License</option>
		</select>
            <input class="btn col-md-4 col-md-offset-3" type="submit" value="Upload Images" name="Submit" style="margin-top: 20%; color:black;" />
		<img class="col-md-6 col-sm-6 col-xs-12 animated fadeInLeft uimage" id="output" />
		</form>

       
        </div>
		
		<div class="row col-md-12 col-md-offset-1">
		<div class="col-md-3">
		<h4>AAdhar Card</h4>
		<ul>
		<li>Image dpi=300</li>
		</ul>
		</div>
		<div class="col-md-3">
		<h4>PAN Card</h4>
		<ul>
		<li>Image dpi= 96</li>
		</ul>
		</div>

		<div class="col-md-3">
		<h4>Driving Licence</h4>
		<ul>
		<li>width:2400-3000 pixels</li>
		<li>height:1500-2000 pixels</li>
		<li>Image dpi=70</li>
		</ul>
		</div>

		<div class="col-md-3">
		<h4>Cheque</h4>
		<ul>
		<li>Only for HDFC Bank Cheque</li>
		<li>Image dpi=300</li>
		</ul>
		</div>
</div>

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