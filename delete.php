<?php
	
require "config.php";
$no=$_GET['rn'];
$query="delete from fileupload where id='$no'";
$query_run=mysqli_query($con,$query);
if($query_run)
{
	echo "<script>alert('Game deleted successfully..')</script>";
	?>
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/front/deletegames.php">
	<?php
}
else
{
	echo "<script>alert('Delete process failed..')</script>";
}



?>
