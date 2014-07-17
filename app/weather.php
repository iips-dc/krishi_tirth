
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

          <?php include("includes/header.inc.php"); ?>

           <!-- Code for fetching Weather Data -->
	        <?php 
	        	$json = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=Indore,in');
				$data = json_decode($json, true);
				#Calculation for converting temperature from kelvin to celsius
				$celsius = $data[main][temp] - 273;
			?>
<?php echo $data[weather][icon]; ?>
          <!-- Weather begins -->
      <div id="weather">      
        <h2 class="cover-heading">Weather Information at - <?php echo $data[name]; ?> </h2>

          <pre><ul>
            <li>Temperature 		     ---- <?php echo $celsius." Celsius "; ?><img src="http://openweathermap.org/img/w/<?php echo $data[weather][0][icon]; ?>.png"></li>
            <li>Description                  ---- <?php echo $data[weather][0][description]; ?></li>
            <li>Sunrise                      ---- <span id="sunrise"><?php echo $data[sys][sunrise]; ?></span></li>
            <li>Sunrise                      ---- <?php echo gmdate("g:i a", $data[sys][sunrise]	); ?></li>
            <li>Sunset                       ---- <span id="sunset"><?php echo $data[sys][sunset]; ?> </span></li>
            <li>Wind                         ---- <?php echo $data[wind][speed]. " mps"; ?></li>
            <li>Humidity                     ---- <?php echo $data[main][humidity]."%"; ?></li>
          </ul>  </pre>
                                       
      </div>
      <!-- Weather ends -->

          <?php include("includes/footer.inc.php"); ?>
          
        </div>

      </div>

    </div>

    <?php include("includes/jsLinks.inc.php"); ?>

    <!-- Script for manipulating weather information -->
    <script type="text/javascript">
    	/*var dt = new Date(1405613988 * 1000);
		var hr =dt.getHours(); 
		if(hr < 10) hr = '0'+hr;
		var mn =dt.getMinutes();
	    if(mn < 10) mn = '0'+mn;
		var mon =dt.getMonth()+1; 
		if(mon < 10) mon = '0'+mon;
		var day =dt.getDate(); 
		if(day < 10) day = '0'+day;
		var year =dt.getFullYear(); 
		$("#date_m").html('get at ' + year+'.'+mon+'.'+day+' '+hr+':'+mn );*/

		var times = SunCalc.getTimes(new Date(), 18.98, 72.83); 
		$("#sunrise").html(times.sunrise.getHours() + ':' + times.sunrise.getMinutes());
		$("#sunset").html(times.sunset.getHours() + ':' + times.sunset.getMinutes());
    </script>

  </body>
</html>
