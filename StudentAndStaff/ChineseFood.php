<?php
include('../Signup/session.php');
if(!isset($_SESSION['login_user'])){
header("location: loginpage.php"); // Redirecting To Home Page
}else {
  $username = $_SESSION['login_user'];
  $query = "SELECT * FROM costumers WHERE username='$username'";
  $query_run = mysqli_query($conn, $query);

  while ($row = mysqli_fetch_array($query_run)) {
    $userid = $row['id'];
    $balance = $row['Balance'];
  }
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
  <link rel="icon" href="./img/fcritlogo.png">
  <link rel="stylesheet" href="css/style.css">
  <title>FCRIT Canteen | Menu</title>
</head>
<body>
  <header>
    <nav id="navbar">
      <div class="container">
        <h1 class="logo">FCRIT Canteen</h1>
        <ul>
          <!-- <li><a href="index.html">Home</a></li> -->
          <li><a class="current" href="Menu.php">Menu</a></li>
          <li><a href="../Signup/contact.php">Contact</a></li>
          <li><a href="../Signup/profile.php">Profile</a></li>
          <li><a href="../Signup/logout.php"><h4>LOGOUT</h4> </a></li>
        </ul>
      </div>
    </nav>
  </header>

  <section id="about-info" class="bg-light py-3">
    <div class="container">
      <div class="info-left">
        <h1 class="l-heading"><span class="text-primary">About</span> FCRIT canteen</h1>
        <p>The spacious canteen caters not only to the hostelites and Balbhavan students but also to non-residential students and staff for the entire complex. The choice of food ranges from snacks to a Thali of Indian or Chinese Cuisine. Chilled soft-drinks and ice-cream help beat the heat.</p>
      </div>
      <div class="info-right">
        <!-- <img src="./img/photo-2.jpg" alt="hotel"> -->
        <h3 class="text-primary" class="l-heading">Your Balance</h3>
        <?php
        echo '<h3 class="text-primary" class="l-heading" >&#8377;'.$balance.'</h3>';
        ?>
      </div>
    </div>
  </section>

  <div class="clr"></div>

  <section id="testimonials" class="py-3">
    <div class="container">
      
      <h2 class="l-heading">Our Menu</h2>
      
      <div class="testimonial bg-primary">
        <img src="hakka.jpg" alt="Hakka Noodles">
        <strong><i>Hakka Noodles</i></strong>
        <p>
         The most sophisticated version of the common ChowMien. The Noodles are stir fried with Vegetables, Soy sauce, sometimes Eggs and Chicken too.
          <div>
            <Strong>Price: 70  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</Strong>
            <a href="Menu.html" class="btn btn-Menu "> <i>ORDER</i> </a> 
          </div>
        </p>
      </div>

      <div class="testimonial bg-primary">
          <img src="fried.jpg" alt="Schezwan Fried Rice">
          <strong><i>Schezwan Fried Rice </i></strong>
          <p> schezwan fried rice is hot & spicy with bursting flavors of ginger, garlic, soya sauce & red chilli paste!!!
            <div>
              <Strong>Price: 100  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</Strong>
              <a href="Menu.html" class="btn btn-Menu "> <i>ORDER</i> </a> 
            </div>
          </p>
      </div>
    
    </div>

  </section>

  <footer id="main-footer">
    <p>FCRIT Canteen &copy; 2020, All RIghts Reserved</p>
  </footer>
</body>
</html>