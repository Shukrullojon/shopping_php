<?php
include "../db/db.php";
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $pwd = sha1($password);
    $sql = "SELECT id FROM admin WHERE login = '$login' and password = '$pwd'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if($count == 1){
        // session_register("myusername");
        $_SESSION['login'] = $login;
        header("location:index.php");
    }else {
        $error = "Your Login Name or Password is invalid";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login and Password</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<body>
<?php
    include "public_heading.php";
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3>login and password</h3>
                </div>
                <form action="login.php" method="POST" class="form-group">
                    <div class="panel-body">
                        <label for="login">Login</label>
                        <input type="text" name="login" id="login" class="form-control" placeholder="login">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="password">
                    </div>
                    <div class="panel-footer">
                        <input type="submit" name="submit" value="Kirish" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>

<?php
    include "public_footer.php"
?>
</body>
</html>