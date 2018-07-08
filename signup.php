<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>Registration System !</title>
  </head>
  <body>
    <nav class="navbar navbar-light" style="background-color: #243c6d;color:white;">
      <a class="navbar-brand" href="#" style="color:white">Registration System</a>
    </nav>


    <?php 

    require("dbh.php");
       $fname = $email = $phone = $pass = "";

       $fname_error = $email_error = $phone_error = $pass_error = "";
       if (isset($_POST['signup'])) {

        if (empty($_POST['fname'])) {
         $fname_error = "full name is required";
            }else {
              $fname = test_input($_POST['fname']);

                      if (empty($_POST['phone'])) {
                   $phone_error = "Phone no. is required";
                  }else {
                    $phone = test_input($_POST['phone']);
                  

                       if (empty($_POST['email'])) {
                           $email_error = "email is required";

                          }else {
                             $email = test_input($_POST['email']);

                                  if (empty($_POST['pass'])) {
                                     $pass_error = "password is required";
                                    }else {
                                        $pass = test_input($_POST['pass']);



                                        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);  // converting password hashing



                                        $sql = "INSERT INTO user (name, phone, email, password) VALUES ('$fname', '$phone', '$email', '$hashed_password')";

                                        if (mysqli_query($conn, $sql)) {
                                         

                                          header("Location:index.php?signup=success");
                                        }else {
                                          echo "Registration failed ,please try again".$sql;
                                        }






                                    }

                          }
                      }

             }
            
       }
 
    function test_input($data) {
      $data = trim($data);//remove the extra white spaces.

      $data = stripslashes($data);//remove the backslash \.

      $data = htmlspecialchars($data);//prevent exploiting urls
      return $data;
    }
     




     ?>


    <div class="container">
      <br><br>
      <div class="row">
        <div class="col col-sm-12 col-md-6 card align-self-center" style="padding:3rem 10px;">
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <center>
              <h3>Register your account</h3>
            </center>
            <div class="form-group">
              <label for="username">User Name</label>
              <input type="text" class="form-control" id="username" placeholder="Enter Full name" name="fname">
               <small id="username" class="form-text" style="color: red;"><?php echo $fname_error; ?>.</small>
            </div>
            <div class="form-group">
              <label for="phone_number">Phone No.</label>
              <input type="text" class="form-control" id="phone_number" placeholder="Enter Phone No." name="phone">
               <small id="phone_number" class="form-text" style="color: red;"><?php echo $phone_error; ?></small>
            </div>
            <div class="form-group">
              <label for="emailid">Email address</label>
              <input type="email" class="form-control" id="emailid" aria-describedby="emailHelp" placeholder="Enter email" name="email">
               <small id="emailid" class="form-text" style="color: red;"><?php echo $email_error; ?></small>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" placeholder="Password" name="pass">
               <small id="password" class="form-text" style="color: red;"><?php echo $pass_error; ?>.</small>
            </div>
            <button type="submit" class="btn btn-primary" name="signup">Submit</button>
            <a href="index.php" style="float:right;">click here to Login</a>
          </form>
        </div>
      </div>  
    </div>
















    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>