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
      .pic1 {
        text-align: center;
        height: 60px;
        padding: 15px;
      }
      #pic {
        text-align: center;
      }
      .pic2 {
        padding-bottom: 450px;
      }
      .button {
        border: none;
        color: white;
        padding: 18px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
      }

      .button1 {
        background-color: #4caf50;
        position: relative;
        left: -100px;
      }
      .button2 {
        background-color: #008cba;
      }
      .button3 {
        background-color: #ba003e;
        position: relative;
        left: 100px;
      }

      tr:nth-child(even) {
        background-color: #f2f2f2;
      }
    </style>
  </head>   
<body>

<table>
      <tr style="height: 100px">
        <th colspan="9">CANTEEN-STAFF&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button  class="button button3"><a href="logout.php">LOGOUT</a></button></th>
      </tr>
      <tr class="pic1">
      <td style="width: 80px">Sr.No</td>
      <td style="width: 300px">Name</td>
      <td style="width: 300px">Food Item</td>
      <td style="width: 80px">Quantity</td>
      <td style="width: 80px">Price</td>
      <td style="width: 300px">Order</td>
      <td style="width: auto"></td>
<?php

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "canteendb";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT userid, username,  Foodname, FoodId,Quantity ,Price FROM currorderlist");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    //     echo '<td style="width auto">
    //     <button class="button button1">delivered</button>
    //     <button class="button button2">refund</button>
    //     <button class="button button3">cancel</button>
    //   </td>';
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?> 
<br />
  </body>
</html>