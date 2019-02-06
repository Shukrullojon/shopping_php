<?php
include "../db/db.php";
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Security</title>
</head>
<body>
<?php include "public_heading.php" ?>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-8">
        <h3 style="color: #00A0D1">Persuit maxfiylik siyosati</h3>
        <?php
        $sql="select * from security";
        $query=mysqli_query($con,$sql);
        while($row=mysqli_fetch_array($query)){
            ?>
            <br>
            <p style="font-size: 18px"><?php echo $row['security'] ?></p>
            <br>
        <?php } ?>
    </div>
    <div class="col-md-2"></div>
</div>
<?php include "public_footer.php" ?>

</body>
</html>
