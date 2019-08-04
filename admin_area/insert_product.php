<!DOCTYPE>
<?php
include("includes/db.php");
?>
<html>
<head>
    <title>Inserting Product</title>
    <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script>
        tinymce.init({selector: 'textarea'});
    </script>
</head>
<body>
<form action="insert_product.php" method="post" enctype="multipart/form-data">
    <table align="center" width="795" border="2">
        <tr align="center">
            <td colspan="7"><h2>Insert New Post Here</h2></td>
        </tr>

        <tr>
            <td align="right"><b>Product Title:</b></td>
            <td><input type="text" name="product_title" size="60" required/></td>
        </tr>

        <tr>
            <td align="right"><b>Product Category:</b></td>
            <td>
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
            </td>
        </tr>

        <tr>
            <td align="right"><b>Product Theme:</b></td>
            <td>
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
            </td>
        </tr>

        <tr>
            <td align="right"><b>Product Image:</b></td>
            <td><input type="file" name="product_image[]" multiple >
            </td>
        </tr>

        <tr>
            <td align="right"><b>Product Price:</b></td>
            <td><input type="text" name="product_price" required/></td>
        </tr>

        <tr>
            <td align="right"><b>Product Description:</b></td>
            <td><textarea name="product_desc" cols="20" rows="10"></textarea></td>
        </tr>

        <tr>
            <td align="right"><b>Product Keywords:</b></td>
            <td><input type="text" name="product_keywords" size="50" required/></td>
        </tr>

        <tr align="center">
            <td colspan="7"><input type="submit" name="insert_post" value="Insert Product Now"/></td>
        </tr>
    </table>
</form>
</body>
</html>

<?php
if (isset($_FILES['product_image'])) {
        $name_array = $_FILES['product_image']['name'];
        $tmp_name_array = $_FILES['product_image']['tmp_name'];
        $len = count($tmp_name_array);
        echo $len;
        echo "<br>";
        for ($i = 0; $i < $len; $i++) {
            if (move_uploaded_file($tmp_name_array[$i], "product_images/" . $name_array[$i])) {
                echo $name_array[$i] . " upload is complete<br>";
            } else {
                echo "move_uploaded_file function failed for " . $name_array[$i] . "<br>";
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
    $pro_image = json_encode($name_array);

    $insert_product = "insert into products(product_cat,product_theme,product_title,product_price,product_desc,product_image,product_keywords) 
    values('$product_cat','$product_theme','$product_title','$product_price','$product_desc','$pro_image','$product_keywords')";

    $insert_pro = mysqli_query($con, $insert_product);

    if ($insert_pro) {
        echo "<script>alert('Product Has been inserted!')</script>";
        echo "<script>window.open('index.php?insert_product','_self')</script>";
    }
}
?>



