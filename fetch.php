<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/fe.css">
	<link rel="stylesheet" href="animation/animate.css">
</head>
<body>


<?php
require "config.php";

$query="select * from fileupload where name like '%".$_POST["search"]."%'";
$query_run=mysqli_query($con,$query);

if(mysqli_num_rows($query_run)>0)
{



	while($row=mysqli_fetch_array($query_run))
	{
		$img=$row[1];	
		$name=$row[2];
		$link=$row[3];


	

	        echo "<div class='box-1 animated slideInLeft'>";
	        	echo "<div class='banner'>";
	        		echo"<div class='highlight'>";
	        				echo "<h4>Keep Calm And Let The Game Begin</h4>";
	        		echo"</div>";
					echo "<img src={$img}>";
				echo "</div>";
				echo "<h4>{$name}</h4>";
				echo "<a href={$link}>Download</a>";
				

	        echo "</div>";



	}
}	

else
{
	echo "<div class='heading animated slideInLeft'>";
		echo "<h3>Data Not Found</h3>";
	echo "</div>";
}


?>


</body>
</html>


