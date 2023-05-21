<?php
if (isset($_GET['Maintenance_id'])) {
include("database.php");
$id = $_GET['Maintenance_id'];
$sql = "DELETE FROM maintenance_request WHERE Maintenance_id='$id'";
if(mysqli_query($conn,$sql)){
    session_start();
    $_SESSION["delete"] = "request Deleted Successfully!";
    header("Location:adminpage.php");
}else{
    die("Something went wrong");
}
}else{
    echo "request does not exist";
}
?>