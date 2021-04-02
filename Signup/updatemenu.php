<?php

$conn = mysqli_connect("localhost", "root", "", "canteendb");

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

