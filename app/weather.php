
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Krashi Tirth home page</title>

    <!-- Bootstrap core CSS -->
    <?php include "includes/cssLinks.inc.php"; ?>
    

  </head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">
	
	    	<!-- including header file -->
            <?php include("includes/header.inc.php"); ?>

   	    	<!-- Code for fetching Weather Data -->
            <?php 
				$json = file_get_contents('http://api.openweathermap.org/data/2.5/forecast?q=Indore,in');
        	
        		#Converting weather json data to array
				$data = json_decode($json, true);
	    	?>

            <!-- Weather begins -->
	    	<div id="weather" style="margin-top:80px;	">      
	        	<h2 class="cover-heading">Weather Information at - <?php echo $data['city']['name']; ?> </h2>
	          
				<!-- Table for showing Weather forecasting Data -->
				<table class="table">

				<thead>
			          <tr>
			            <th>Day</th>
			            <th>Time</th>
			            <th>Temperature</th>
			            <th>Description</th>
			            <th>Wind</th>
			            <th>Humidity</th>
			          </tr>
				</thead>

				<tbody>
			
					<?php #For Loop for iterating over weather forecast data

						#Storing weather forecasting data into weather variable
						    $weather = $data['list'];
						foreach ($weather as $list){
					
						# Date Formatting
						list($date, $time) = explode(" ", $list['dt_txt']);
						#Calculation for converting temperature from kelvin to celsius
						$celsius = $list['main']['temp'] - 273;
						#Other Weather data initialization
						$humidity =  $list['main']['humidity'];
						$description = $list['weather'][0]['description'];
						$wind = $list['wind']['speed'];
						$icon = $list['weather'][0]['icon'];

						echo "<tr>
							<td>$date</td>
							<td>$time</td>
							<td>$celsius Celsius <img src='http://openweathermap.org/img/w/$icon.png'></td>
							<td>$description</td>
							<td>$wind  mps</td>
							<td>$humidity %</td>
							 </tr>";			
						}
					 ?>
				        
				</tbody>

			   </table>

                        
	      </div>
	      <!-- Weather div ends -->
	      
          <?php include("includes/footer.inc.php"); ?>
          
        </div>
		<!-- Cover-container ends -->
      </div> 
      <!-- Site-Wrapper-inner ends -->
    </div>
    <!-- Site-Wrapper ends -->

    <!-- Including javascripts links -->
    <?php include("includes/jsLinks.inc.php"); ?>

  </body>
</html>
