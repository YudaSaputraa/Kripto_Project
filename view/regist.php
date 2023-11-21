<?php
error_reporting(0);
include "../connection/connection.php";

$error      = "";
$username   = "";

if (isset($_POST['regist'])) {
    $username   = $_POST['username'];
    $password   = $_POST['password'];

    if ($username == '' or $password == '') {
        $error .= "<li>Silakan masukkan username dan juga password.</li>";
    } else {
        if (empty($error)) {
            $hash = hash('md5', $password);
            $query = "INSERT INTO admin(id, username, password) VALUES ('','$username','$hash')";
            $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
            header("location:../index.php");
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
    <title>Regist</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>

<body style=" background-color: #eeeeee;">

    <div class="container my-4" style="max-width : 925px;">
        <div id="registbox" style="margin-top:150px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel" style="box-shadow: 6px 8px 19px -10px rgba(0,0,0,1); -webkit-box-shadow: 6px 8px 19px -10px rgba(0,0,0,1); -moz-box-shadow: 6px 8px 19px -10px rgba(0,0,0,1);" id="headregist">
                <div class="panel-heading">
                    <div class="panel-title text-center" style="font-size:x-large"><b>REGISTER</b></div>
                </div>
                <div style="padding-top:30px" class="panel-body">
                    <?php if ($error) { ?>
                        <div id="regist-alert" class="alert alert-danger col-sm-12">
                            <ul><?php echo $error ?></ul>
                        </div>
                    <?php } ?>
                    <form id="registform" class="form-horizontal" action="" method="POST" role="form">
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="regist-username" type="text" class="form-control" name="username" placeholder="username">
                        </div>
                        <div style="margin-bottom: 10px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="regist-password" type="password" class="form-control" name="password" placeholder="password">
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <input type="checkbox" onclick="myFunction()"> Show Password
                        </div>

                        <div>
                            Already have an account?
                            <a href="../index.php">Sign In</a>
                        </div>

                        <div style="margin-top:35px" class="form-group text-center">
                            <div class="col-sm-12 controls">
                                <input type="submit" name="regist" class="btn btn-success" value="Register" />
                                <input type="reset" name="reset" class="btn btn-danger" value="Reset" />
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
</body>
<script>
    function myFunction() {
        var x = document.getElementById("regist-password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

</html>