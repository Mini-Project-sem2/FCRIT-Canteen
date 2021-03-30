<?php
$conn = mysqli_connect("localhost", "root", "", "canteendb");

$userid=$_GET['userid'];
$foodid=$_GET['foodid'];
$query="DELETE FROM currorderlist WHERE userid='$userid' AND foodId='$foodid'";
$delete = mysqli_query($conn,$query);

if($delete){
    header("location: canteen.php");
}else{
    echo "error occered";
}

?>