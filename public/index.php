<?php
    include "public_heading.php";

?>

<section class="categories_banner_area">
    <div class="container">
        <div class="c_banner_inner">
            <h3>Xaridingiz uchun rahmat</h3>
            <ul>
                <li><a href="index.php">Bosh saxifa -> </a></li>
            </ul>
        </div>
    </div>
</section>
<!--================End Categories Banner Area =================-->

<!--================Categories Product Area =================-->
<?php
$sql="select * from product";
$result=mysqli_query($con,$sql);
$count=mysqli_num_rows($result);
$number_of_result=mysqli_num_rows($result);
$number_of_page=ceil($number_of_result/9);
if(!isset($_GET['page'])){
    $page=1;
}else{
    $page=$_GET['page'];
}
$this_page_first_result=($page-1)*9;

?>
<section class="categories_product_main p_80">
    <div class="container">
        <div class="categories_main_inner">
            <div class="row row_disable">
                <div class="col-lg-9 float-md-right">
                    <div class="showing_fillter">
                        <div class="row m0">
                            <div class="first_fillter">
                                <h4>
                                    Show <?php echo ($page-1)*9+1 ?>
                                    to <?php
                                            if($page*9>$count){
                                                echo $count;
                                            }else{
                                                echo ($page)*9;
                                            }
                                        ?>
                                    of <?php echo $count ?>
                                    product
                                </h4>
                            </div>
                            <div class="secand_fillter">
                                <h4>Saralash :</h4>
                                <select class="selectpicker sort_product" >
                                    <option value="all">Hammasi</option>
                                    <option value="name">Nomi</option>
                                    <option value="price">Narxi</option>
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
                    <div class="categories_product_area">
                        <div class="row">
                            <?php
                                $sql="select * from product limit ".$this_page_first_result.",9";
                                $result=mysqli_query($con,$sql);
                                while ($row=mysqli_fetch_array($result)){
                                        ?>
                            <div class="col-lg-4 col-sm-6">
                                <div class="l_product_item">
                                    <div class="l_p_img">
                                        <img src="../image/product/<?php echo $row['image'] ?>" alt="">
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
                                            <li class="p_icon product_view" id="<?php echo $row['id'] ?>">
                                                <i class="icon_piechart"></i>
                                            </li>
                                            <li>
                                                <!--<a class="add_cart_btn" href="#">Add To Cart</a>-->
                                                <input type="hidden" name="hidden_name" id="name<?php echo $row['id'] ?>" value="<?php echo $row['name'] ?>">
                                                <input type="hidden" name="hidden_price" id="price<?php echo $row['id']?>" value="<?php echo $row['price'] ?>">
                                                <input type="hidden" name="hidden_image" id="image<?php echo $row['id'] ?>" value="<?php echo $row['image'] ?>">
                                                <input type="button" class="add_cart_btn" value="add to cart" id="<?php echo $row['id'] ?>">
                                            </li>
                                            <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                        </ul>
                                        <h4><?php echo $row['name'] ?></h4>
                                        <h5><del></del>$ <?php echo $row['price'] ?></h5>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <nav aria-label="Page navigation example" class="pagination_area">
                          <ul class="pagination">
                              <?php
                              for ($page=1; $page <= $number_of_page; $page++){
                                  echo "<li class='page-item'><a class='page-link' style='border: 1px solid' href='index.php?page=".$page."'>" .$page. "</a></li>";
                              }
                              ?>
                          </ul>
                        </nav>
                    </div>
                </div>
                <?php include "public_category.php" ?>
            </div>
        </div>
    </div>
</section>
<!--================End Categories Product Area =================-->

<!--================Footer Area =================-->
<?php include "public_footer.php" ?>
<!--================End Footer Area =================-->

<script>
    $(document).on("click",".add_cart_btn",function (){
        var product_id=$(this).attr("id");
        var product_name=$("#name"+product_id).val();
        var product_price=$("#price"+product_id).val();
        var product_image=$("#image"+product_id).val();
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
    $(document).on("change","select.sort_product",function (){
        var a = $(this).children("option:selected").val();

    })
    $(document).on("click",".product_view",function (){
        var view_id=$(this).attr("id");
        $.ajax({
           url:"ajax.php",
           method:"POST",
           data:
               {
                   view_id:view_id,
               },
            dataType:"json",
            success:function(data){
               alert(data);
            }
        });
    })
</script>
