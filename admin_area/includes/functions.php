<?php
if (!isset($_SESSION['user_email'])) {

    echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
} else {
    ?>
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li class="active">Store's Products</li>
                </ol>
            </div>

            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Image</td>
                        <td class="description">Title</td>
                        <td class="sn">S.N</td>
                        <td class="price">Price</td>
                        <td class="edit">Edit</td>
                        <td class="delete">Delete</td>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    include("includes/db.php");
                    $get_pro = "select * from products";
                    $run_pro = mysqli_query($con, $get_pro);
                    $i = 0;
                    while ($row_pro = mysqli_fetch_array($run_pro)) {
                        $pro_id = $row_pro['product_id'];
                        $pro_title = $row_pro['product_title'];
                        $pro_image = json_decode($row_pro['product_image'], true);
                        //        var_dump($pro_image);
                        $pro_price = $row_pro['product_price'];
                        $i++;
                        ?>
                        <tr>

                            <td class="product">
                                <a href=""><img class="size50" src="product_images/<?php echo $pro_image[0]; ?>" alt=""></a>
                            </td>

                            <td class="description">
                                <p> <?php echo $pro_title; ?> </p>
                            </td>

                            <td class="sn">
                                <p> <?php echo $i; ?> </p>
                            </td>

                            <td class="cart_price">
                                <p><?php echo $pro_price; ?></p>
                            </td>

                            <td class="edit">
                                <a class="description" href="index.php?edit_pro=<?php echo $pro_id; ?>">Edit</a>
                            </td>

                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="delete_product.php?delete_pro=<?php echo $pro_id; ?>"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->
<?php } ?>