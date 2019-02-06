<?php
include "../db/db.php";
include "session.php";
if(isset($_GET['del'])){
    $id=$_GET['del'];
    $sql="delete from customer where id=".$id."";
    $query=mysqli_query($con,$sql);
    if($query){
        header("location:user.php");
    }else{
        echo "<h1 style='text-align:center; color:red'>Delete wrong</h1>";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>User</title>
</head>
<body>
<div id="wrapper">
    <?php include "admin_heading.php" ?>
    <div id="page-wrapper">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>N#</th>
                <th>Ismi</th>
                <th>Familyasi</th>
                <th>email</th>
                <th>Tel</th>
                <th>Address</th>
                <th>Login</th>
                <th>D_U</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql="select * from customer";
            $query=mysqli_query($con,$sql);
            $num=1;
            while ($row=mysqli_fetch_array($query)){
                ?>
                <tr>
                    <td><?php echo $num++ ?></td>
                    <td><?php echo $row['first_name'] ?></td>
                    <td><?php echo $row['last_name']?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['phone']?></td>
                    <td><?php echo $row['address']?></td>
                    <td><?php echo $row['login']?></td>
                    <td><?php echo "<a href='user.php?del=".$row['id']."'>Del</a>" ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
