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
                    <a class="navbar-brand" href="index.php">Worldwide News</a>
                    <a class="navbar-brand" href=""></a>
                    <a class="navbar-brand" href="login.php">Log-in</a>
                </nav>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
      <div class="row">
        <div class="col">
          <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
            <div class="col">
              <label for="lblSearch" class="form-label">Search:</label>
              <form class="d-flex" method="GET">
                <input type="text" class="form-control" name="txtSearch" placeholder="Enter title to search">
                <br>
                <input type="submit" class="btn btn-primary btn-lg" name="search" value="Search">
              </form>
            </div>
            <a class="navbar-brand" href=""></a>
            <div class="col">
              <label for="lblFilter" class="form-label">Filter:</label>
              <form class="d-flex" method="GET">
                <div class = "dropdown">
                  <select class="custom_select" name="cmbSection">
                  <?php 
                    //$hostname = "localhost";
                    $hostuser = "root";
                    //$hostpassword = "";
                    //$hostdatabase = "newsapp";
                    $hostuser = "id16368442_root";
                    $hostpassword = "H3lloWorld!1234";
                    $hostdatabase = "id16368442_newsapp";
                    $hostport = "3306";
                    $conn = mysqli_connect($hostname,$hostuser,$hostpassword,$hostdatabase,$hostport);

                    if($conn){
                      $select_sql = "SELECT * FROM sections";
                      $result =  mysqli_query($conn,$select_sql);
                      $row = mysqli_fetch_assoc($result);
                        if (mysqli_num_rows($result) > 0) {
                          // output data of each row
                          $i = 1;
                          do{
                            if($row["st"]==1){
                              echo '<option value = "'.$i. '" >'. $row["section"]. "</option>";
                              $i++;
                            }
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
                  </select>
                </div>
                <input type="submit" class="btn btn-primary btn-lg" name="filter" value="Filter">
                </form>
              <br>
            </div>
            </div>
          </nav>
        </div>
      </div>
    </div>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col">
                <br>
                <article class="all-browsers">
                <?php 
                    //$hostname = "localhost";
                    $hostuser = "root";
                    //$hostpassword = "";
                    //$hostdatabase = "newsapp";
                    $hostuser = "id16368442_root";
                    $hostpassword = "H3lloWorld!1234";
                    $hostdatabase = "id16368442_newsapp";
                    $hostport = "3306";
                    $conn = mysqli_connect($hostname,$hostuser,$hostpassword,$hostdatabase,$hostport);

                    if($conn){
                      if(array_key_exists('search', $_GET)) {
                      $search = $_GET['txtSearch'];
                      $select_sql = "SELECT * FROM news WHERE title LIKE '%$search%'";
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
                                                echo '<p>Author: '.$row["autor"].' - '.$row["date"].'</p>';
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
                      elseif(array_key_exists('filter', $_GET)) {
                        $search = $_GET['cmbSection'];
                        $select_sql = "SELECT * FROM news WHERE section_id = $search";
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
                                                  echo '<p>Author: '.$row["autor"].' - '.$row["date"].'</p>';
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