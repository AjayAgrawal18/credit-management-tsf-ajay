<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Home - CMS</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link type="text/css" rel="stylesheet" href="css/styles.css">
    
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
                <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="viewUsers.php">View Users</a></li>
                <li class="nav-item"><a class="nav-link" href="transactionHistory.php">Transaction History</a></li>
              </ul>
            </div>
          </nav>
        </div>
      </header>
      
      
      <!-- Create User Modal -->
      <div class="modal fade" id="createModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="createModalTitle"><strong style="color: black;">CREATE A NEW USER</strong></h5>
              <button type="button" class="close" data-dismiss="modal">
                &times;
              </button>
            </div>
            <div class="modal-body">

            <form action="createUser.php" method="post" onsubmit="return validateForm()" name="createForm" id="createUserForm">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="nameLabel"><strong style="color: black;">Name:</strong></label>
                <div class="col-sm">
                  <input type="text" id="nameLabel" class="form-control" placeholder="Enter Name" name="nameinp" value=""/>
                </div>
              </div>
    
              <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="emailLabel"><strong style="color: black;">Email:</strong></label>
                <div class="col-sm">
                  <input type="email" id="emailLabel" class="form-control" placeholder="Enter Email" name="emailinp" value=""/>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="creditsLabel"><strong style="color: black;">Credits:</strong></label>
                <div class="col-sm">
                  <input type="number" id="creditsLabel" class="form-control" placeholder="Enter Initial Credits" name="credinp" value="" min="1"/>
                </div>
              </div>
    
              <div class="form-group row">
                <div class="col-sm-10 offset-sm-5">
                  <button type="submit" class="btn btn-secondary" style="border: 2px solid black; color: black;">
                    <strong>Create User</strong>
                  </button>
                </div>
              </div>
            </form>

            </div>
          </div>
        </div>
      </div>
      
      <!-- Main Page Content -->
      <main role="main" class="inner cover">
        <!-- Header Quote -->
        <!--<div class="quote" align="center" style="margin-top:20px;margin-bottom: 40px;">-->
        <!--    <quote style="font-style: italic; font-size: 20px; color: #d982b5;">“If we command our wealth, we shall be rich and free. If our wealth commands us, we are poor indeed.”</quote>-->
        <!--</div>-->
        
        <h1 class="cover-heading"><strong>CREDIT MANAGEMENT SYSTEM</strong></h1>
        <p class="lead">Transfer credits among users, view transaction history and even, create users with convenient creds ;)</p>
        <p class="lead">
          <button data-toggle="modal" data-target="#createModal" class="btn btn-secondary" style="color: black; border: 2px solid black;"><strong>Create a User</strong></button>
        </p>
        
        <!-- Bottom Quote -->
        <div class="quote" align="center" style="margin-top:40px;margin-bottom: 20px;">
            <quote style="font-style: italic; font-size: 20px; color: #ffa500;">“Expect the Unexpected”</quote>
        </div>  
      </main>

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
        let validateForm = () => {
          let name = document.forms['createForm']['nameinp'].value;
          if(name == "") {
              alert('Name cannot be empty!');
              document.getElementById('nameLabel').style.borderColor = "red";
              return false;
          }

          let email = document.forms['createForm']['emailinp'].value;
          if(email == "") {
              alert('Email cannot be empty!');
              document.getElementById('emailLabel').style.borderColor = "red";
              return false;
          }

          let credits = document.forms['createForm']['credinp'].value;
          if(credits == "") {
              alert('Credits cannot be empty!');
              document.getElementById('creditsLabel').style.borderColor = "red";
              return false;
          } else {
            let isvalid = /^\d*$/.test(credits);

            if(!isValid) {
              alert('Invalid Credits!');
              document.getElementById('creditsLabel').style.borderColor = "red";
              return false;
            }
          }
          
          return true;
        }
    </script>
  </body>
</html>