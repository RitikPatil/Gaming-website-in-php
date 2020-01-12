<?php
	require "config.php";
?>
<html>
<head>
<title>Page Title</title>
<link rel="stylesheet" type="text/css" href="css/re.css">
<script src="popup/sweetalert.js"></script>
<link rel="stylesheet" href="animation/animate.css">
</head>
<body> 
<div class="container">
	<div class="main animated slideInLeft">
		<h1>Register</h1>
		<form action="register.php" method="post" name="myform">
		<div class="txt">
		<input type="text" name="username" placeholder="Username" required><br><br>
		</div>
		<div class="pwd">
		<input type="password" name="pwd" placeholder="Password" required><br><br>
		</div>
		<div class="cpwd">
		<input type="password" name="cpwd" placeholder="Confirm Password" required><br><br>
		</div>
		<div class="btn">
		<input type="submit" name="btn" style="background-color:black;color:white;font-size:25px;" value="Submit">
		</div>
		</form>
	</div>
	<?php
		if(isset($_POST['btn']))
		{
			//echo '<script language="javascript"> alert("yup") </script>';
			
			$username=$_POST['username'];
			$pwd=$_POST['pwd'];
			$cpwd=$_POST['cpwd'];


			if(strlen($username)<6)
			{
				echo '<script language="javascript"> swal("", "Username should at least contain 6 character !", "error");</script>';
			}

			else if(strlen($pwd)<6)
			{
				echo '<script language="javascript"> swal("", "Password should at least contain 6 character !", "error");</script>';
			}



			
			else if($pwd==$cpwd)
			{
				$query="select * from user where username='$username'";
				$query_run=mysqli_query($con,$query);



				
				if(mysqli_num_rows($query_run)>0)
				{
					//there is already user with the same username;
					echo '<script language="javascript"> swal("", "There is already user with the same username !", "error");</script>';
					
				}
				else
				{
					$query="insert into user values('$username','$pwd')";
					$query_run=mysqli_query($con,$query);
					
					if($query_run)
					{
						//echo '<script language="javascript"> alert("User registered.. go to login page ") </script>';
						echo '<script language="javascript"> swal("Good job", "User registered.. go to login page", "success"); </script>';
					}
					else
					{
						echo '<script language="javascript"> swal("", "Error !", "error");</script>';
					}
				}
				
		
			}
			else
			{
				//echo '<script language="javascript"> alert("Password and confirm password does not match ") </script>';
				echo '<script language="javascript"> swal("", "Password and confirm password does not match!", "error"); </script>';

			}
			
			
		}
		
		
		
		
		
	?>
	
	
	
	
	
	
	
</div>

</body>
</html>