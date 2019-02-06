<?php
include "../db/db.php";
session_start();
//print_r($_SESSION['shopping_cart']);
if (empty($_SESSION['shopping_cart'])){
    header("location:index.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
</head>
<body>
    <?php include "public_heading.php" ?>
    <section class="solid_banner_area">
        <div class="container">
            <div class="solid_banner_inner">
                <h3>Xarid savatchasi</h3>
                <ul>
                    <li><a href="index.php">Bosh saxifa -</a></li>
                    <li><a href="cart,php">Cart</a></li>
                </ul>
            </div>
        </div>
    </section>

    <section class="result shopping_cart_area p_100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="cart_items">
                        <h3>Sizning xaridingiz</h3>
                        <div class="table-responsive-md">
                            <table class="table">
                                <tbody>
                                <?php
                                $total=0;
                                foreach ($_SESSION['shopping_cart'] as $key=>$value){
                                ?>
                                <tr>
                                    <th scope="row">
                                        <img src="img/icon/close-icon.png" alt="" class="remove" id="<?php echo $value['product_id'] ?>">
                                    </th>
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <img src="../image/product/<?php echo $value['product_image'] ?>" alt="" style="width: 80px; height: 80px;">
                                            </div>
                                            <div class="media-body">
                                                <h4><?php echo $value['product_name'] ?></h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td><p class="red">$ <?php echo $value['product_price'] ?></p></td>
                                    <td>
                                        <div class="quantity">
                                            <h6>Quantity</h6>
                                            <div class="custom">
                                                <input type="text" product_id="<?php echo $value['product_id']?>" id="quantity<?php echo $value['id'] ?>" value="<?php echo $value['product_quantity'] ?>" class="quantity form-control btn">
                                            </div>
                                        </div>
                                    </td>
                                    <td><p>
                                            <?php
                                                echo number_format($value['product_price']*$value['product_quantity']);
                                                $total += number_format($value['product_price']*$value['product_quantity']);
                                            ?>
                                        </p></td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <th scope="row">
                                    </th>
                                </tr>
                                <tr class="last">
                                    <th scope="row">
                                        <img src="img/icon/cart-icon.png" alt="">
                                    </th>
                                    <td>

                                    </td>
                                    <td><p class="red"></p></td>
                                    <td>
                                    </td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart_totals_area">
                        <h4>Umumiy xarid</h4>
                        <div class="cart_t_list">
                            <div class="media">
                                <div class="d-flex">
                                    <h5>Chegirma</h5>
                                </div>
                                <div class="media-body">
                                    <h6>$14</h6>
                                </div>
                            </div>
                            <div class="media">
                                <div class="d-flex">
                                    <h5>Eltib berish</h5>
                                </div>
                                <div class="media-body">
                                    <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model tex</p>
                                </div>
                            </div>
                        </div>
                        <div class="total_amount row m0 row_disable">
                            <div class="float-left">
                                Umumiy summa
                            </div>
                            <div class="float-right">
                                $ <?php echo $total ?>
                            </div>
                        </div>
                    </div>
                    <button type="submit" value="submit" class="btn subs_btn form-control"><a href="login.php">Sotib olish</a></button>
                </div>
            </div>
        </div>
    </section>

    <?php include "public_footer.php" ?>
    <script>
        $(document).on("click",".remove",function () {
            var product_id = $(this).attr("id");
            var action="delete";
            $.ajax({
                url: "ajax.php",
                method:"POST",
                data:
                    {
                        product_id:product_id,
                        action:action,

                    },
                dataType:"json",
                success:function(data)
                {
                     $(".result").html(data.cart_output);
                }
            });
        });
        $(document).on("keyup",".quantity",function (){
            var product_id=$(this).attr("product_id");
            var quantity=$(this).val();
            var action="quantity_change";
            if(quantity != ''){
                $.ajax({
                    url:"ajax.php",
                    method:"POST",
                    dataType:"json",
                    data:
                        {
                            product_id:product_id,
                            quantity:quantity,
                            action:action
                        },
                    success:function(data){
                        $(".result").html(data.cart_output);
                    }
                });
            }
        })
    </script>
</body>
</html>