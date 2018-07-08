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
   session_start();
   require 'dbh.php';
   function test_input($data) {
      $data = trim($data);//remove the extra white spaces.

      $data = stripslashes($data);//remove the backslash \.

      $data = htmlspecialchars($data);//prevent exploiting urls
      return $data;
    }
   $email = $password = '';

   $email_error = $password_error = '';

   if (isset($_GET['signup']) == 'success') {

   
    echo "<script>alert('your account successfully registered')</script>";
   }
    if (isset($_POST['login'])) {

      if (empty($_POST['email'])) {
        $email_error = "email cannot be blank";
      }else{
        $email = $_POST['email'];

        if (empty($_POST['password'])) {
          $password_error = "password cannot be blank";
        }else{
          $password = $_POST['password'];



   $sql = "SELECT * FROM user WHERE email = '$email'";

   $result = mysqli_query($conn, $sql);

   $result_check = mysqli_num_rows($result);

   if ($result_check < 1) {
     echo "NO account available with this email";
   }else {
      if ($row = mysqli_fetch_assoc($result)) {
        $hashed_password_check = password_verify($password, $row['password']);

        echo $hashed_password_check;

        if ($hashed_password_check == false) {
          echo "password incorrect";
        }elseif ($hashed_password_check == true) {
          $_SESSION['uid'] = $row['id'];
          $_SESSION['name'] = $row['name'];
          $_SESSION['phone'] = $row['phone'];
          $_SESSION['email'] = $row['email'];

          header("Location: home.php");
          exit();
        }
      }
   }




        }
      }
      
    }
      
   ?> 


    <div class="container">
      <br><br><br><br><br>
      <div class="row">
        <div class="col col-sm-12 col-md-6 card align-self-center" style="padding:3rem 10px;">
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <center>
              <h3>Login Page</h3>
            </center>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1"  placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
            </div>
            <button type="submit" class="btn btn-primary" name="login">Submit</button>
            <a href="signup.php" style="float:right;">click here to register</a>
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