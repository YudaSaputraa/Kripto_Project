<?php
session_start();
error_reporting(0);
include "connection/connection.php";

$error      = "";
$username   = "";

if (isset($_POST['login'])) {
    $username   = $_POST['username'];
    $password   = $_POST['password'];

    if ($username == '' or $password == '') {
        $error .= "<li>Silakan masukkan username dan juga password.</li>";
    } else {
        $sql1 = "SELECT * FROM admin WHERE username = '$username'";
        $hash = hash('md5', $password);
        $q1   = mysqli_query($connect, $sql1);
        $r1   = mysqli_fetch_array($q1);

        if ($r1['username'] == '') {
            $error .= "<li>Username <b>$username</b> tidak tersedia.</li>";
        } else if ($r1['password'] != $hash) {
            $error .= "<li>Password yang dimasukkan tidak sesuai.</li>";
        }

        if (empty($error)) {
            $_SESSION['session_id'] = $id;
            $_SESSION['session_passwod'] = $password;
            $_SESSION['session_username'] = $username;
            header("location:view/home.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>

<body style=" background-color: #eeeeee;">

    <div class="container my-4" style="max-width : 925px;">
        <div id="loginbox" style="margin-top:150px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel" style="box-shadow: 6px 8px 19px -10px rgba(0,0,0,1); -webkit-box-shadow: 6px 8px 19px -10px rgba(0,0,0,1); -moz-box-shadow: 6px 8px 19px -10px rgba(0,0,0,1);" id="headlogin">
                <div class="panel-heading">
                    <div class="panel-title text-center" style="font-size:x-large"><b>LOGIN</b></div>
                </div>
                <div style="padding-top:30px" class="panel-body">
                    <?php if ($error) { ?>
                        <div id="login-alert" class="alert alert-danger col-sm-12">
                            <ul><?php echo $error ?></ul>
                        </div>
                    <?php } ?>
                    <form id="loginform" class="form-horizontal" action="" method="POST" role="form">
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="username" type="text" class="form-control" name="username" placeholder="username">
                        </div>
                        <div style="margin-bottom: 10px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="password" type="password" class="form-control" name="password" placeholder="password">

                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <input type="checkbox" onclick="myFunction()"> Show Password
                        </div>

                        <div>
                            Don't have any account?
                            <a href="view/regist.php">Sign Up</a>
                        </div>

                        <div style="margin-top:35px" class="form-group text-center">
                            <div class="col-sm-12 controls">
                                <input type="submit" name="login" class="btn btn-success" value="Login" />
                                <input type="reset" name="reset" class="btn btn-danger" value="Reset" />
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
</body>
<script src="js/showPassword.js">

</script>

</html>