<?php
include('login.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
  if($username == 'admin'){
    header("location: adminp.php");
    mysqli_close($conn); // Closing Connection
 }elseif ($username == 'canteen') {
    header("location: canteen.php"); // Redirecting To Profile Page
    mysqli_close($conn); // Closing Connection
 }else {
    header("location:  profile.php"); // Redirecting To Profile Page
    mysqli_close($conn); // Closing Connection
 }
}
?>

<DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>FCRIT Canteen | Login</title>
    <link rel="icon" href="css/fcritlogo.png">
    <link
      href="https://fonts.googleapis.com/css?family=Raleway"
      rel="stylesheet"
    />
    <link 
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" 
      rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" 
      crossorigin="anonymous">
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
        <h1>Login</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <div class="form-group" >
            <label for="username" id="username">Username</label>
            <input type="text" name="username" id="username" />
          </div>
          <div class="form-group">
            <label for="password" id="password">Password</label>
            <input type="password" name="pass" id="pass" />
          </div>
          <button type="submit" class="btn" name="submit"> Login</button>
        </form>
      </div>
    </div>
  </body>
</html>
