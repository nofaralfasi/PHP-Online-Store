
<form action="" method="post" style="padding:80px;">

<b>Insert New Bran:</b>
<input type="text" name="new_theme" required/> 
<input type="submit" name="add_theme" value="Add Theme" /> 

</form>

<?php 
include("includes/db.php"); 

	if(isset($_POST['add_theme'])){
	
	$new_theme = $_POST['new_theme'];
	
	$insert_theme = "insert into themes (theme_title) values ('$new_theme')";

	$run_theme = mysqli_query($con, $insert_theme); 
	
	if($run_theme){
	
	echo "<script>alert('New Theme has been inserted!')</script>";
	echo "<script>window.open('index.php?view_themes','_self')</script>";
	}
	}

?>