<?php 
session_start();
if(!isset($_SESSION['user_email'])){
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else {
    $page = "admin";
    $title = "Admin | Add-Product";
    $metaD = "Stickers Center Admin Homepage";
    include("admin_header.php");
?>



		<div id="left">
		<h2><?php echo @$_GET['logged_in']; ?></h2>

		<?php 
		if(isset($_GET['insert_product'])){
		include("insert_product.php");
		}

		if(isset($_GET['view_products'])){
		include("view_products.php");
		}

		if(isset($_GET['edit_pro'])){
		include("edit_pro.php");
		}

		if(isset($_GET['insert_cat'])){
		include("insert_category.php");
		}
		
		if(isset($_GET['view_cats'])){
		include("view_cats.php");
		}
		
		if(isset($_GET['edit_cat'])){
		include("edit_category.php");
		}
		
		if(isset($_GET['insert_theme'])){
		include("insert_theme.php");
		}
		
		if(isset($_GET['view_themes'])){
		include("view_themes.php");
		}

		if(isset($_GET['edit_theme'])){
		include("edit_theme.php");
		}

		if(isset($_GET['view_customers'])){
		include("view_customers.php");
		}
		?>
		</div>






	</div>


</body>
</html>

<?php } ?>