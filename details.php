<?php
session_start();
include("functions/functions.php");
$page = "product-details";
$title = "Product Details";
$metaD = "Stickers Center Product Details";
include("header.php");
?>

    <!--page starts here-->
    <section>
        <div class="container">
            <div class="row">
                <?php
                include("left_menu.php");
                ?>

                <div class="col-sm-9 padding-right">
                    <div class="product-details"><!--product-details-->
                        <div class="col-sm-5">
                            <div class="view-product">
                                <?php getProductImage("0"); ?>
                                <h3>ZOOM</h3>
                            </div>
                            <div id="similar-product" class="carousel slide" data-ride="carousel">
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <?php getProductImages("RAND()"); ?>
                                    </div>
                                    <div class="item">
                                        <?php getProductImages("RAND()"); ?>
                                    </div>
                                    <div class="item">
                                        <?php getProductImages("RAND()"); ?>
                                    </div>
                                </div>
                                <a class="left item-control" href="#similar-product" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                                <a class="right item-control" href="#similar-product" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </div>

                        <!--/product-information-->
                        <div class="col-sm-7">
                            <div class="product-information">
                                <img src="images/product-details/new.jpg" class="newarrival" alt=""/>
                                <?php getSelectedProduct(); ?>
                                <a href=""><img src="images/product-details/share.png" class="share img-responsive" alt=""/></a>
                            </div><!--/product-information-->
                        </div>
                    </div><!--/product-details-->

                </div> <!--class="col-sm-9 padding-right"-->

            </div> <!--class="row"-->
        </div> <!--class="container"-->
    </section>
    <!--page ends here-->


<?php
include("footer.php");
?>