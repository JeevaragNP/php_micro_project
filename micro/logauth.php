<?php
    session_start();
    include "dbconnec.php";

    if(isset($_POST['logsub'])){

    $email = $_POST['mail'];
    $pass = $_POST['password'];

    $sql = "SELECT `umail`, `pass` FROM `signup` WHERE `umail`='$email' AND `pass`='$pass'";
    $res = mysqli_query($con,$sql);
    
    if(mysqli_num_rows($res) > 0){
            $_SESSION['auth'] = true;
            $usdata = mysqli_fetch_array($res);
            $usname = $usdata['fname'];
            $usmail = $usdata['umail'];
            $_SESSION['auth_user'] =  [
                'fname' => $usname,
                'umail' => $uspass
            ];
            $_SESSION["message"] = "Logged in successfully";
            header("location:index.php");
        }
        else
        {
            $_SESSION['message'] = "Invalid Credentials";
            header("location:login.php");
        }
    }
?>