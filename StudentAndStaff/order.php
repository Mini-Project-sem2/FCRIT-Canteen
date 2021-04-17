<?php
$conn = mysqli_connect("localhost", "root", "", "canteendb");



if (isset($_POST['submit'])) {
    if (empty($_POST['quantity'])) {
        $error = "quatity need to be input";
    } else {
        $foodid = $_GET['fid'];
        $username = $_GET['un'];
        date_default_timezone_get();
        $date = date('m/d/Y h:i:s a', time());
        $quantity = $_POST['quantity'];
        $conn = mysqli_connect("localhost", "root", "", "canteendb");
        $gprice = "SELECT * FROM MENU WHERE Fid= '$foodid'";
        $qprice = mysqli_query($conn, $gprice);
        if (!$qprice) {
            printf("Error: %s\n", mysqli_error($conn));
            exit();
        }
        while ($row = mysqli_fetch_array($qprice)) {
            $fname = $row['Fname'];
            $price = $row['Price'];
            $bill = $price * $quantity;
            $gbal = "SELECT * FROM COSTUMERS WHERE username='$username'";
            $gbal_run = mysqli_query($conn, $gbal);
            if (!$qbal_run) {
                printf("Error: %s\n", mysqli_error($conn));
                exit();
            }
            while ($row = mysqli_fetch_array($gbal_run)) {
                $userid = $row['id'];
                $balance = $row['Balance'];
                if ($balance >= $bill) {
                    $query1 = "INSERT INTO orderlist values($userid,'$username','$fname',$foodid,$quantity,$bill,'Ordered','$date',NULL)";
                    $query2 = "INSERT INTO currorderlist values($userid,'$username','$fname',$foodid,$quantity,$bill)";
                    $query3 = "UPDATE costumers SET Balance = Balance - $bill WHERE id=$userid ";
                    $query1_run =  mysqli_query($conn, $query1);
                    if (!$query1_run) {
                        printf("Error: %s\n", mysqli_error($conn));
                        exit();
                    }
                    $query2_run =  mysqli_query($conn, $query2);
                    if (!$query2_run) {
                        printf("Error: %s\n", mysqli_error($conn));
                        exit();
                    }
                    $query3_run =  mysqli_query($conn, $query3);
                    if (!$query3_run) {
                        printf("Error: %s\n", mysqli_error($conn));
                        exit();
                    }
                } else {
                    echo "<Script>alert('Insufficient balance')</script>";
                }
                header("location:  Menu.php");
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
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
            margin: auto;
            max-width: max-content;
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
            color: #49c1a2
        }
    </style>
</head>

<body>
    <div id="container">
        <div class="form-wrap">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <h1>Conform Order</h1>
                <div class="form-group">
                    <label for="quantity" id="quantity">Quantity</label>
                    <input type="numeric" name="quantity" id="quantity" />
                </div>
                <button type="submit" class="btn" name="submit">conform order</button>
            </form>
        </div>
    </div>
</body>

</html>
<!-- INSERT INTO orderlist values(1019128,'Farhan','pav bhaji',102,1,156,'Ordered',NULL,NULL) -->