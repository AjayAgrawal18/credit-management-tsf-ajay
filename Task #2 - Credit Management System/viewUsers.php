<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>View Users - CMS</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link type="text/css" rel="stylesheet" href="css/users.css">
    
    <link rel="icon" href="https://www.thesparksfoundationsingapore.org/images/logo_small.png">
  </head>

  <body class="text-center">
      
    <!-- Navbar -->
    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <a href="index.php">
            <img class="masthead-brand" src="https://www.thesparksfoundationsingapore.org/images/logo_small.png" alt="" style="max-height: 60px; min-width: 70px"/>
          </a>
          <nav class="nav navbar navbar-expand-sm navbar-light nav-masthead justify-content-center">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
              <ul class="navbar-nav" id="navList">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link active" href="#">View Users</a></li>
                <li class="nav-item"><a class="nav-link" href="transactionHistory.php">Transaction History</a></li>
              </ul>
            </div>
          </nav>
        </div>
      </header>
      
      <!-- Main Page Content -->
      <main role="main" class="inner cover">
          
        <!-- Header Quote -->
        <!--<div class="quote" align="center" style="margin-top:20px;margin-bottom: 20px;">-->
        <!--    <quote style="font-style: italic; font-size: 20px; color: #d982b5;">“The real measure of your wealth is how much you’d be worth if you lost all your money.”</quote>-->
        <!--</div>-->
        
        <?php
        $servername = "localhost";
        $username = "id14993753_root";
        $password = "c8M]_lSDSVW4>h3s";
        $dbname = "id14993753_gripspark";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        if( $result->num_rows ==0 ){
          echo '<tr><td colspan="3">No Rows Returned</td></tr>';
        }

        if ($result->num_rows > 0) {
      ?>
        <!-- Users Table -->
        <div class="table-responsive" style="font-size: 15px;">
          <table class="table table-striped table-dark table-hover table-bordered table-sm" style="margin-top: 20px;" id="userTable">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Credits</th>
              </tr>
            </thead>
            <tbody>
            <?php
              while( $row = $result->fetch_assoc() ){
                //echo "<tr data-toggle='modal' data-target='#infoModal' data-whatever='".$row["Name"]."'><td>".$row["Name"]."</td><td>".$row["Email"]."</td><td>".$row["Credits"]."</td></tr>\n";
                echo "<tr><td>".$row["Name"]."</td><td>".$row["Email"]."</td><td>".$row["Credits"]."</td></tr>\n";
              }
            ?>
            </tbody>
          </table>
        </div>

        <!-- Credits Transfer Table -->
        <div class="modal fade" id="infoModal" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="infoModalTitle" style="color: black;">Welcome <strong id="userID"></strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                  &times;
                </button>
              </div>
              <div class="modal-body">
                <div class="container">
                  <div class="row body1" style="color:black;font-weight:500;margin-bottom: 20px;"></div> 

                  <div class="row body2">
                    <form action="transferCreds.php" method="post">
                        <select name="testUser" id="showUsers" class="custom-select">
                            <?php 
                            $drop = $conn->query("SELECT Name FROM users");
                            if($drop->num_rows > 0) {
                                while($r = $drop->fetch_assoc()) { ?>
                                    <option value="<?php echo $r['Name'] ?>"><?php echo $r['Name'] ?></option>
                                <?php 
                                }
                            }
                            ?>
                         </select>
                       <input type="number" placeholder="Credits" id="transCreds" name="tcreds" value="" class="form-control" style="margin-bottom: 10px;" min="1"/>
                       <button type="submit" class="btn btn-secondary col-sm-9 offset-sm-9" style="color: black; border: 2px solid black;">
                        <strong>Transfer Credits</strong>
                       </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
      <?php 
            } else {}
            
            $conn->close();
      ?>
      
      <!-- Footer -->
      <footer class="mastfoot mt-auto">
        <div class="inner">
          <p>Made by Ajay in 2020 during <a href="https://www.thesparksfoundationsingapore.org/join-us/internship-positions/">#GRIP</a>(internship), for <a href="https://www.thesparksfoundationsingapore.org/">@TSF</a>.</p>
        </div>
      </footer>
    </div>

    <script
      src="https://code.jquery.com/jquery-3.2.1.min.js"
      integrity=""
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity=""
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity=""
    ></script>

    <script>
    $('#userTable tbody').on('click' , 'tr' , function() {
        
        let currow = $(this).closest('tr');
        let name = currow.find('td:eq(0)').text();
        let credits = currow.find('td:eq(2)').text();

        document.cookie = 'cUser='+name;
        console.log(name);

        $('#userID').text(name + ',');
        $('.body1').text('Available Credits: ' + credits);
        $('#infoModal').modal('show');
    });
    </script>
  </body>
</html>