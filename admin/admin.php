<?php
    include "../db/db.php";
    include "session.php";
if(isset($_GET['del'])){
    $id=$_GET['del'];
    $sql="delete from admin where id=".$id."";
    $query=mysqli_query($con,$sql);
    if($query){
        header("location:admin.php");
    }else{
        echo "<h1 style='text-align:center; color:red'>Delete wrong</h1>";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>admin panel</title>
</head>
<body>
<?php include "admin_heading.php" ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
         <div class="col-md-9">
        <form action="action.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="name">
            <label for="login">Login:</label>
            <input type="text" name="login" id="login" class="form-control" placeholder="login">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="password"><br>
            <input type="submit" name="create_admin" class="form-control btn btn-primary" value="create admin">
        </form>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>N#</th>
            <th>Admin name</th>
            <th>Admin Login</th>
            <th>Del</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql="select * from admin";
        $query=mysqli_query($con,$sql);
        $num=1;
        while ($row=mysqli_fetch_array($query)){
            ?>
            <tr>
                <td><?php echo $num++ ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['login'] ?></td>
                <td><?php echo "<a href='admin.php?del=".$row['id']."'>Del</a>" ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
        </div>
    </div>
</div>

</body>
</html>