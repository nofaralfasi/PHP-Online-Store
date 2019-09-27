<?php
// After uploading to online server, change this connection accordingly
$con = mysqli_connect("localhost", "root", "", "ecommerce");
if (mysqli_connect_errno()) {
    echo "The Connection was not established: " . mysqli_connect_error();
}

// getting the user IP address
function getIp()
{
    $ip = $_SERVER['REMOTE_ADDR'];
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    return $ip;
}

//creating the shopping cart
function cart()
{
    if (isset($_GET['add_cart'])) {
        global $con;
        $ip = getIp();
        $pro_id = $_GET['add_cart'];
        $check_pro = "select * from cart where ip_add='$ip' AND p_id='$pro_id'";
        $run_check = mysqli_query($con, $check_pro);
        if (mysqli_num_rows($run_check) > 0) {
            echo "";
        } else {
            $insert_pro = "insert into cart (p_id,ip_add) values ('$pro_id','$ip')";
            $run_pro = mysqli_query($con, $insert_pro);
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}

// getting the total added items
function total_items()
{
    if (isset($_GET['add_cart'])) {
        global $con;
        $ip = getIp();
        $get_items = "select * from cart where ip_add='$ip'";
        $run_items = mysqli_query($con, $get_items);
        $count_items = mysqli_num_rows($run_items);
    } else {
        global $con;
        $ip = getIp();
        $get_items = "select * from cart where ip_add='$ip'";
        $run_items = mysqli_query($con, $get_items);
        $count_items = mysqli_num_rows($run_items);
    }
    echo $count_items;
}

// Getting the total price of the items in the cart
function total_price()
{
    $total = 0;
    global $con;
    $ip = getIp();
    $sel_price = "select * from cart where ip_add='$ip'";
    $run_price = mysqli_query($con, $sel_price);
    while ($p_price = mysqli_fetch_array($run_price)) {
        $pro_id = $p_price['p_id'];
        $pro_price = "select * from products where product_id='$pro_id'";
        $run_pro_price = mysqli_query($con, $pro_price);
        while ($pp_price = mysqli_fetch_array($run_pro_price)) {
            $product_price = array($pp_price['product_price']);
            $values = array_sum($product_price);
            $total += $values;
        }
    }
    echo "$" . $total;
}

function getCategories()
{
    global $con;
    $get_cats = "select * from categories";
    $run_cats = mysqli_query($con, $get_cats);
    while ($row_cats = mysqli_fetch_array($run_cats)) {
        $cat_id = $row_cats['cat_id'];
        $cat_title = $row_cats['cat_title'];
        echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
    }
}

function getThemes()
{
    global $con;
    $get_themes = "select * from themes";
    $run_themes = mysqli_query($con, $get_themes);
    while ($row_themes = mysqli_fetch_array($run_themes)) {
        $theme_id = $row_themes['theme_id'];
        $theme_title = $row_themes['theme_title'];
        echo "<li><a href='index.php?theme=$theme_id'>$theme_title</a></li>";
    }
}

function getTitles()
{
    global $con;
    $get_titles = "select * from titles";
    $run_titles = mysqli_query($con, $get_titles);
    while ($row_titles = mysqli_fetch_array($run_titles)) {
        $title_id = $row_titles['title_id'];
        $title_title = $row_titles['title_title'];
        echo "<li><a href='index.php?title=$title_id'>$title_title</a></li>";
    }
}

function getProducts()
{
    if (!isset($_GET['cat'])) {
        if (!isset($_GET['theme'])) {
            global $con;
            $get_pro = "select * from products order by RAND() LIMIT 0,9";
            $run_pro = mysqli_query($con, $get_pro);
            while ($row_pro = mysqli_fetch_array($run_pro)) {
                $pro_id = $row_pro['product_id'];
                $pro_cat = $row_pro['product_cat'];
                $pro_theme = $row_pro['product_theme'];
                $pro_title = $row_pro['product_title'];
                $pro_price = $row_pro['product_price'];
                $pro_image = json_decode($row_pro['product_image'], true);
                echo "
				<div class='col-sm-4'>
					<div class='product-image-wrapper'>
						<div class='single-products'>
							<div class='productinfo text-center'>
								<img src='admin_area/product_images/$pro_image[1]' class='size200x300' alt='' />
								<h2 style='font-size: medium'>$pro_title</h2>
								<p>$ $pro_price</p>
								<a href='index.php?add_cart=$pro_id' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add
								to cart</a>
							</div>
						</div>
					<div class='choose'>
					<ul class='nav nav-pills nav-justified'>
						<li><a href='#'><i class='fa fa-plus-square'></i>Add to wishlist</a></li>
						<li><a href='details.php?pro_id=$pro_id'><i class='fa fa-plus-square'></i>View Details</a></li>
					</ul>
					</div>	
				</div>
			</div>
		";
            }
        }
    }
}

function getSelectedProduct()
{
    if (isset($_GET['pro_id'])) {
        global $con;
        $product_id = $_GET['pro_id'];
        $get_pro = "select * from products where product_id='$product_id'";
        $run_pro = mysqli_query($con, $get_pro);
        while ($row_pro = mysqli_fetch_array($run_pro)) {
            $pro_id = $row_pro['product_id'];
            $pro_title = $row_pro['product_title'];
            $pro_price = $row_pro['product_price'];
            $pro_desc = $row_pro['product_desc'];
            echo "<h2>$pro_title</h2>
            <br><p>sku:  $pro_id</p>
            <br><p>$pro_desc</p>
            <span>
                <span>$ $pro_price</span>
                <br><label>Quantity: </label>
                <input type='text' value='1'/>
                <br><br>
                <button type=\"button\" class=\"btn btn-fefault cart\">
                <i href='index.php?add_cart=$pro_id' class=\"fa fa-shopping-cart\"></i>Add to cart
                </button>
            </span>
            ";
        }
    }
}

function getProductsTabs()
{
    if (!isset($_GET['cat'])) {
        if (!isset($_GET['theme'])) {
            global $con;
            $get_pro = "select * from products order by RAND() LIMIT 0,4";
            $run_pro = mysqli_query($con, $get_pro);
            while ($row_pro = mysqli_fetch_array($run_pro)) {
                $pro_id = $row_pro['product_id'];
                $pro_cat = $row_pro['product_cat'];
                $pro_theme = $row_pro['product_theme'];
                $pro_title = $row_pro['product_title'];
                $pro_price = $row_pro['product_price'];
                $pro_image = $row_pro['product_image'];
                $pro_image = json_decode($row_pro['product_image'], true);

                echo "
                  <div class='tab-pane fade active in' id='$pro_theme'>
            <div class='col-sm-3'>
                <div class='product-image-wrapper'>
                    <div class='single-products'>
                        <div class='productinfo text-center'>
								<img src='admin_area/product_images/$pro_image[0]' class='size150' alt='' />
								<h2 style='font-size: medium'>$pro_title</h2>
								<p>$ $pro_price</p>
								<a href='index.php?add_cart=$pro_id' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>                
        </div> <!-- end-kids -->           
        ";
            }
        }
    }
}

function getRecommendedProducts()
{
    if (!isset($_GET['cat'])) {
        if (!isset($_GET['theme'])) {
            global $con;
            $get_pro = "select * from products order by RAND() LIMIT 0,3";
            $run_pro = mysqli_query($con, $get_pro);
            while ($row_pro = mysqli_fetch_array($run_pro)) {
                $pro_id = $row_pro['product_id'];
                $pro_cat = $row_pro['product_cat'];
                $pro_theme = $row_pro['product_theme'];
                $pro_title = $row_pro['product_title'];
                $pro_price = $row_pro['product_price'];
                $pro_image = json_decode($row_pro['product_image'], true);

                echo "
				<div class='col-sm-4'>
					<div class='product-image-wrapper'>
						<div class='single-products'>
							<div class='productinfo text-center'>
								<img src='admin_area/product_images/$pro_image[0]' class='size200' alt='' />
								<h2 style='color: #3D0859; font-size: medium;'>$pro_title</h2>
								<p>$ $pro_price</p>
								<a href='index.php?add_cart=$pro_id' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to cart</a>
							</div>
						</div>
				</div>
			</div>
		";
            }
        }
    }
}


function getCategoryProducts()
{
    if (isset($_GET['cat'])) {
        $cat_id = $_GET['cat'];
        global $con;
        $get_cat_pro = "select * from products where product_cat='$cat_id'";
        $run_cat_pro = mysqli_query($con, $get_cat_pro);
        $count_cats = mysqli_num_rows($run_cat_pro);
        if ($count_cats == 0) {
            echo "<h2 style='padding:20px;'>No products where found in this category.</h2>";
        }
        while ($row_cat_pro = mysqli_fetch_array($run_cat_pro)) {
            $pro_id = $row_cat_pro['product_id'];
            $pro_cat = $row_cat_pro['product_cat'];
            $pro_theme = $row_cat_pro['product_theme'];
            $pro_title = $row_cat_pro['product_title'];
            $pro_price = $row_cat_pro['product_price'];
            $pro_image = json_decode($row_cat_pro['product_image'], true);

            echo "
				<div id='single_product'>				
					<h3>$pro_title</h3>					
					<img src='admin_area/product_images/$pro_image[0]' class='size200'  alt=''/>
					<p>$ $pro_price</p>
					<a href='details.php?pro_id=$pro_id'>Details</a>					
					<a href='index.php?pro_id=$pro_id'><button>Add to Cart</button></a>				
				</div>		
		";
        }
    }
}


function getThemeProducts()
{
    if (isset($_GET['theme'])) {
        $theme_id = $_GET['theme'];
        global $con;
        $get_theme_pro = "select * from products where product_theme='$theme_id'";
        $run_theme_pro = mysqli_query($con, $get_theme_pro);
        $count_themes = mysqli_num_rows($run_theme_pro);
        if ($count_themes == 0) {
            echo "<h2 style='padding:20px;'>No products were found associated with this theme.</h2>";
        }
        while ($row_theme_pro = mysqli_fetch_array($run_theme_pro)) {
            $pro_id = $row_theme_pro['product_id'];
            $pro_cat = $row_theme_pro['product_cat'];
            $pro_theme = $row_theme_pro['product_theme'];
            $pro_title = $row_theme_pro['product_title'];
            $pro_price = $row_theme_pro['product_price'];
            $pro_image = json_decode($row_theme_pro['product_image'], true);

            echo "
				<div id='single_product'>
					<h2>$pro_title</h2>					
					<img src='admin_area/product_images/$pro_image[0]' class='size200' />					
					<p> $ $pro_price </p>					
					<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
					<a href='index.php?pro_id=$pro_id'><button>Add to Cart</button></a>		
				</div>	
		";
        }
    }
}

function getProductImages($order)
{
    if (!isset($_GET['cat'])) {
        if (!isset($_GET['theme'])) {
            $pro_id = $_GET['pro_id'];
            global $con;
            $get_pro = "select * from products where product_id='$pro_id' order by $order;";
            $run_pro = mysqli_query($con, $get_pro);
            while ($row_pro = mysqli_fetch_array($run_pro)) {
                $pro_image = json_decode($row_pro['product_image'], true);
                $len = count($pro_image);
                for ($i = 0; $i < 3; $i++) {
                    echo "
       			<a href=''><img src='admin_area/product_images/$pro_image[$i]' class='size50' alt='' ></a>
		        ";
                }
            }
        }
    }
}

function getProductImage($img)
{
    $pro_id = $_GET['pro_id'];
    global $con;
    $get_pro = "select * from products where product_id='$pro_id'";
    $run_pro = mysqli_query($con, $get_pro);
    $count = mysqli_num_rows($run_pro);
    if ($count == 0) {
        echo "<h2 style='padding:20px;'>No products were found.</h2>";
    }
    while ($row_pro = mysqli_fetch_array($run_pro)) {
        $pro_image = json_decode($row_pro['product_image'], true);

        echo "            
            <img src='admin_area/product_images/$pro_image[$img]' alt='' >
		";
    }
}
