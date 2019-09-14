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
        <a class='navbar-brand' href='http://jpromano.net'>Jpromano.net</a>
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarColor03' aria-controls='navbarColor03' aria-expanded='false' aria-label='Toggle navigation'>
          <span class='navbar-toggler-icon'></span>
        </button>
      
        <div class='collapse navbar-collapse' id='navbarColor03'>
          <ul class='navbar-nav ml-auto'>
            <li class='nav-item active'>
              <a class='nav-link' href='http://jpromano.net/stats'>Home <span class='sr-only'>(current)</span></a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='http://jpromano.net/stats/codingStats.php'>Coding</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Study
              </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="http://jpromano.net/stats/runningStats.php">University</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="http://jpromano.net/stats/runningStats.php">Languages</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Programming</a>
                </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Reading
              </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="http://jpromano.net/stats/runningStats.php">Reading Hours</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Read Books</a>
                </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Workout
              </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="http://jpromano.net/stats/runningStats.php">Running</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Weight Loss</a>
                </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Random
              </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="http://jpromano.net/stats/runningStats.php">Mate</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Blog Posts</a>
                </div>
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
        <h1>Coding</h1>
        <div class='row'>
            <div class='col-sm'>
       
                <div class='card text-white bg-success mb-3' style='max-width: 20rem;'>
                    <div class='card-header'>Total Coding Time</div>
                        <div class='card-body'>
                            <?php
                                $mysqli = new mysqli("localhost", "kq000102_pStats", "bo17vereVU", "kq000102_pStats");

                                $sqlTotalTime = "SELECT CAST(SUM(codingHours) AS DECIMAL(10,1)) AS 'totalTime'
                                                    FROM cs_CodingHours";
                                                     
                                $res = $mysqli->query($sqlTotalTime);
                                $res->num_rows > 0;
                                $row = $res->fetch_array();

                                echo "<h1 class='card-title'>".$row['totalTime']." Hs</h1>";

                                $mysqli->close(); 
                            ?> 
                        </div>
                </div>

            </div>
        
            <div class='col-sm'>

                <div class='card text-white bg-success mb-3' style='max-width: 20rem;'>
                    <div class='card-header'>Total Commits</div>
                        <div class='card-body'>
                            <?php
                                $mysqli = new mysqli("localhost", "kq000102_pStats", "bo17vereVU", "kq000102_pStats");

                                $sqlTotalCommits = "SELECT SUM(dailyCommits) AS 'totalCommits'
                                                    FROM cs_CodingHours";
                                                     
                                $res = $mysqli->query($sqlTotalCommits);
                                $res->num_rows > 0;
                                $row = $res->fetch_array();

                                echo "<h1 class='card-title'>".$row['totalCommits']."</h1>";

                                $mysqli->close(); 
                            ?> 
                        </div>
                </div>

            </div>

            <div class='col-sm'>

                <div class='card text-white bg-success mb-3' style='max-width: 20rem;'>
                    <div class='card-header'>Most Used Language</div>
                        <div class='card-body'>
                            <?php
                                $mysqli = new mysqli("localhost", "kq000102_pStats", "bo17vereVU", "kq000102_pStats");

                                $sqlMostUsedLang = "SELECT dayLanguage AS 'totalLang', 
	                                                         FLOOR(SUM(codingHours)) as 'totalHours'
       		                                                    FROM cs_CodingHours
            	                                                  WHERE codingHours != 1307
        			                                                    GROUP BY codingHours
                		                                                ORDER BY totalHours DESC";
                                                     
                                $res = $mysqli->query($sqlMostUsedLang);
                                $res->num_rows > 0;
                                $row = $res->fetch_array();

                                echo "<h1 class='card-title'>".$row['totalLang']."</h1>";

                                $mysqli->close(); 
                            ?> 
                        </div>
                </div>

               </div>
        
        </div>
    </div><!-- /container -->
    </br>
    <div class='container'>
        <h1>Work Out</h1>
        <div class='row'>
            <div class='col-sm'>
       
                <div class='card text-white bg-Warning mb-3' style='max-width: 20rem;'>
                    <div class='card-header'>Total Running Time</div>
                        <div class='card-body'>
                            <?php
                                $mysqli = new mysqli("localhost", "kq000102_pStats", "bo17vereVU", "kq000102_pStats");

                                $sqlTotalTime = "SELECT CAST(SUM(tiempoCorrido) AS DECIMAL(10,1)) AS 'totalTime'
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
                                $mysqli = new mysqli("localhost", "kq000102_pStats", "bo17vereVU", "kq000102_pStats");

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
                                $mysqli = new mysqli("localhost", "kq000102_pStats", "bo17vereVU", "kq000102_pStats");

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

    <footer class="page-footer font-small blue pt-4 bg-light fixed-bottom">
        <div class="footer-copyright text-center py-3">2019 MIT License |
          <a href="https://github.com/jpromanonet/myProgressStats" target="_blank"> Github</a>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js' integrity='sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM' crossorigin='anonymous'></script>

</body>
</html>