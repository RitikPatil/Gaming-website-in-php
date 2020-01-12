<?php
	session_start();
	require "config.php";

?>
<!DOCTYPE html>
<html>
<head>
<title>Main page</title>
<link rel="stylesheet" type="text/css" href="css/de.css">
<link rel="stylesheet" href="animation/animate.css">
</head>
<body>
<script type="text/javascript">
	function checkdelete()
	{
		return confirm('Are you sure you want to delete this game ?');
	}
</script>

<?php
echo "<div class='container'>";

	$query="select * from fileupload";
	$query_run=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($query_run))
	{
		$id=$row[0];
		$img=$row[1];
		$name=$row[2];
		

        echo "<div class='box-1 animated fadeInDown'>";
        	echo "<div class='banner'>";
				echo "<img src={$img}>";
			echo "</div>";
			echo "<h4>{$name}</h4>";
			echo "<a href='delete.php?rn=$id' onclick=' return checkdelete()'>Delete</a>";
			

        echo "</div>";
	}   

echo "</div>";
?>




</body>
</html>