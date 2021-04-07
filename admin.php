<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
        <div class="col-1 p-4">
          <h3>Logout</h3>
        </div>
    </div>
    <div class="container">
      <div class="row">
          <div class="col">
              <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
                  <a class="navbar-brand" href="notes.php">Worldwide News</a>
                  <a class="navbar-brand" href="search.php">Search News</a>
              </nav>
          </div>
      </div>
    </div>
    <hr>
    <div class="container">
        <div class="row justify-content-md-center">
          <div class="col">
            <ul class="nav nav-tabs justify-content-center">
              <li class="nav-item">
                  <a href="#section-creation" class="nav-link active" role="tab" data-toggle="tab">Add Section</a>
              </li>
              <li class="nav-item">
                  <a href="#note-creation" class="nav-link" role="tab" data-toggle="tab">Add a Note</a>
              </li>
              <li class="nav-item">
                <a href="#delete-section" class="nav-link" role="tab" data-toggle="tab">Delete Sections</a>
              </li>
              <li class="nav-item">
                  <a href="#delete" class="nav-link" role="tab" data-toggle="tab">Delete News</a>
              </li>
              <li class="nav-item">
                <a href="#graphs" class="nav-link" role="tab" data-toggle="tab">Graphs</a>
            </li>
            </ul>
            <div class="container">
              <div class="row justify-content-md-center">
                <div class="col-5">
                  <div class="tab-content">

                    <!--Section Creation-->
                    <div role="tabpanel" class="tab-pane fade" id="section-creation">
                      <br>
                      <div class="form-group">
                        <form action="admin.php" method="GET">  
                          <label for="lblTitle">Enter new Section:</label>
                          <input type="text" class="form-control" name="txtSection" placeholder="Enter new section">  
                          <br>
                          <input type="submit" class="btn btn-primary btn-lg" name="insertSection">
                        </form>
                      </div>
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
                        if(array_key_exists('insertSection', $_GET)) {
                          if($conn){
                            $newSection = $_GET['txtSection'];
                            $query = "INSERT INTO `sections` (`id`, `section`) VALUES (NULL, '$newSection')";

                            if(mysqli_query($conn,$query)){
                              echo '<div class="alert alert-success" role="alert">';
                              echo "New Section was added sucessfuly";
                              echo "</div>";
                            }
                            else{
                              echo '<div class="alert alert-danger" role="alert">';
                              echo "Cannot add new section, contact IT for assistance";
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
                    </div>
                    
                    
                    <!--Note Creation-->
                    <div role="tabpanel" class="tab-pane fade" id="note-creation">
                        <br>
                        <form action="admin.php" method="GET">
                            <div class="form-group">
                                <label for="lblTitle">Title:</label>
                                <input type="text" class="form-control" name="txtTitle" placeholder="Enter the Title">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="lblPhoto"><em>Enter photo for the note:</em></label>
                                <input type="file" class="form-control-file" name="picPhoto">
                            </div>
                            <br>
                            <div class="form-group">
                              <label for="lblDate"><em>Enter the date:</em></label>
                              <input class="form-control" type="date" value="2021-05-19" id="inputDate" name='txtDate'>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="lblNote"><em>Write all text for the note:</em></label>
                                <textarea class="form-control" name="txtText" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                              <label for="lblAuthor"><em>Author:</em></label>
                              <input type="text" class="form-control" name="txtAutor" placeholder="Author">
                            </div>
                            <br>
                            <div class = "dropdown">
                              <label for="lblSection"><em>Select the section:</em></label>
                              <br>
                              <select class="custom_select" name="cmbSection">
                                <?php 
                                  $hostname = "localhost";
                                  $hostuser = "root";
                                  $hostpassword = "";
                                  $hostdatabase = "newsapp";
                                  $conn = mysqli_connect($hostname,$hostuser,$hostpassword,$hostdatabase);

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
                            <br>
                            <input type="submit" class="btn btn-primary btn-lg" name="insertNews">
                        </form>
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
                          if(array_key_exists('insertNews', $_GET)) {
                            if($conn){
                              $newTitle = $_GET['txtTitle'];
                              $newPhoto = $_GET['picPhoto'];
                              $newText = $_GET['txtText'];
                              $newDate = $_GET['txtDate'];
                              $newAutor = $_GET['txtAutor'];
                              $newSection = $_GET['cmbSection'];
                              $query = "INSERT INTO `news` (`id`, `title`,`photo`,`text`,`date`,`autor`,`section_id`) VALUES (NULL,'$newTitle','$newPhoto','$newText','$newDate','$newAutor',$newSection)";

                              //echo "QUERY".$query;

                              if(mysqli_query($conn,$query)){
                                echo '<div class="alert alert-success" role="alert">';
                                echo "Note was added sucessfuly";
                                echo "</div>";
                              }
                              else{
                                echo '<div class="alert alert-danger" role="alert">';
                                echo "Cannot add new note, contact IT for assistance";
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
                                <!-- <option value = "1" >Sports</option>
                                
                                <option value = "3" >Politics</option>
                                <option value = "4" >Financial</option>
                                <option value = "5" >Art</option>
                                <option value = "6" >Weather</option> -->
                    </div>

                    <!--Delete Full News Sections-->
                    <div role="tabpanel" class="tab-pane fade" id="delete-section">
                        <form>
                            <nav class="navbar navbar-light bg-light">
                                <div class="container-fluid">
                                  <a class="navbar-brand">Search for Section</a>
                                  <form class="d-flex" method="GET">
                                    <input class="form-control me-2" type="search" name="txtSection" placeholder="Enter section's name" aria-label="Search">
                                    <br>
                                    <button class="btn btn-outline-success" type="submit" name="searchSection">Search</button>
                                  </form>
                                </div>
                              </nav>
                            <br>
                        </form>
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
                          if(array_key_exists('searchSection', $_GET)) {
                            if($conn){
                              $newSection  = $_GET['txtSection'];
                              $query = "SELECT * FROM sections WHERE section ='$newSection'";
                              $result =  mysqli_query($conn,$query);
                              
                              if(mysqli_query($conn,$query)){
                                if (mysqli_num_rows($result) > 0) {
                                  //HERE GOES CODE
                                  $row = mysqli_fetch_assoc($result);
                                  if($row["st"]==1){
                                    echo '<form action="admin.php" method="get">';
                                      echo '<div class="form-group">';
                                        echo  '<label for="lblName3">Section Name Found:</label>';
                                        echo  '<input type="text" class="form-control" name="txtDelete" value='."'".$row["section"]."' readonly>";
                                        echo  '<br>';
                                        echo  '<button type="submit" class="btn btn-primary btn-lg" name="deleteSection">Delete</button>';
                                      echo  '</div>';
                                    echo  '</form>';
                                  }
                                  else{
                                    echo '<div class="alert alert-danger" role="alert">';
                                    echo "Section is already deleted, try again";
                                    echo "</div>";
                                  }
                                }
                                else{
                                  echo '<div class="alert alert-danger" role="alert">';
                                  echo "Section doesn't exist, try again";
                                  echo "</div>";
                                }
                              }
                              else{
                                echo '<div class="alert alert-danger" role="alert">';
                                echo "Cannot find section, contact IT for assistance";
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
                          if(array_key_exists('deleteSection', $_GET)) {
                            if($conn){
                              $foundSection  = $_GET['txtDelete'];
                              mysqli_query($conn,"ALTER TABLE newsapp.news DROP FOREIGN KEY news_ibfk_1");
                              $query = "UPDATE sections SET st = 0 WHERE section ='$foundSection'";
                              mysqli_query($conn,"ALTER TABLE `news` ADD FOREIGN KEY (`section_id`) REFERENCES `sections`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT");                           
                              mysqli_query($conn,"ALTER TABLE `news` DROP FOREIGN KEY `news_ibfk_2`; ALTER TABLE `news` ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`autor`) REFERENCES `user`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;");
                              if(mysqli_query($conn,$query)){
                                echo '<div class="alert alert-success" role="alert">';
                                echo "New Section was DELETED sucessfuly";
                                echo "</div>"; 
                              }
                              else{
                                echo '<div class="alert alert-danger" role="alert">';
                                echo "Cannot find section, contact IT for assistance";
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
                    </div>
                    
                    <!--Delete Full News-->
                    <div role="tabpanel" class="tab-pane fade" id="delete">
                        <form>
                            <nav class="navbar navbar-light bg-light">
                                <div class="container-fluid">
                                  <a class="navbar-brand">Search for Title</a>
                                  <form class="d-flex" method="GET">
                                    <input class="form-control me-2" type="search" name="txtTitle" placeholder="Enter the complete title" aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit" name="searchNote">Search</button>
                                  </form>
                                </div>
                              </nav>
                            <br>
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
                          if(array_key_exists('searchNote', $_GET)) {
                            if($conn){
                              $newNote  = $_GET['txtTitle'];
                              $query = "SELECT * FROM news WHERE title ='$newNote'";
                              $result =  mysqli_query($conn,$query);
                              
                              if(mysqli_query($conn,$query)){
                                if (mysqli_num_rows($result) > 0) {
                                  //HERE GOES CODE
                                  $row = mysqli_fetch_assoc($result);
                                  echo '<form action="admin.php" method="get">';
                                    echo '<div class="form-group">';
                                      echo  '<label for="lblName3">Section Name Found:</label>';
                                      echo  '<input type="text" class="form-control" name="txtDelete" value='."'".$row["title"]."' readonly>";
                                      echo  '<br>';
                                      echo  '<button type="submit" class="btn btn-primary btn-lg" name="deleteNote">Delete</button>';
                                    echo  '</div>';
                                  echo  '</form>';
                                }
                                else{
                                  echo '<div class="alert alert-danger" role="alert">';
                                  echo "Section doesn't exist, try again";
                                  echo "</div>";
                                }
                              }
                              else{
                                echo '<div class="alert alert-danger" role="alert">';
                                echo "Cannot find section, contact IT for assistance";
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
                          if(array_key_exists('deleteNote', $_GET)) {
                            if($conn){
                              $foundSection  = $_GET['txtDelete'];
                              $query = "DELETE FROM news WHERE title ='$foundSection'";
                              if(mysqli_query($conn,$query)){
                                echo '<div class="alert alert-success" role="alert">';
                                echo "New Section was DELETED sucessfuly";
                                echo "</div>"; 
                              }
                              else{
                                echo '<div class="alert alert-danger" role="alert">';
                                echo "Cannot find section, contact IT for assistance";
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
                      </div>
                      
                      <!-- Graphs -->
                      <div role="tabpanel" class="tab-pane fade" id="graphs">
                        <!--<form action="admin.php" method="POST">-->
                            <!-- HERE GOES THE GRAPHS-->
                            <!-- No filter is required it's just a generic graph-->
                            <br>

                            <?php
                                $hostname = "localhost";
                                $hostuser = "root";
                                $hostpassword = "";
                                $hostdatabase = "newsapp";
                                //$hostuser = "id16368442_root";
                                //$hostpassword = "H3lloWorld!1234";
                                //$hostdatabase = "id16368442_newsapp";
                                //$hostport = "3306";

                                $connection = mysqli_connect($hostname,$hostuser,$hostpassword,$hostdatabase);


                                if ($connection) {
                                    echo "You're connected";
                                }
                                else{
                                    echo "You're NOT connected";
                                }
                            ?>  
                       <!-- </form> -->
                    </div>
              </div>
            </div>
            </div>
          </div>
          </div>
        </div>
    </div>
        

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>                          
                                
  </body>
</html>