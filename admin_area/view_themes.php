
<table width="795" align="center" bgcolor="pink"> 

	
	<tr align="center">
		<td colspan="6"><h2>View All Themes Here</h2></td>
	</tr>
	
	<tr align="center" bgcolor="skyblue">
		<th>Theme ID</th>
		<th>Theme Title</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php 
	include("includes/db.php");
	
	$get_theme = "select * from themes";
	
	$run_theme = mysqli_query($con, $get_theme);
	
	$i = 0;
	
	while ($row_theme=mysqli_fetch_array($run_theme)){
		
		$theme_id = $row_theme['theme_id'];
		$theme_title = $row_theme['theme_title'];
		$i++;
	
	?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td><?php echo $theme_title;?></td>
		<td><a href="index.php?edit_theme=<?php echo $theme_id; ?>">Edit</a></td>
		<td><a href="delete_theme.php?delete_theme=<?php echo $theme_id;?>">Delete</a></td>
	
	</tr>
	<?php } ?>




</table>