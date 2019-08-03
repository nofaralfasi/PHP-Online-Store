<div id="content_area">
            <?php cart(); ?>
            <div id="shopping_cart">
                <div>
                    <?php
                    if (isset($_SESSION['customer_email'])) {
                        echo "<b>Welcome:</b>" . $_SESSION['customer_email'] . "<b style='color:yellow;'>Your</b>";
                    } else {
                        echo "<b>Welcome Guest:</b>";
                    }
                    ?>

                    <b style="color:yellow">Shopping Cart -</b> Total Items: <?php total_items(); ?> Total Price: <?php total_price(); ?> <a href="index.php" style="color:yellow">Back to Shop</a>

                    <?php
                    if (!isset($_SESSION['customer_email'])) {
                        echo "<a href='checkout.php' style='color:orange;'>Login</a>";
                    } else {
                        echo "<a href='logout.php' style='color:orange;'>Logout</a>";
                    }
                    ?>
                </div>
            </div>