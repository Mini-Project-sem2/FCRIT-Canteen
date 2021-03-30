<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="/StudentAndStaff/img/fcritlogo.png">
    <title>FCRIT Canteen | CanteenStaff</title>
    <style>
      tyle>
      table {
        width: 100%;
        height: 700px;
      }
      a {
      color: #333;
      text-decoration: none;
      }
      table,
      th,
      td {
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
        background: #f7c08a;
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

// class TableRows extends RecursiveIteratorIterator {
//     function __construct($it) {
//         parent::__construct($it, self::LEAVES_ONLY);
//     }

//     function current() {
//         return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
//     }

//     function beginChildren() {
//         echo "<tr>";
//     }

//     function endChildren() {
//         echo "</tr>" . "\n";
//     }
// }

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "canteendb";
    $conn = mysqli_connect("localhost", "root", "", "canteendb");
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $stmt = $conn->prepare("SELECT userid, username,  Foodname, FoodId,Quantity ,Price FROM currorderlist");
    // $stmt->execute();

    // // set the resulting array to associative
    // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    // foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
    //     echo $v;
    // //     echo '<td style="width auto">
    // //     <button class="button button1">delivered</button>
    // //     <button class="button button2">refund</button>
    // //     <button class="button button3">cancel</button>
    // //   </td>';
    // }
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
              <td><button class="button button2" ><a href="delete.php?userid='.$userid.'&foodid='.$foodid.'">dilivered</a></button></td>
            </tr>';
    }
echo "</table>";
?> 
<br />
  </body>
</html>