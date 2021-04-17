<?php
$conn = mysqli_connect("localhost", "root", "", "canteendb");

$userid=$_GET['userid'];
$foodid=$_GET['foodid'];
$query="DELETE FROM currorderlist WHERE userid='$userid' AND foodId='$foodid'";
$delete = mysqli_query($conn,$query);
date_default_timezone_set('Asia/Kolkata');
$date = date('m/d/Y h:i:s a', time());
$query2="UPDATE `orderlist` SET `Order_Status` = 'dilivered' WHERE `orderlist`.`userid` = $userid AND `orderlist`.`foodId` = $foodid ";
$query3="UPDATE `orderlist` SET diliverdate = '$date' WHERE `orderlist`.`userid` = $userid AND `orderlist`.`foodId` = $foodid ";
$query2_run = mysqli_query($conn,$query2);
$query3_run = mysqli_query($conn,$query3);
if($delete && $query2_run ){
    header("location: canteen.php");
}else{
    echo "error occoured";
}

?>