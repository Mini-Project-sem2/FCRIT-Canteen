<?php
    $url=$_SERVER['REQUEST_URI'];
    header("Refresh: 10; URL=$url");
?>

<!DOCTYPE html>
<html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="css/fcritlogo.png">
    <title>FCRIT Canteen | CanteenStaff</title>
    <style>
      /* table {
        width: 100%;
      } */
      a {
      color: #333;
      text-decoration: none;
      }
      table,
      th,
      td {
        text-align: center;
        border: 2px solid black;
        border-collapse: collapse;
      }
      th {
        padding: 15px;
        text-align: left;
      }
      .button {
        display: inline-block;
        font-size: 18px;
        color: #fff;
        background: #333;
        padding: 13px 20px;
        border: none;
        cursor: pointer;
      }
      .button:hover {
        background: #CDCDCD;
        color: #333;
      }
      .button1 {
        background-color: white;
        color: black;
        border: 2px solid #4267B2;
        left: 200px;
      }
      .button2 {
        background: #f4f4f4;
        color: #333;
      }
      tr:nth-child(even) {
        background-color: #f2f2f2;
      }
    </style>
  </head>   
<body>

<table>
      <tr style="height: 100px">
        <th colspan="9">CANTEEN-STAFF&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button  class="button button1"><a href="logout.php">LOGOUT</a></button></th>
      </tr>
      <td style="width: 70px">Id</td>
      <td style="width: 120px">Name</td>
      <td style="width: 120px">Food Item</td>
      <td style="width: 70px">Food Id</td>
      <td style="width: 70px">Quantity</td>
      <td style="width: 70px">Price</td>
      <td style="width: auto">Status</td>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "canteendb";
    $conn = mysqli_connect("localhost", "root", "", "canteendb");
    $query = "SELECT * FROM currorderlist";
    $query_run = mysqli_query($conn, $query);
    if (!$query_run) {
      printf("Error: %s\n", mysqli_error($conn));
      exit();
    }
    while ($row = mysqli_fetch_array($query_run,MYSQLI_ASSOC)) {
      $userid=$row['userid'];
      $username=$row['username'];
      $foodname=$row['Foodname'];
      $foodid=$row['FoodId'];
      $quantity=$row['Quantity'];
      $price=$row['price'];
      echo '<tr>
              <td>'.$userid.'</td>
              <td>'.$username.'</td>
              <td>'.$foodname.'</td>
              <td>'.$foodid.'</td>
              <td>'.$quantity.'</td>
              <td>'.$price.'</td>
              <td><button class="button button2" ><a href="delete.php?userid='.$userid.'&foodid='.$foodid.'">delivered</a></button></td>
            </tr>';
    }
    echo "</table>";
?> 
<br />
  </body>
</html>