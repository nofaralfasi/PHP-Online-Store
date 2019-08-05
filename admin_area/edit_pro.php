<!DOCTYPE>
<?php
include("includes/db.php");
if (isset($_GET['edit_pro'])) {
    $get_id = $_GET['edit_pro'];
    $get_pro = "select * from products where product_id='$get_id'";
    $run_pro = mysqli_query($con, $get_pro);
    $i = 0;
    $row_pro = mysqli_fetch_array($run_pro);
    $pro_id = $row_pro['product_id'];
    $pro_title = $row_pro['product_title'];
    $pro_image = $row_pro['product_image'];
//    $pro_image = json_decode($row_pro['product_image'], true);
    $pro_price = $row_pro['product_price'];
    $pro_desc = $row_pro['product_desc'];
    $pro_keywords = $row_pro['product_keywords'];
    $pro_cat = $row_pro['product_cat'];
    $pro_theme = $row_pro['product_theme'];
    $get_cat = "select * from categories where cat_id='$pro_cat'";
    $run_cat = mysqli_query($con, $get_cat);
    $row_cat = mysqli_fetch_array($run_cat);
    $category_title = $row_cat['cat_title'];
    $get_theme = "select * from themes where theme_id='$pro_theme'";
    $run_theme = mysqli_query($con, $get_theme);
    $row_theme = mysqli_fetch_array($run_theme);
    $theme_title = $row_theme['theme_title'];
}
?>
<html>
<head>
    <title>Update Product</title>
    <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script>
        tinymce.init({selector: 'textarea'});
    </script>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <table align="center" width="795" border="2">
        <tr align="center">
            <td colspan="7"><h2>Edit & Update Product</h2></td>
        </tr>

        <tr>
            <td align="right"><b>Product Title:</b></td>
            <td><input type="text" name="product_title" size="60" value="<?php echo $pro_title; ?>"/></td>
        </tr>

        <tr>
            <td align="right"><b>Product Category:</b></td>
            <td>
                <select name="product_cat">
                    <option><?php echo $category_title; ?></option>
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
            </td>
        </tr>

        <tr>
            <td align="right"><b>Product theme:</b></td>
            <td>
                <select name="product_theme">
                    <option><?php echo $theme_title; ?></option>
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
            </td>
        </tr>

        <tr>
            <td align="right"><b>Product Image:</b></td>
            <td><input type="file" name="product_image[]" multiple/><img src="product_images/<?php echo $pro_image; ?>" width="60" height="60"/></td>
            <br><br>
            <input type="submit" name="submit" value="Upload" >
        </tr>

        <tr>
            <td align="right"><b>Product Price:</b></td>
            <td><input type="text" name="product_price" value="<?php echo $pro_price; ?>"/></td>
        </tr>

        <tr>
            <td align="right"><b>Product Description:</b></td>
            <td><textarea name="product_desc" cols="20" rows="10"><?php echo $pro_desc; ?></textarea></td>
        </tr>

        <tr>
            <td align="right"><b>Product Keywords:</b></td>
            <td><input type="text" name="product_keywords" size="50" value="<?php echo $pro_keywords; ?>"/></td>
        </tr>

        <tr align="center">
            <td colspan="7"><input type="submit" name="update_product" value="Update Product"/></td>
        </tr>
    </table>
</form>
</body>
</html>

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
if (isset($_POST['update_product'])) {
    $update_id = $pro_id;
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $product_theme = $_POST['product_theme'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_keywords = $_POST['product_keywords'];
    $pro_image = json_encode($images_array);

    $update_product = "update products set product_cat='$product_cat',product_theme='$product_theme',product_title='$product_title',product_price='$product_price',product_desc='$product_desc',product_image='$pro_image', product_keywords='$product_keywords' where product_id='$update_id'";
    $run_product = mysqli_query($con, $update_product);

    if ($run_product) {
        echo "<script>alert('Product has been updated!')</script>";
        echo "<script>window.open('index.php?view_products','_self')</script>";
    }
}
?>















