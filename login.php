<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=DotGothic16&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/styles/styles.css">
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
                  <a class="navbar-brand" href="notes.php">Worldwide News</a>
                  <a class="navbar-brand" href="search.php">Search News</a>
                  <a class="navbar-brand" href="#"></a>
              </nav>
          </div>
      </div>
    </div>
    <hr>
    <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-5">
            <form action="login.php" method="get">
              <div class="mb-3">
                <label for="lblUsername" class="form-label">Username: </label>
                <input type="text" class="form-control" name="txtUser" placeholder="Enter your username">
              </div>
              <div class="mb-3">
                <label for="lblPassword" class="form-label">Password</label>
                <input type="password" class="form-control" name="txtPassword" placeholder="Enter your password">
              </div>
              <input type="submit" class="btn btn-primary btn-lg" name="login" value="Log-in">
            </form>
          </div>
        </div>
    </div> 

    <?php
      if(array_key_exists('login', $_GET)) {
        $newUser = $_GET['txtUser'];
        $newPassword = $_GET['txtPassword'];
        if($newUser == "1" && $newPassword == "1"){
          header("location: admin.php");
        }
        else{

        }
      }
    ?>
    <?php
      $hostname = "localhost";
      $hostuser = "root";
      $hostpassword = "";
      $hostdatabase = "newsapp";
      //$hostuser = "id16368442_root";
      //$hostpassword = "H3lloWorld!1234";
      //$hostdatabase = "id16368442_newsapp";
      //$hostport = "3306";
      $conn = mysqli_connect($hostname,$hostuser,$hostpassword,$hostdatabase);
      if(array_key_exists('login', $_GET)) {
        if($conn){
          $newUser = $_GET['txtUser'];
          $newPassword = $_GET['txtPassword'];
          $query = "SELECT * FROM user WHERE user ="."'".$newUser."'";
          //echo "QUERY".$query;

          if(mysqli_query($conn,$query)){
            $result =  mysqli_query($conn,$query);
            $row = mysqli_fetch_assoc($result);
            if(mysqli_num_rows($result) > 0) {
              echo "USER: ".$row["user"];
              echo "PASS: ".$row["password"];
              if($newUser == $row["user"] && $newPassword == $row["password"]){
                header("location: admin.php");
              }
              else{
                echo '<div class="alert alert-danger" role="alert">';
                echo "Username or Password is incorrect, try again";
                echo "</div>";
              }
            }
            else{
              echo '<div class="alert alert-danger" role="alert">';
              echo "User doesn't exist, contact IT for assistance";
              echo "</div>";
            }
          }
          else{
            echo '<div class="alert alert-danger" role="alert">';
            echo "User doesn't exist, contact IT for assistance";
            echo "</div>";
          }
          mysqli_close($conn);
        }
        else{
          echo '<div class="alert alert-warning" role="alert">';
          echo "Internal error, contact IT for assitance.";
          echo "</div>";
        }
      }
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>