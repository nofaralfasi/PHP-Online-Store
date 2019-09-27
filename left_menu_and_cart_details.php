<!--Main Container starts here-->
<div class="main_wrapper">

    <!--Content wrapper starts-->
    <div class="content_wrapper">
        <div id="sidebar">
            <div id="sidebar_title">Categories</div>
            <ul id="cats">
                <?php getCategories(); ?>
                <ul>
                    <div id="sidebar_title">Brands</div>
                    <ul id="cats">
                        <?php getRooms(); ?>
                        <ul>
        </div>

        <div id="content_area">
            <div id="shopping_cart">
                <span style="float:right; font-size:18px; padding:5px; line-height:40px;">
                    Welcome Guest! <b style="color:yellow">Shopping Cart -</b> Total Items: Total Price: <a href="cart.php" style="color:yellow">Go to Cart</a>
                </span>
            </div>
        </div>
    </div>
    <!--Content wrapper ends-->

</div>
<!--Main Container ends here-->
