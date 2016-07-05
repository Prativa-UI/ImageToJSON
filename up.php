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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
               <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
		
		<script>
		$(document).ready(function () {
          $('.editbtn').click(function () {
              var currentTD = $(this).parents('tr').find('td');
              if ($(this).html() == 'Edit') {
                  currentTD = $(this).parents('tr').find('td');
                  $.each(currentTD, function () {
                      $(this).prop('contenteditable', true)
                  });
              } else {
                 $.each(currentTD, function () {
                      $(this).prop('contenteditable', false)
                  });
              }
			  
			  if($(this).html() == 'Save') {
				var image=$(this).parents('tr').find('a').html();
				image=image.split(".");
				//alert(image[0]);
				var type='<?php echo $_POST['typeofdoc'];?>';
				
				if( type == "cheque" )
				{  
						var c1 =$(this).parents('tr').find('td:eq(1)').html();
						var c2 =$(this).parents('tr').find('td:eq(2)').html();
						var c3 =$(this).parents('tr').find('td:eq(3)').html();
						var c4 =$(this).parents('tr').find('td:eq(4)').html();
					var TableData=new Array();
				
				 TableData[0]={"Bank Name" :c1, "IFSC Code" : c2, "Account No" : c3, "Account Holder" : c4 }
			    }
				
				if(type == "pan" )
				{  
						var c1 =$(this).parents('tr').find('td:eq(1)').html();
						var c2 =$(this).parents('tr').find('td:eq(2)').html();
						var c3 =$(this).parents('tr').find('td:eq(3)').html();
						var c4 =$(this).parents('tr').find('td:eq(4)').html();
					var TableData=new Array();
				
				 TableData[0]={"DOB" :c1, "PanNo" : c2, "Name" : c3, "Father Name" : c4 }
			    }
				
				
				if(type == "license" )
				{  
						var c1 =$(this).parents('tr').find('td:eq(1)').html();
						var c2 =$(this).parents('tr').find('td:eq(2)').html();
						var c3 =$(this).parents('tr').find('td:eq(3)').html();
						var c4 =$(this).parents('tr').find('td:eq(4)').html();
					var TableData=new Array();
				
				 TableData[0]={"Name" :c1, "Father Name" : c2, "DOB" : c3, "License Number" : c4 }
			    }
				
				
				if(type == "adhar" )
				{  
						var c1 =$(this).parents('tr').find('td:eq(1)').html();
						var c2 =$(this).parents('tr').find('td:eq(2)').html();
						var c3 =$(this).parents('tr').find('td:eq(3)').html();
						var c4 =$(this).parents('tr').find('td:eq(4)').html();
					var TableData=new Array();
				
				 TableData[0]={"Name" :c1, "Gender" : c2, "Birth year" : c3, "Uid" : c4 }
			    }
			  //alert(JSON.stringify(TableData));
			  
			  var a = document.createElement("a");
			  var file = new Blob([JSON.stringify(TableData,null,2)],{type:"application/json"});
			  a.href = window.URL.createObjectURL(file);
			  a.download = image[0] + '.json';
			  a.click();
			   
			}
    
              $(this).html($(this).html() == 'Edit' ? 'Save' : 'Edit')
    
          });
		  
		  $('.see').click(function () {
              var currentTD = $(this).parents('tr').find('td');
			  var image=$(this).parents('tr').find('a').html();
			  var view = "upload/" + image;
			  //$('#image').html(view);
			 
			  $("#image").attr("src", view);

				
		  });

		});
		</script>
		
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
		
<table id="tableone" style="width:100%">
  		
		
<?php 	
set_time_limit(0);	
/* uploading diectory of images and processing on each file present in it*/
$count = 0;
$doctype = $_POST['typeofdoc'];
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	if($doctype == "cheque")
	{
		echo "<tr>";
		echo"<th>Image</th>";
		echo"<th>Bank Name</th>";
		echo"<th>IFSC Code</th>";
		echo"<th>Account No</th>";
		echo"<th>Account Holder</th>";
		echo"<th>Change</th>";
		echo"</tr>";		
	}
	
	
	if($doctype == "pan")
	{
		echo "<tr>";
		echo"<th>Image</th>";
		echo"<th>DOB</th>";
		echo"<th>PanNo</th>";
		echo"<th>Name</th>";
		echo"<th>Father's Name</th>";
		echo"<th>Change</th>";
		echo"</tr>";		
	}

	if($doctype == "license")
	{
		echo "<tr>";
		echo"<th>Image</th>";
		echo"<th>Name</th>";
		echo"<th>Father's Name</th>";
		echo"<th>DOB</th>";
		echo"<th>LicenseNo</th>";
		echo"<th>Change</th>";
		echo"</tr>";		
	}
	
	if($doctype == "adhar")
	{
		echo "<tr>";
		echo"<th>Image</th>";
		echo"<th>Name</th>";
		echo"<th>Gender</th>";
		echo"<th>Birth year</th>";
		echo"<th>UId</th>";
		echo"<th>Change</th>";
		echo"</tr>";		
	}


	
		foreach ($_FILES['files']['name'] as $i => $name) {
        if (strlen($_FILES['files']['name'][$i]) > 1 && (($_FILES['files']['type'][$i] == "image/jpg") || ($_FILES['files']['type'][$i] == "image/png") || ($_FILES['files']['type'][$i] == "image/jpeg"))) 
		{
            if (move_uploaded_file($_FILES['files']['tmp_name'][$i], "upload/".$name)) {
               
				//echo "<br>";
				//echo $name;
				
				if($doctype == "cheque"){
					//echo $doctype;
					//echo "<br>";
					$result1=shell_exec("python crop_morphology.py ".$name);
					//echo $result1;
				    if($_POST['option']=='HDFC')
					{	
					$result = shell_exec("python cheque.py ".$result1);
					}
					
					if($_POST['option']=='ICICI')
					{
					$result = shell_exec("python icici.py ".$result1);	
					}

					if($_POST['option']=='SBI')
					{
					$result = shell_exec("python sbi.py ".$result1);	
					}		
					
					$info = pathinfo($name);
					$name = $info['filename'];
					$str = file_get_contents('json_file/'.$name.'.json');
					$array=json_decode($str,true);
					$address="upload/".$result1;
					
					echo"<tr>";
					echo "<td>";
                    echo "<a style='color:Bisque' href='#' class='see'>$result1</a>";
					echo"</td>";
					echo "<td contenteditable='false'>"; 
					echo $array['Bank Name'];
					echo"</td>";
					echo "<td contenteditable='false'>"; 
					echo $array['IFSC Code'];
					echo"</td>";
					echo "<td contenteditable='false'>"; 
					echo $array['Account No'];
					echo"</td>";
					echo "<td contenteditable='false'>"; 
					echo $array['Name'];
					echo"</td>";
					echo "<th contenteditable='false'>"; 
					echo "<button style='color:Indigo' class='editbtn'>Edit</button>";
					echo"</th>";
					echo"</tr>";
					
					//$newJsonString = json_encode($_GET['name']);
					//file_put_contents('json_file/'.$name.'.json',$newJsonString);

				}
			if($doctype == 'adhar'){
				//echo $doctype;
				//echo "<br>";

				//$result1=shell_exec("python crop_morphology.py ".$name);
				
				$result = shell_exec("python taadhar.py ".$name);
				//echo $result;
				
					$address="upload/".$name;
					$t1=$name;
					$info = pathinfo($name);
					$name = $info['filename'];
					$str = file_get_contents('json_file/'.$name.'.json');
					$array=json_decode($str,true);
					
					
					echo"<tr>";
					echo "<td>";
                    echo "<a style='color:Bisque' href='#' class='see'>$t1</a>";
					echo"</td>";
					echo "<td contenteditable='false'>"; 
					echo $array['Name'];
					echo"</td>";
					echo "<td contenteditable='false'>"; 
					echo $array['Gender'];
					echo"</td>";
					echo "<td contenteditable='false'>"; 
					echo $array['Birth year'];
					echo"</td>";
					echo "<td contenteditable='false'>"; 
					echo $array['Uid'];
					echo"</td>";
					echo "<th contenteditable='false'>"; 
					echo "<button style='color:Indigo' class='editbtn'>Edit</button>";
					echo"</th>";
					echo"</tr>";
					
				}
			
			if($doctype == 'pan'){
				//echo $doctype;
				
				//echo "<br>";
				if($_POST['option']=='NEW')
				{
				$result = shell_exec("python pannew.py ".$name);
				//echo $result;
				}
				
				if($_POST['option']=='OLD')
				{
				$result = shell_exec("python panold.py ".$name);
				//echo $result;
				}

					$address="upload/".$name;
					$t1=$name;
					$info = pathinfo($name);
					$name = $info['filename'];
					$str = file_get_contents('json_file/'.$name.'.json');
					$array=json_decode($str,true);
					
					
					echo"<tr>";
					echo "<td>";
                    echo "<a style='color:Bisque' href='#' class='see'>$t1</a>";
					echo"</td>";
					echo "<td contenteditable='false'>"; 
					echo $array['DOB'];
					echo"</td>";
					echo "<td contenteditable='false'>"; 
					echo $array['PanNo'];
					echo"</td>";
					echo "<td contenteditable='false'>"; 
					echo $array['Name'];
					echo"</td>";
					echo "<td contenteditable='false'>"; 
					echo $array['Father Name'];
					echo"</td>";
					echo "<th contenteditable='false'>"; 
					echo "<button style='color:Indigo' class='editbtn'>Edit</button>";
					echo"</th>";
					echo"</tr>";
	

					
			}  
			
			if($doctype == 'license'){
				//echo $doctype;
				//echo "<br>";
				$result = shell_exec("python license.py ".$name);
				//echo $result;
					
					
					$address="upload/".$name;
					$t1=$name;
					$info = pathinfo($name);
					$name = $info['filename'];
					$str = file_get_contents('json_file/'.$name.'.json');
					$array=json_decode($str,true);
					
					
					echo"<tr>";
					echo "<td>";
                    echo "<a style='color:Bisque' href='#' class='see'>$t1</a>";
					echo"</td>";
					echo "<td contenteditable='false'>"; 
					echo $array['Name'];
					echo"</td>";
					echo "<td contenteditable='false'>"; 
					echo $array['Father Name'];
					echo"</td>";
					echo "<td contenteditable='false'>"; 
					echo $array['DOB'];
					echo"</td>";
					echo "<td contenteditable='false'>"; 
					echo $array['LicenseNo'];
					echo"</td>";
					echo "<th contenteditable='false'>"; 
					echo "<button style='color:Indigo' class='editbtn'>Edit</button>";
					echo"</th>";
					echo"</tr>";	
				

			}  

			
			
				//echo"<br>";
				$count++;
            }
        }
    }
	
}?>
 
</table>       
		<div style="margin-top:2%; max-width:90%;"><img id="image" src=""></div>
        <div class="col-md-12 col-sm-12 col-xs-12 animated fadeInLeft delay-0-5 button" style="text-align:center;">
		<h4>Click <a href="download.php">here</a> to download files</h4>
		<h3 style="padding-bottom:50px;">Click <a href="index.php">here</a> to process another document.</h3>

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

