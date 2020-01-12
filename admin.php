<?php
	session_start();
	require "config.php";
?>
	
<html>
<head>
<title>Page Title</title>
<link rel="stylesheet" type="text/css" href="css/ad.css">
</head>
<body> 
<div class="container">
	<div class="main">
		<h1>Admin</h1>
		<form method="post">
		<div class="txt">
		<input type="text" name="username" placeholder="Username" required><br><br>
		</div>
		<div class="pwd">
		<input type="password" name="pwd" placeholder="Password" required><br><br>
		</div>
		<div class="btn">
		<input type="submit" name="btn1" style="background-color:black;color:white;font-size:25px;" value="Login">
		</div>
		</form>		
	</div>
	

</div>
	<?php
		if(isset($_POST['btn1']))
		{
			$username=$_POST['username'];
			$pwd=$_POST['pwd'];
			
			$query="select * from admin where username='$username' AND password='$pwd'";
			$query_run=mysqli_query($con,$query);
			
			if(mysqli_num_rows($query_run)>0)
			{
				//valid user
				
				header('location:adminfront.php');	
				
					
			}
			else
			{
				echo '<script language="javascript"> alert("Invalid Admin ")</script>';
			}
			
			
			
		}
		
		
	?>
		
		

</body>
</html>