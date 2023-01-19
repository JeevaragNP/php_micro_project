<?php
	include "dbconnec.php";
	if(isset($_POST["subm"]))
	{
		$n = $_POST["name"];
		$m = $_POST["mail"];
        $ph = $_POST["phno"];
		$u = $_POST["unam"];
        $p = $_POST["pass1"];
        $p2 = $_POST["pass2"];
    if ($p == $p2) {
        // Encrypting Password
        $encryptedPassword = password_hash($p, PASSWORD_DEFAULT);

        // Inserting to Database
        $i = $_FILES["img"]["name"];
        $i_tmp_name = $_FILES['img']['tmp_name'];
        move_uploaded_file($_FILES["img"]['tmp_name'], "uploads/" . $_FILES["img"]['name']);
        $sql = "INSERT INTO `signup`(`fname`, `umail`, `phone`, `uname`, `pass`, `pic`) VALUES ('$n','$m','$ph','$u','$encryptedPassword','$i')";
        $res = mysqli_query($con, $sql);
        header("location:login.php");
        /*if($res==1)
        {
        echo "insertion success";
        
        }
        else
        echo "insertion not successfull";
        header("location:signup.php");
        }*/
        }       
        else
        {
        $error = 1; 
        }
	}
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="./css/style.css" rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Sign up your account</h4>
                                    <form action="#" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                            <label><strong>Fullname</strong></label>
                                            <input type="text" class="form-control" placeholder="Name" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Email</strong></label>
                                            <input type="email" class="form-control" placeholder="hello@example.com" name="mail" id="mal">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Phone No</strong></label>
                                            <input type="text" class="form-control" placeholder="Phonenumber" name="phno" id="pno">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Username</strong></label>
                                            <input type="text" class="form-control" placeholder="username" name="unam" id="unm">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input type="password" class="form-control" placeholder="password" name="pass1" id="pas1">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Confirm Password</strong></label>
                                            <input type="password" class="form-control" placeholder="confirm password" name="pass2" id="pas2">
                                            <?php 
                                                if(isset($error)){?>
                                                    <div class="alert alert-danger" style="margin-top:8px;">passwords do not match</div><?php
                                                }
                                            ?>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Profile pic</strong></label>
                                            <input type="file" class="form-control" name="img" id="imag">
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block" name="subm" id="sub">Sign me up</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Already have an account? <a class="text-primary" href="login.php">Sign in</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    
    <!--endRemoveIf(production)-->
</body>

</html>