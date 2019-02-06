<?php
include "session.php";
include "../db/db.php";
if(isset($_GET['del'])){
    $id=$_GET['del'];
    $sql="delete from category where id=".$id."";
    $query=mysqli_query($con,$sql);
    if($query){
        header("location:category.php");
    }else{
        echo "<h1 style='text-align:center; color:red'>Delete wrong</h1>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Category</title>
</head>
<body>
<div id="wrapper">
    <?php include "admin_heading.php" ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Category
                </h1>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <form action="action.php" method="POST">
                        <label for="category_name">Category name</label>
                        <input type="text" name="category_name" placeholder="name" class="form-control">
                        <br>
                        <input type="submit" name="category_submit" value="Category" class="form-control btn btn-primary">
                    </form>
                </div>
            </div>
            <div class="col-lg-12">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>N#</th>
                        <th>Category name</th>
                        <th>Del</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql="select * from category";
                    $query=mysqli_query($con,$sql);
                    $num=1;
                    while ($row=mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td><?php echo $num++ ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo "<a href='category.php?del=".$row['id']."'>Del</a>" ?></td>
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
