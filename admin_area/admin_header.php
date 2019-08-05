<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="
    <?php
    if (isset($metaD) && !empty($metaD)) {
        echo $metaD;
    } else {
        echo "Stickers-Center Admin.";
    }
    ?>">
    <meta name="author" content="Stickers Center">
    <title>
        <?php
        if (isset($title) && !empty($title)) {
            echo $title;
        } else {
            echo "Stickers-Center Admin";
        } ?>
    </title>

    <!--suppress SpellCheckingInspection, SpellCheckingInspection -->
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        tinymce.init({selector: 'textarea'});
    </script>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/prettyPhoto.css" rel="stylesheet">
    <link href="../css/price-range.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/style_admin.css"/>
    <!--[if lt IE 9]>
    <script src="../js/html5shiv.js"></script>
    <script src="../js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="../images/ico/favicon.ico">
    <!--    DO NOT DELETE THESE 4 LINES    -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../images/ico/apple-touch-icon-57-precomposed.png">
    <script type="text/javascript" href="index.js"></script>
</head>

<body>


<header id="header"><!--header-->
    <div class="header-middle"><!--header-middle-->
        <div class="container">

            <div class="row">
                <div class="col-md-4 clearfix">

                    <div class="logo pull-left">
                        <a href="index.php"><img src="images/logo.jpg" alt=""/></a>
                    </div>

                    <div class="btn-group pull-left clearfix">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                IL
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="">IL</a></li>
                                <li><a href="">UK</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div><!--/row-->
        </div><!--/container-->
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="index.php" class="active">Home</a></li>
<!--                            <li class="dropdown"><a href="#">Buyers manage<i class="fa fa-angle-down"></i></a>-->
<!--                                <ul role="menu" class="sub-menu">-->
<!--                                    <li><a href="view_orders.php">Orders</a></li>-->
<!--                                    <li><a href="view_payments.php">Payments</a></li>-->
<!--                                    <li><a href="view_customers.php">Customers</a></li>-->
<!--                                </ul>-->
<!--                            </li>-->
                            <li class="dropdown"><a href="view_orders.php">Orders<i></i></a>
                            </li>
                            <li><a href="view_payments.php">Payments</a></li>
                            <li><a href="view_customers.php">Customers</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->

<div class="brands_products">
    <div id="right" class="right-sidebar">
        <h2>Store Management </h2>
        <a href="index.php?insert_product" class="left-sidebar"> Add Product</a>
        <a href="index.php?view_products" class="left-sidebar"> Products</a>
        <a href="index.php?insert_cat" class="left-sidebar"> Add Category</a>
        <a href="index.php?view_cats" class="left-sidebar"> Categories</a>
        <a href="index.php?insert_theme" class="left-sidebar"> Add Theme</a>
        <a href="index.php?view_themes" class="left-sidebar"> Themes</a>
        <a href="index.php?view_customers" class="left-sidebar"> Customers</a>
        <a href="index.php?view_orders" class="left-sidebar"> Orders</a>
        <a href="index.php?view_payments" class="left-sidebar"> Payments</a>
        <a href="logout.php" class="left-sidebar"> Admin Logout</a>
    </div>
