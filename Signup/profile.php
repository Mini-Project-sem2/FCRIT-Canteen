<?php
include('../Signup/session.php');
if (!isset($_SESSION['login_user'])) {
  header("location: loginpage.php"); // Redirecting To Home Page
} else {
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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  <link rel="icon" href="css/fcritlogo.png">
  <link rel="stylesheet" href="../Signup/css/style.css">
  <style>
          table {
            border-collapse: collapse;
            width: 100%;
            color: #588c7e;
            font-family: monospace;
            font-size: 25px;
            text-align: left;
          }

          th {
            background-color: #588c7e;
            color: white;
          }

          tr {
            background-color: #f2f2f2;
          }

          td {
            background-color: #f2f2f2;
            border-collapse: collapse;
            width: 100px;
            color: #588c7e;
            font-family: monospace;
            font-size: 25px;
            text-align: left;
          }
        </style>
  <title>FCRIT Canteen | Profile</title>
</head>

<body>
  <header>
    <nav id="navbar">
      <div class="container">
        <h1 class="logo">FCRIT Canteen</h1>
        <ul>
          <li><a href="../StudentAndStaff/Menu.php">Menu</a></li>
          <li><a href="../Signup/contact.php">Contact</a></li>
          <li><a class="current" href="Profile.php">Profile</a></li>
          <li><a href="logout.php">
              <h4>LOGOUT</h4>
            </a></li>
        </ul>
      </div>
    </nav>
  </header>

  <section id="profile" class="py-3">
    <div class="container">
      <h1 class="l-heading"><span class="text-primary">Profile</span></h1>
      <div class="info-right">
        <!-- <img src="./img/photo-2.jpg" alt="hotel"> -->
        <h3 class="text-primary" class="l-heading">username:</h3>
        <?php
        echo '<h3 class="text-primary" style="color:black;" >' . $username . '</h3>';
        ?>
      </div>
      <div class="info-right">
        <!-- <img src="./img/photo-2.jpg" alt="hotel"> -->
        <h3 class="text-primary" class="l-heading">userid:</h3>
        <?php
        echo '<h3 class="text-primary" style="color:black;" >' . $userid . '</h3>';
        ?>
      </div>
      <div class="info-right">
        <!-- <img src="./img/photo-2.jpg" alt="hotel"> -->
        <h3 class="text-primary" class="l-heading">Your Balance:</h3>
        <?php
        echo '<h3 class="text-primary" style="color:black;" >' . $balance . '</h3>';
        ?>
      </div>
      <div class="info-right">
        <!-- <img src="./img/photo-2.jpg" alt="hotel"> -->
        <h3 class="text-primary" class="l-heading">Order History</h3>
          <table>
            <tr>
              <th>Foodname</th>
              <th>Foodid</th>
              <th>Quantity</th>
              <th>price</th>
              <th>Status</th>
              <th>Order log</th>
              <th>diliver log</th>
            </tr>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "canteendb");
            $query = "SELECT * FROM orderlist";
            $query_run = mysqli_query($conn, $query);
            if (!$query_run) {
              printf("Error: %s\n", mysqli_error($conn));
              exit();
            }
            while ($row = mysqli_fetch_array($query_run, MYSQLI_ASSOC)) {
              $foodname = $row['Foodname'];
              $foodid = $row['FoodId'];
              $quantity = $row['Quantity'];
              $price = $row['price'];
              $os = $row["Order_Status"];
              $od = $row["orderdate"];
              $dd = $row["diliverdate"];
              echo '<tr>
                      <td >' . $foodname . '</td>
                      <td >' . $foodid . '</td>
                      <td >' . $quantity . '</td>
                      <td >' . $price . '</td>
                      <td >' . $os . '</td>
                      <td >' . $od . '</td>
                      <td >' . $dd . '</td>
                      </tr >';
            }
            echo "</table>";
            ?>
          </table>
      </div>
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
<!-- INSERT INTO orderlist values(userid,'$username','$fname',$foodid,$quantity,$bill,'Ordered','$date',NULL)
INSERT INTO currorderlist values($userid,'$username','$fname',$foodid,$quantity,$bill) -->
</html>