<?php
session_start();
include("functions/functions.php");
$page = "home";
$title = "Homepage";
$metaD = "Stickers Center Homepage";
include("header.php");
?>


<!--left sidebar starts here-->
<section>
    <div class="container">
        <div class="row">
            <?php
            include("left_menu.php");
            ?>

            <div class="col-sm-9 padding-right">
                <div id="products_box">
                    <?php
                    if (isset($_GET['pro_id'])) {

                        $product_id = $_GET['pro_id'];

                        $get_pro = "select * from products where product_id='$product_id'";

                        $run_pro = mysqli_query($con, $get_pro);

                        while ($row_pro = mysqli_fetch_array($run_pro)) {

                            $pro_id = $row_pro['product_id'];
                            $pro_title = $row_pro['product_title'];
                            $pro_price = $row_pro['product_price'];
                            $pro_image = $row_pro['product_image'];
                            $pro_desc = $row_pro['product_desc'];

                            echo "
				<div id='single_product'>
				
					<h3>$pro_title</h3>
					
					<img src='admin_area/product_images/$pro_image' width='400' height='300' />
					
					<p><b> $ $pro_price </b></p>
					
					<p>$pro_desc </p>
					
					<a href='index.php' style='float:left;'>Go Back</a>
					
					<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button></a>
				
				</div>
		
		";

                        }
                    }
                    ?>

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




