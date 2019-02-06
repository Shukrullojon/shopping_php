<?php
include "session.php";
include "../db/db.php";
if(isset($_GET['del'])){
    $id=$_GET['del'];
    $sql="select image from product";
    $query=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($query);
    $directory_delete="../image/product/".$row['image']."";
    $unlock=unlink($directory_delete);
    if($unlock){
        $sql="delete from product where id=".$id."";
        $query=mysqli_query($con,$sql);
        if($query){
            header("location:product.php");
        }else{
            echo "<h1 style='text-align:center; color:red'>Delete wrong</h1>";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Product</title>
</head>
<body>
<div id="wrapper">
    <?php include "admin_heading.php" ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                   Featured  Product
                </h1>
            </div>
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <form action="action.php" method="POST" enctype="multipart/form-data">
                        <div class="panel-heading">
                            <h4 style="text-align: center">Add Featured product</h4>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="product_name">Product Name: </label>
                                    <input type="text" name="product_name" id="product_name" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="product_price">Product price</label>
                                    <input type="text" name="product_price" id="product_price" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="product_image">Image</label>
                                    <input type="file" name="product_image" id="product_image" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <label for="product_description">Description</label>
                                    <textarea name="product_description" id="product_description" class="form-control" rows="5" cols="60">
						                </textarea>
                                </div>
                                <div class="col-lg-4">
                                    <label for="product_status">Status</label>
                                    <select name="product_status" class="form-control" id="product_status">
                                        <option value="1">Active</option>
                                        <option value="0">InActive</option>
                                    </select>
                                    <label for="product_action">Holati</label>
                                    <select name="product_action" class="form-control" id="product_action">
                                        <option value="1">New</option>
                                        <option value="0">No new</option>
                                    </select>
                                    <label for="product_category">Category</label>
                                    <select name="product_category" class="form-control" id="product_category">
                                        <?php
                                        $sql="select * from category";
                                        $query=mysqli_query($con,$sql);
                                        while ($row=mysqli_fetch_array($query)){
                                            ?>
                                            <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <input type="submit" class="form-control btn btn-success" value="create product" name="create_featured_product">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-12">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>N#</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>image</th>
                        <th>status</th>
                        <th>Action</th>
                        <th>category</th>
                        <th>D_U</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql="select * from featur_product";
                    $query=mysqli_query($con,$sql);
                    $num=1;
                    while ($row=mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td><?php echo $num++ ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['price']?></td>
                            <td>
                                <img src="../image/featured_product/<?php echo $row['image'] ?>"  class="img-responsive img-rounded" style="width:80px;height:50px;">
                            </td>
                            <td>
                                <?php
                                if($row['status']){
                                    echo "active";
                                } else{
                                    echo "inactive";
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if($row['action']){
                                    echo "new";
                                }else{
                                    echo "no new";
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                $id_cat=$row['category_id'];
                                $sqls="select name from category where id='".$id_cat."'";
                                $querys=mysqli_query($con,$sqls);
                                $rows=mysqli_fetch_array($querys);
                                echo $rows['name'];
                                ?>
                            </td>
                            <td>
                                <?php echo "<a href='product.php?del=".$row['id']."'>Del</a>" ?>
                            </td>
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
