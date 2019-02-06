<?php
    include "session.php";
    include "../db/db.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Bosh saxifa</title>
</head>
<body>
<div id="wrapper">
    <?php include "admin_heading.php" ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">

                </h1>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-align-center fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                            <?php
                                                $sql="select id from product";
                                                $result=mysqli_query($con,$sql);
                                                echo mysqli_num_rows($result);
                                            ?>
                                        </div>
                                        <div>Product!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="product.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Product</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tree fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                            <?php
                                            $sql="select id from category";
                                            $result=mysqli_query($con,$sql);
                                            echo mysqli_num_rows($result);
                                            ?>
                                        </div>
                                        <div>Category!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="product.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Category</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user-md fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                            <?php
                                            $sql="select id from customer";
                                            $result=mysqli_query($con,$sql);
                                            echo mysqli_num_rows($result);
                                            ?>
                                        </div>
                                        <div>User!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="user.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View User</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>