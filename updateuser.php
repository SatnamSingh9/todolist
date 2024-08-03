
<?php
    include('dbconnection.php');

    $userid = $_POST['selecteduser'];
    $action = $_POST['user-action'];

     
    // $r = $conn->query($sql = ("select status from logins where username='".$userid."'"));
    $resultlog = mysqli_query($conn,"select * from logins where username='".$userid."'") or die(mysqli_error($conn));
    $row = mysqli_fetch_array($resultlog);
    

    if ($row[0] == $userid){
        $statusfield = strtolower(trim($row[2]));

        if ($action == 'Activate'){
            switch ($statusfield){
                case "pending":
                    mysqli_query($conn,"UPDATE logins set status = 'Active' where username='".$userid."'");
                    echo '<script>alert("User is now activated")</script>';
                    include('admindashboard.php');
                    break;
                
                case "active":
                    echo '<script>alert("User is already activated!");</script>';
                    include('admindashboard.php');
                    break;
                default :
                    echo '<script>alert("Invalid value in status field!");</script>';
            }
        } elseif ($action == 'Terminate'){
            switch ($statusfield){
                case "active":
                    mysqli_query($conn,"UPDATE logins set status = 'Pending' where username='".$userid."'");
                    echo '<script>alert("User is now Terminated")</script>';
                    include('admindashboard.php');
                    break;
                
                case "pending":
                    echo '<script>alert("User is already Terminated!");</script>';
                    include('admindashboard.php');
                    break;

                default :
                    echo '<script>alert("Invalid value in status field!");</script>';
            }
        } elseif ($action == 'Delete'){
            
            if(isset($row[1])){
                mysqli_query($conn,"DELETE FROM logins where username = '$userid'");
                echo '<script>alert("User is deleted Now!");</script>';
                include('admindashboard.php');
            } else {
                echo '<script>alert("Invalid user name entered!");</script>';
                include('admindashboard.php');
            }

        } else {
            echo '<script>alert("Invalid selection!");</script>';
            include('admindashboard.php');
        }

    } else {

        echo '<script>alert("Invalid user name entered!");</script>';
        include('admindashboard.php');
        
    }

    ?>