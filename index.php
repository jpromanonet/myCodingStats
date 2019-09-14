<html>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='description' content=''>
    <meta name='author' content=''>
    <link rel='icon' href='../../favicon.ico'>

    <title>My Progress Stat</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </head>

  <body>

    <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
        <a class='navbar-brand' href='#'>jpStats</a>
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarColor03' aria-controls='navbarColor03' aria-expanded='false' aria-label='Toggle navigation'>
          <span class='navbar-toggler-icon'></span>
        </button>
      
        <div class='collapse navbar-collapse' id='navbarColor03'>
          <ul class='navbar-nav ml-auto'>
            <li class='nav-item active'>
              <a class='nav-link' href='#'>Home <span class='sr-only'>(current)</span></a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='#'>How To</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='#'>About</a>
            </li>
          </ul>
        </div>
    </nav>

    </br>
    </br>

    <div class='container'>
        <h1>Work Out</h1>
        <div class='row'>
            <div class='col-sm'>
       
                <div class='card text-white bg-Warning mb-3' style='max-width: 20rem;'>
                    <div class='card-header'>Total Running Time</div>
                        <div class='card-body'>
                            <?php

                                $sqlTotalTime = "SELECT FLOOR(SUM(tiempoCorrido)) AS 'totalTime'
                                                    FROM wo_Running";
                                                     
                                $res = $mysqli->query($sqlTotalTime);
                                $res->num_rows > 0;
                                $row = $res->fetch_array();

                                echo "<h1 class='card-title'>".$row['totalTime']." Min</h1>";

                                $mysqli->close(); 
                            ?> 
                        </div>
                </div>

            </div>
        
            <div class='col-sm'>

                <div class='card text-white bg-Warning mb-3' style='max-width: 20rem;'>
                    <div class='card-header'>Total Run Kilometers</div>
                        <div class='card-body'>
                            <?php

                                $sqlTotalKms = "SELECT CAST(SUM(kmCorridos) AS DECIMAL(10,1)) AS 'totalKms'
                                                    FROM wo_Running";
                                                     
                                $res = $mysqli->query($sqlTotalKms);
                                $res->num_rows > 0;
                                $row = $res->fetch_array();

                                echo "<h1 class='card-title'>".$row['totalKms']." Km</h1>";

                                $mysqli->close(); 
                            ?> 
                        </div>
                </div>

            </div>

            <div class='col-sm'>

                <div class='card text-white bg-Warning mb-3' style='max-width: 20rem;'>
                    <div class='card-header'>Total Weight Loss</div>
                        <div class='card-body'>
                            <?php

                                $sqlTotalWl = "SELECT CAST(SUM(diferenciaPeso) AS DECIMAL(10,2)) AS 'totalWl'
                                                    FROM wo_WeightLoss";
                                                     
                                $res = $mysqli->query($sqlTotalWl);
                                $res->num_rows > 0;
                                $row = $res->fetch_array();

                                echo "<h1 class='card-title'>".$row['totalWl']." Kg</h1>";

                                $mysqli->close(); 
                            ?> 
                        </div>
                </div>

               </div>
        
        </div>
    </div><!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js' integrity='sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM' crossorigin='anonymous'></script>

</body>
</html>