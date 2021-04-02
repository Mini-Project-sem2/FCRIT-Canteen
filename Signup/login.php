<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) { 
   if (empty($_POST['username']) || empty($_POST['pass'])) {
      $error = "Username or Password is invalid";
   }else{
      // Define $username and $password
      $username = $_POST['username'];
      $password = $_POST['pass'];
      // mysqli_connect() function opens a new connection to the MySQL server.
      $conn = mysqli_connect("localhost", "root", "", "canteendb");
      // SQL query to fetch information of registerd users and finds user match.
      $query = "SELECT username, pass from costumers where username=? AND pass=? LIMIT 1";
      // To protect MySQL injection for Security purpose
      $stmt = $conn->prepare($query);
      $stmt->bind_param("ss", $username, $password);
      $stmt->execute();
      $stmt->bind_result($username, $password);
      $stmt->store_result();
      if($stmt->fetch()){ //fetching the contents of the row 
         $_SESSION['login_user'] = $username; // Initializing Session
         if($username == 'admin'){
            header("location: adminp.php");
            mysqli_close($conn); // Closing Connection
         }elseif ($username == 'canteen') {
            header("location: canteen.php"); // Redirecting To Profile Page
            mysqli_close($conn); // Closing Connection
         }else {
            header("location: contact.php"); // Redirecting To Profile Page
            mysqli_close($conn); // Closing Connection
         }
      }
   }
}