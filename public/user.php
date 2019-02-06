<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<body>

<?php include "public_heading.php" ?>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <form action="action.php" method="POST">
            <div class="row">
                    <div class="col-md-4">
                        <label>Ism:</label>
                        <input type="text" name="first_name" class="form-control" placeholder="ism">
                    </div>
                    <div class="col-md-4">
                        <label>Familya:</label>
                        <input type="text" name="last_name" class="form-control" placeholder="Familya">
                    </div>
                    <div class="col-md-4">
                        <label>Email:</label>
                        <input type="text" name="email" class="form-control" placeholder="email">
                    </div>
                </div>
                <div class="row">
                <div class="col-md-4">
                    <label>Tel:</label>
                    <input type="text" name="phone" class="form-control" value="+998">
                </div>
                <div class="col-md-8">
                    <label>Address:</label>
                    <input type="text" name="address" class="form-control" placeholder="address">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>Login:</label>
                    <input type="text" name="login" class="form-control" placeholder="login">
                </div>
                <div class="col-md-4">
                    <label>Password:</label>
                    <input type="text" name="password" class="form-control" placeholder="password">
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <input type="submit" name="user_create" class="form-control btn btn-success" value="create user">
                </div>
                <div class="col-md-4"></div>
            </div>
        </form>
    </div>
    <div class="col-md-2"></div>
</div>
<br>
<?php include "public_footer.php" ?>
</body>
</html>