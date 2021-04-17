<?php
include('session.php');
if(!isset($_SESSION['login_user'])){
header("location: loginpage.php"); // Redirecting To Home Page
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Welcome to the most extraordinary hotel in Boston Massachusetts">
  <meta name="keywords" content="hotel,boston hotel,new england hotel">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  <link rel="icon" href="css/fcritlogo.png">
  <link rel="stylesheet" href="../Signup/css/style.css">
  <title>FCRIT Canteen | Contact</title>
</head>
<body>
  <header>
    <nav id="navbar">
      <div class="container">
        <h1 class="logo">FCRIT Canteen</h1>
        <ul>
          <li><a href="../StudentAndStaff/Menu.php">Menu</a></li>
          <li><a class="current" href="contact.php">Contact</a></li>
          <li><a href="profile.php">Profile</a></li>
          <li><a href="../Signup/logout.php">
              <h4>LOGOUT</h4>
            </a></li>
          <li><a href="logout.php"><h4>LOGOUT</h4></a></li>
        </ul>
      </div>
    </nav>
  </header>

  <section id="contact-form" class="py-3">
    <div class="container">
      <h1 class="l-heading"><span class="text-primary">Contact</span> Us</h1>
      <p>Please fill out the form below to contact us</p>
      <form action="process.php">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" id="name">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email">
        </div>
        <div class="form-group">
          <label for="message">Message</label>
          <textarea name="message" id="message"></textarea>
        </div>
        <button type="submit" class="btn">Submit</button>
      </form>
    </div>
  </section>

  <section id="contact-info" class="bg-dark">
    <div class="container">
        <div class="box">
            <i class="fas fa-hotel fa-3x"></i>
            <h3>Location</h3>
            <p>Agnel Technical Education Complex
              Sector 9-A, Vashi, Navi Mumbai,
              Maharashtra, India
              PIN - 400703</p>
          </div>
          <div class="box">
              <i class="fas fa-phone fa-3x"></i>
              <h3>Phone Number</h3>
              <p>(022) 27771000 , 27662949</p>
          </div>
          <div class="box">
              <i class="fas fa-envelope fa-3x"></i>
              <h3>Email Address</h3>
              <p>principal@fcrit.ac.in</p>
          </div>
    </div>
  </section>

  <footer id="main-footer">
    <p>FCRIT Canteen &copy; 2020, All RIghts Reserved</p>
  </footer>
</body>
</html>