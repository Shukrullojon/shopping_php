<?php
session_start();
include "../db/db.php";
$cart_output='';
if(isset($_POST['product_id'])){
    if($_POST['action']=="create"){
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        //echo $product_id." ".$product_name." ".$product_price;
        if(!empty($_SESSION['shopping_cart'])) {
            $is_available = 0;
            foreach ($_SESSION['shopping_cart'] as $key => $value) {
                if ($_SESSION['shopping_cart'][$key]['product_id'] == $product_id) {
                    $is_available++;
                    $_SESSION['shopping_cart'][$key]['product_quantity'] += 1;
                }
            }
            if ($is_available < 1) {
                $item_array = array(
                    'product_id' => $product_id,
                    'product_name' => $product_name,
                    'product_price' => $product_price,
                    'product_image' => $product_image,
                    'product_quantity' => 1,
                );
                $_SESSION['shopping_cart'][] = $item_array;
            }
        } else {
            $item_array = array(
                array
                (
                    'product_id' => $product_id,
                    'product_name' => $product_name,
                    'product_price' => $product_price,
                    'product_image' => $product_image,
                    'product_quantity' => 1,
                ),
            );
            $_SESSION['shopping_cart'] = $item_array;
        }// end else
    }
    if($_POST['action']=="delete"){
        $product_id = $_POST['product_id'];
        foreach($_SESSION['shopping_cart'] as $key => $value)
        {
            if($_SESSION['shopping_cart'][$key]['product_id']==$product_id){
                unset($_SESSION['shopping_cart'][$key]);
            }
        }
    }
    if($_POST['action']=="quantity_change"){
        foreach ($_SESSION['shopping_cart'] as $key => $value) {
            if($_SESSION['shopping_cart'][$key]['product_id']==$_POST['product_id']){
                $_SESSION['shopping_cart'][$key]['product_quantity']=$_POST['quantity'];
            }
        }
    }

    $cart_output .= '
        <section class="result shopping_cart_area p_100" style="padding-top: 15px"> 
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart_items">
                            <h3>Sizning xaridingiz</h3>
                            <div class="table-responsive-md">
                                <table class="table">
                                    <tbody>
    ';
    $total=0;
    foreach ($_SESSION['shopping_cart'] as $key=>$value){
        $cart_output .= '
            <tr>
                <th scope="row">
                    <img src="img/icon/close-icon.png" alt="" class="remove" id="'.$value['product_id'].'">
                </th>
                <td>
                    <div class="media">
                        <div class="d-flex">
                            <img src="../image/product/'.$value['product_image'].'" alt="" style="width: 80px; height: 80px;">
                        </div>
                        <div class="media-body">
                            <h4>'.$value['product_name'].'</h4>
                        </div>
                    </div>
                </td>
                <td><p class="red">$ '.$value['product_price'].'</p></td>
                <td>
                    <div class="quantity">
                        <h6>Quantity</h6>
                        <div class="custom">
                            <input type="number" product_id="'.$value['product_id'].'" id="quantity'.$value[id] .'" value="'.$value['product_quantity'].'" min="1" class="quantity form-control btn">
                        </div>
                    </div>
                </td>
                <td><p>
                        '.number_format($value['product_price']*$value['product_quantity'],2).'
                    </p></td>
            </tr>
        ';
        $total += $value['product_price']*$value['product_quantity'];
    }
    $cart_output .= '
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
            $  '.number_format($total,2).' 
        </div>
    </div>
    </div>
    <button type="submit" value="submit" class="btn subs_btn form-control">Sotib olish</button>
    </div>
    </div>
    </div>
    </section>
    ';

    $cart_item = count($_SESSION['shopping_cart']);
    $output=array(
        'cart_item'=>$cart_item,
        'cart_output'=>$cart_output,
    );
    echo json_encode($output);
}
if(isset($_POST['view_id'])){
    $product_id=$_POST['view_id'];
    $sql="select * from product where id=".$product_id."";
    $query=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($query);
    $output = '';
    $output .='
        <div class="panel panel-primary">
            <div class="panel-heading">
            '.$row['name'].'
            </div>
            <div class="panel-body"></div>
        </div>
    ';
    echo json_encode($output);
}
