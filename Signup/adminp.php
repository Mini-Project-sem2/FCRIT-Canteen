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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="canteenadminpanel.css">
    <style>
        table, th, td {
            border: 2px solid black;
            border-collapse: collapse;
            
        }
        #container {
            font-size: 40px;
        }
    
        th {
            padding: 40px;
        }
        td {
            padding: 195px;
           
        }
        @media screen and (max-width: 1100px) {
    .button3 {
        position: relative;
        left: 65%;
    }
}
@media screen and (max-width: 900px) {
    .button3 {
        position: relative;
        left: 55%;
    }
}
@media screen and (max-width: 700px) {
    .button3 {
        position: relative;
        left: 45%;
    }
}
@media screen and (max-width: 600px) {
    .button3 {
        position: relative;
        left: 25%;
    }
}
@media screen and (max-width: 1000px) {
    .button1 {
        padding: 80px 35px;
        background-color: #4CAF50;
        position: relative;
        left: 0%;
        
    }
}@media screen and (max-width: 950px) {
    .button1 {
        padding: 80px 35px;
        background-color: #4CAF50;
        position: relative;
        left: -20%;
    }
}
@media screen and (max-width: 875px) {
    .button1 {
        padding: 80px 35px;
        background-color: #4CAF50;
        position: relative;
        left: 20%;
    }
}
@media screen and (max-width: 700px) {
    .button1 {
        padding: 80px 35px;
        background-color: #4CAF50;
        position: relative;
        left: -4%;
    }
}

@media screen and (max-width: 950px) {
    .button2 {
        padding: 80px 30px;
        background-color:  #4CAF50;
        position: relative;
        left: 10%;
    }
}
@media screen and (max-width: 875px) {
    .button2 {
        padding: 80px 30px;
        background-color: #4CAF50;
        position: relative;
        left:19.5%;
    }
}
@media screen and (max-width: 700px) {
    .button2 {
        padding: 80px 30px;
        background-color: #4CAF50;
        position: relative;
        left:-4%;
    }
}

        
        
    </style>
</head>
<body>
    <table style="width:100%">
        <tr>
            <th id="container" style="text-align: left;">ADMIN<button  class="button button3"><a href="logout.php">LOGOUT</a></button></th>
        </tr>
        <tr>
            <td  >
                <button style=" font-size: 20px;" class="button button1" href="updatemenu.php" >UPDATE MENU</button>
                <button style=" font-size: 20px;" class="button button2">E-Wallet Recharge</button>
            </td>
        </tr>
    </table>
</body>
</html>