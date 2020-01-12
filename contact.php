<?php
	require "config.php";
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/co.css">
<link rel="stylesheet" href="animation/animate.css">
<script src="popup/sweetalert.js"></script>
</head>
<body>
<header>
	<div class="container animated slideInLeft">
	
		<h2>Contact</h2>
		<h4> Drop a note!</h4>
			<form method="post">
			<div class="name">
				<input type="text" name="name" style="margin-top: 20px;" placeholder="Name" required><br><br>
			</div>
			<div class="email">
				<input type="email" name="email" placeholder="Email" required><br><br>
			</div>
			<div class="msg">
				<textarea name="msg" placeholder="Write something.." required></textarea>
			</div>
			<div class="btn">
				<input type="submit" name="btn1" style="background-color:black;color:white;font-size:25px;font-family: bold;" value="Send">
			</div>
			<div class="info animated zoomIn">
				<h3>Mobile No: 028374224</h3>
			    <h3> Email: mail@mail.com</h3>
			</div>
			<div class="result" id="r1">
				
			</div>
			</form>		

	</div>
	
		
	<?php
		if(isset($_POST['btn1']))
		{
			$name=$_POST['name'];
			$em=$_POST['email'];
			$msg=$_POST['msg'];
			
	
			$query="insert into contact values('$name','$em','$msg')";
			$query_run=mysqli_query($con,$query);

			if($query_run)
			{
				echo "<script> document.getElementById('r1').innerHTML='$msg';
				</script>";
			}
			else
			{
				echo '<script> swal("", " Error!", "error"); </script>';
			}
			
			
		}
		
		
	?>


	


</header>
</body>
</html>