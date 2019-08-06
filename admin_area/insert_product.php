<?php
$page = "insert_product";
$title = "Admin | Add-Product";
$metaD = "Stickers Center Admin add-product page";
include("includes/db.php");
?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">New Product</h2>

                    <form action="insert_product.php" method="post" enctype="multipart/form-data">
                        <table class="admin_dashboard">
                            <tr>
                                <td>Product Title:</td>
                                <td><label>
                                        <input type="text" name="product_title" size="60%" required/>
                                    </label></td>
                            </tr>

                            <tr>
                                <td>Product Category:</td>
                                <td>
                                    <label>
                                        <select name="product_cat">
                                            <option>Select a Category</option>
                                            <?php
                                            $get_cats = "select * from categories";
                                            $run_cats = mysqli_query($con, $get_cats);
                                            while ($row_cats = mysqli_fetch_array($run_cats)) {
                                                $cat_id = $row_cats['cat_id'];
                                                $cat_title = $row_cats['cat_title'];
                                                echo "<option value='$cat_id'>$cat_title</option>";
                                            }
                                            ?>
                                        </select>
                                    </label>
                                </td>
                            </tr>

                            <tr>
                                <td>Product Theme:</td>
                                <td>
                                    <label>
                                        <select name="product_theme">
                                            <option>Select a Theme</option>
                                            <?php
                                            $get_themes = "select * from themes";
                                            $run_themes = mysqli_query($con, $get_themes);
                                            while ($row_themes = mysqli_fetch_array($run_themes)) {
                                                $theme_id = $row_themes['theme_id'];
                                                $theme_title = $row_themes['theme_title'];
                                                echo "<option value='$theme_id'>$theme_title</option>";
                                            }
                                            ?>
                                        </select>
                                    </label>
                                </td>
                            </tr>

                            <tr>
                                <td>Product Image:</td>
                                <td><input type="file" name="product_image[]" multiple>
                                </td>
                            </tr>

                            <tr>
                                <td>Product Price:</td>
                                <td><label>
                                        <input type="text" name="product_price" required/>
                                    </label></td>
                            </tr>

                            <tr>
                                <td>Product Description:</td>
                                <td><label>
                                        <textarea name="product_desc" cols="20" rows="10"></textarea>
                                    </label></td>
                            </tr>

                            <tr>
                                <td>Product Keywords:</td>
                                <td><label>
                                        <input type="text" name="product_keywords" size="60%" required/>
                                    </label></td>
                            </tr>

                            <tr>
                                <td colspan="17"><input type="submit" name="insert_post" value=" Send "/></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
if (isset($_FILES['product_image'])) {
    $images_array = $_FILES['product_image']['name'];
    $tmp_images_array = $_FILES['product_image']['tmp_name'];
    $len = count($tmp_images_array);
    echo $len;
    echo "<br>";
    for ($i = 0; $i < $len; $i++) {
        if (move_uploaded_file($tmp_images_array[$i], "product_images/" . $images_array[$i])) {
            echo $images_array[$i] . " upload is complete<br>";
        } else {
            echo "move_uploaded_file function failed for " . $images_array[$i] . "<br>";
        }
    }
}
if (isset($_POST['insert_post'])) {
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $product_theme = $_POST['product_theme'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_keywords = $_POST['product_keywords'];
    /** @noinspection PhpUndefinedVariableInspection */
    $pro_image = json_encode($images_array);

    $insert_product = "insert into products(product_cat,product_theme,product_title,product_price,product_desc,product_image,product_keywords) 
    values('$product_cat','$product_theme','$product_title','$product_price','$product_desc','$pro_image','$product_keywords')";

    $insert_pro = mysqli_query($con, $insert_product);

    if ($insert_pro) {
        echo "<script>alert('Product Has been inserted!')</script>";
        echo "<script>window.open('index.php?insert_product','_self')</script>";
    }
}
?>



