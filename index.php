<?php
session_start();
include("functions/functions.php");
$page = "home";
$title = "Home | Stickers-Center";
$metaD = "Stickers Center Homepage";
include("header.php");
?>

<section id="slider">
    <!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>Stickers</span> Center</h1>
                                <h2>Wall Stickers & Wallpapers</h2>
                                <p>Design your house as you wish with our wide range of products.</p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>

                            <div class="col-sm-6">
                                <img src="images/home/themes/bedroom-wall-design-for-mint-green3.jpg" class="girl img-responsive" alt="" />
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>Stickers</span> Center</h1>
                                <h2>100% Quality Design</h2>
                                <p>Design your house as you wish with our wide range of products. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>

                            <div class="col-sm-6">
                                <img src="images/home/themes/livingroom-wall-design-classic-blue.jpg" class="girl img-responsive" alt="" />
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>Stickers</span> Center</h1>
                                <h2>100% Quality Design</h2>
                                <p>Design your house as you wish with our wide range of products. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>

                            <div class="col-sm-6">
                                <img src="images/home/themes/children-sailboat-wallpaper-bedroom-boys-room-blue.jpg" class="girl img-responsive" alt="" />
                            </div>
                        </div>
                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <?php
            include("left_menu.php");
            ?>

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Featured Items</h2>
                    <?php getProducts(); ?>
                    <?php getCategoryProducts(); ?>
                    <?php getThemeProducts(); ?>
                </div>

                <div class="category-tab">
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#kids" data-toggle="tab">Kids</a></li>
                            <li><a href="#livingroom" data-toggle="tab">Living-room</a></li>
                            <li><a href="#bedroom" data-toggle="tab">Bedroom</a></li>
                            <li><a href="#home" data-toggle="tab">Home</a></li>
                        </ul>
                    </div>

                    <div class="tab-content">
                        <?php getProductsTabs(); ?>
                    </div>
                </div>

                <?php
                include("recommended_items.php");
                ?>
            </div>
        </div>
    </div>
</section>

<?php
include("footer.php");
?>
