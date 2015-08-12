<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Weather Scraper Project</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Optional theme -->
    <!--
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <style>
    	html, body{
    		height:100%;
    	}
    	.container{
    		background-image: url("clouds.jpg");
    		width: 100%;
    		height:100%;
 			background-size: cover; /* places image correctly on background */
 			background-position: center;
 			padding-top: 150px;
    	}
    	.row{
    		text-align: center;
    	}
 		.margTop{
 			margin-top:10px;
 		}
 		.alert{
 			display:none;
 		}
    </style>
    
  </head>
  <body>
	
	<div class="container">
	
		<div class="row">
		
			<div class="col-md-6 col-md-offset-3">
			
				<h1>Weather Forecast</h1>
				<p class="lead">Enter a city below for its weather forecast</p>
				
				<form>
				
					<div class="form-group">
					
						<input type="text" class="form-control" name="city" id="city" placeholder="Enter a city"/>
						<button id="findWeather" class="btn btn-success margTop">Submit</button>
					</div>
					
				</form>
				
				<div class="alert">

				</div>
			
			</div>
			
		</div>
		
	</div>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    
    <script>
    
    	$("#findWeather").click(function(event){
    	
    		event.preventDefault();
    		
    		if($("#city").val() == ""){
    		
    			$(".alert").addClass("alert-danger").html("Enter a city.").show();
    			
    		}
    		else{
    		
    			$.get("scraper.php?city=" + $("#city").val(), function(data){
					
					/* When the city is not found some servers return a string with a warning some servers return an empty string */
					var regex = /Warning/;
					if(data.match(regex)){
						$(".alert").removeClass("alert-success").addClass("alert-danger").html("City not found!").show();
					}
					else{
    					$(".alert").removeClass("alert-danger").addClass("alert-success").html(data).show();
    				}
    			});
    		}
    	});
    	
    </script>
    
  </body>
</html>