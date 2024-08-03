<?php
include('dbconnection.php');

$user_name =  $_POST['adminid'];
$pass =  $_POST['adminpwd']; 


//Check username
// $r = $conn->query("SELECT * FROM adminLogin WHERE userName = '$user_name'");

$resultlog = mysqli_query($conn,"SELECT * from adminLogin") or die(mysqli_error($conn));
$row = mysqli_fetch_array($resultlog);

if ($row[1] != $user_name){

    if($row[2] != $pass) {
        include('admindashboard.php');
    } else{
        echo '<script>alert("Incorrect Password.");</script>'; 
        include('adminlogin.php');
    }

} else {
    echo '<script>alert("Usernme does not exist.");</script>'; 
    include('adminlogin.php');
}

?>

