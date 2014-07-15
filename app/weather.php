
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

          <!-- Weather begins -->
      <div id="weather">      
        <h1 class="cover-heading">Weather Information</h1>
        
          <ul>
            <li>You are currently located at -------</li>
            <li>Sunrise                      -------</li>
            <li>Sunset                       -------</li>
            <li>Wind                         --------</li>
            <li>Humidity                     --------</li>
          </ul>  
                                       
      </div>
      <!-- Weather ends -->

          <?php include("includes/footer.inc.php"); ?>
          
        </div>

      </div>

    </div>

    <?php include("includes/jsLinks.inc.php"); ?>
  </body>
</html>
