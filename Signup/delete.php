<?php
$conn = mysqli_connect("localhost", "root", "", "canteendb");

$userid=$_GET['userid'];
$foodid=$_GET['foodid'];
$query="DELETE FROM currorderlist WHERE userid='$userid' AND foodId='$foodid'";
$delete = mysqli_query($conn,$query);
date_default_timezone_get();
$date = date('m/d/Y h:i:s a', time());
$query2="UPDATE orderlist SET Order_Status = 'dilivered' AND diliverdate = $date WHERE userid='$userid' AND foodId='$foodid'";
if($delete){
    header("location: canteen.php");
}else{
    echo "error occered";
}

?>