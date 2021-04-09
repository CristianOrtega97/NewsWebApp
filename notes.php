<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Required Stylesheeet -->
    <link rel="stylesheet" href="/styles/styles.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Worldwide News</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
          <div class="col-4">
            <picture>
                <source srcset="" type="image/svg+xml">
                <img src="./imgs/news.png" class="img-fluid img-thumbnail w-50 p-3 mx-auto d-block" alt="LOGO">
            </picture>
          </div>
          <div class="col-7">
              <h1 class="p-5">Worldwide News</h1>
          </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
                    <a class="navbar-brand" href="#"></a>
                    <a class="navbar-brand" href="search.php">Search News</a>
                    <a class="navbar-brand" href="login.php">Log-in</a>
                </nav>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <br>
                <h1 style="text-align: center;">Latest News</h1>
                <article class="all-browsers">
                <?php 
                    $hostname = "localhost";
                    $hostuser = "root";
                    $hostpassword = "";
                    $hostdatabase = "newsapp";
                    $conn = mysqli_connect($hostname,$hostuser,$hostpassword,$hostdatabase);

                    if($conn){
                        $select_sql = "SELECT * FROM news";
                        $result =  mysqli_query($conn,$select_sql);
                        $row = mysqli_fetch_assoc($result);
                            if (mysqli_num_rows($result) > 0) {
                                      // output data of each row
                                do{
                                    echo '<article class="browser">';
                                        echo '<div class="container">';
                                            echo '<h3>'.$row["title"].'</h3>';
                                            echo '<br>';
                                            echo '<div class="row">';
                                                echo '<div class="col-2">';
                                                    echo '<img src="./imgs/'.$row["photo"].'" class="img-fluid" alt="TEST">';
                                                echo '</div>';
                                                echo '<div class="col-10">';
                                                    echo '<p>'.$row["text"].'</p>';                                
                                                    echo '<p>Author: '.$row["autor"].' - '.$row["date"].'10/10/2020</p>';
                                                echo '</div>';
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</article>';
                                    echo '<hr>';
                                }
                                while($row = mysqli_fetch_assoc($result));
                            }
                            else {
                                echo "0 results";
                            }
                    }
                    else{
                        echo '<div class="alert alert-warning" role="alert">';
                        echo "Internal error, contact IT for assitance.";
                        echo "</div>";
                        }
                    mysqli_close($conn);
                ?>
                </article>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>