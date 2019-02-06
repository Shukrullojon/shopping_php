<?php
include "public_heading.php";
session_start();
?>

<section class="categories_banner_area">
    <div class="container">
        <div class="c_banner_inner">
            <h3>shop grid with left sidebar</h3>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Shop</a></li>
                <li class="current"><a href="#">Shop Grid with Left Sidebar</a></li>
            </ul>
        </div>
    </div>
</section>
<!--================End Categories Banner Area =================-->
<section class="no_sidebar_2column_area">
    <div class="container">
        <div class="showing_fillter">
            <div class="row m0">
                <div class="first_fillter">
                    <h4>Showing 1 to 12 of 30 total</h4>
                </div>
                <div class="secand_fillter">
                    <h4>SORT BY :</h4>
                    <select class="selectpicker">
                        <option>Name</option>
                        <option>Name 2</option>
                        <option>Name 3</option>
                    </select>
                </div>
                <div class="third_fillter">
                    <h4>Show : </h4>
                    <select class="selectpicker">
                        <option>09</option>
                        <option>10</option>
                        <option>10</option>
                    </select>
                </div>
                <div class="four_fillter">
                    <h4>View</h4>
                    <a class="active" href="#"><i class="icon_grid-2x2"></i></a>
                    <a href="#"><i class="icon_grid-3x3"></i></a>
                </div>
            </div>
        </div>
        <div class="two_column_product">
            <div class="row">
                <?php
                    if(isset($_GET['category'])){
                        $id=$_GET['category'];
                        $sql="select * from product where category_id=".$id."";
                        $query=mysqli_query($con,$sql);
                        while($row=mysqli_fetch_array($query)){
                ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="l_product_item">
                        <div class="l_p_img">
                            <img class="img-fluid" src="../image/product/<?php echo $row['image'] ?>" alt="">
                            <h5 class="new">
                                <?php
                                    if($row['action']){
                                        echo "new";
                                    }
                                ?>
                            </h5>
                        </div>
                        <div class="l_p_text">
                            <ul>
                                <input type="hidden" name="hidden_name" id="name<?php echo $row['id'] ?>" value="<?php echo $row['name'] ?>">
                                <input type="hidden" name="hidden_price" id="price<?php echo $row['id']?>" value="<?php echo $row['price'] ?>">
                                <input type="hidden" name="hidden_image" id="image<?php echo $row['id'] ?>" value="<?php echo $row['image'] ?>">
                                <input type="button" class="add_cart_btn" value="add to cart" id="<?php echo $row['id'] ?>">
                            </ul>
                            <h4><?php echo $row['name'] ?></h4>
                            <h5> $ <?php echo $row['price'] ?></h5>
                        </div>
                    </div>
                </div>
                <?php } } ?>
            </div>
            <nav aria-label="Page navigation example" class="pagination_area">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                    <li class="page-item next"><a class="page-link" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                </ul>
            </nav>
        </div>
    </div>
</section>



<?php include "public_footer.php" ?>
<!--================End Footer Area =================-->
<script>
    $(document).on("click",".add_cart_btn",function (){
        var product_id=$(this).attr("id");
        var product_name=$("#name"+product_id).val();
        var product_image=$("#image"+product_id).val();
        var product_price=$("#price"+product_id).val();
        var action="create";
        $.ajax({
            url:"ajax.php",
            method:"POST",
            data:
                {
                    product_id:product_id,
                    product_name:product_name,
                    product_price:product_price,
                    product_image:product_image,
                    action:action,
                },
            dataType:"json",
            success:function(data)
            {
                $(".badge").text(data.cart_item);
            }
        });
    })
</script>