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
    <!--    <link rel="stylesheet" href="styles/style_admin.css"/>-->
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
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +972 526205429</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> my.stickers.center@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="https://www.facebook.com/madbekot.comp/"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="https://twitter.com/stickers_center?lang=he"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="https://www.instagram.com/stickers_center_israel/"><i
                                            class="fa fa-instagram"></i></a></li>
                            <li><a href="https://plus.google.com/101066463055015880710"><i
                                            class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->
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

