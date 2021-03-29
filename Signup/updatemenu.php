<?php

$conn = mysqli_connect("localhost", "root", "", "canteen");

$username = $password = $conform_password ="";
$username_err = $password_err = $conform_password_err ="";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $password=$_POST['pass'];
  if (empty(trim($_POST['username']))) {
    $username_err = "Username cannot be blank";
  }else{
    $sql = "SELECT id FROM user WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if($stmt){
      mysqli_stmt_bind_param($stmt, "s", $param_username);

      $param_username = trim($_POST['username']);

      if (mysqli_stmt_execute($stmt)){
        
        mysqli_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) == 1) {
          $username_err = "this username is regestered";
        }else {
          $username = trim($_POST['username']);
        }
      }else{
        echo "Something went wrong";
      }
    }
  }
  mysqli_stmt_close($stmt);
}

if (empty(trim($password))) {
  $password_err = "password cannot be blank";
}elseif(strlen(trim($_POST['pass']))<5){
  $password_err = "Password cannot be less than 5 characters";
}else {
  $password = trim($_POST['pass']);
}

if (trim($password) != trim($password)) {
  $conform_password_err = "password should match";
}

if (empty($username_err) && empty($$password_err) && empty($conform_password_err)) {
  
  $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    
  $stmt = mysqli_prepare($conn, $sql);
    
  if ($stmt){
      mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

      $param_username = $username;
      $param_password = password_hash($password, PASSWORD_DEFAULT);

      if (mysqli_stmt_execute($stmt)){
          header("location: loginpage.php");
      }else{
          echo "Something went wrong... cannot redirect!";
      }

      mysqli_stmt_close($stmt);
    }
   
}

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>FCRIT Canteen | SignIn</title>
    <link rel="icon" href="../StudentAndStaff/img/fcritlogo.png">
    <link
      href="https://fonts.googleapis.com/css?family=Raleway"
      rel="stylesheet"
    />
    <style>
      * {
        box-sizing: border-box;
        margin:0;
        padding: 0;
      }

      body {
        font-family: 'Raleway', sans-serif;
        background: #344a72;
        color: #fff;
        line-height: 1.8;
      }

      a {
        text-decoration: none;
      }

      #container {
        margin: 30px auto;
        max-width: 400px;
        padding: 20px;
      }

      .form-wrap {
        background: #fff;
        padding: 15px 25px;
        color: #333;
      }

      .form-wrap h1,
      .form-wrap p {
        text-align: center;
      }

      .form-wrap .form-group {
        margin-top: 15px;
      }

      .form-wrap .form-group label {
        display: block;
        color: #666;
      }

      .form-wrap .form-group input {
        width: 100%;
        padding: 10px;
        border: #ddd 1px solid;
        border-radius: 5px;
      }

      .form-wrap button {
        display: block;
        width: 100%;
        padding: 10px;
        margin-top: 20px;
        background: #49c1a2;
        color: #fff;
        cursor: pointer;
      }

      .form-wrap button:hover {
        background: #37a08e
      }

      .form-wrap .bottom-text {
        font-size: 13px;
        margin-top: 20px;
      }

      footer {
        text-align: center;
        margin-top: 10px;
      }

      footer a {
        color:#49c1a2
      }
    </style>
  </head>
  <body>
    <div id="container">
      <div class="form-wrap">
        <h1>Sign Up</h1>
        <p>It's free and only takes a minute</p>
        <form action="" method="$_POST">
          <div class="form-group">
            <label for="first-name">Username</label>
            <input type="text" name="username" id="first-name" />
          </div>
          <div class="form-group">
            <label for="last-name">Roll no.</label>
            <input type="number" name="id" id="last-name" />
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" />
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" />
          </div>
          <div class="form-group">
            <label for="password2">Confirm Password</label>
            <input type="password" name="pasword2" id="password2" />
          </div>
          <button type="submit" class="btn"> Update </button>
          </p>
        </form>
      </div>
    </div>
  </body>
</html>