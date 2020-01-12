<!DOCTYPE html>
<html>
<head>
<title>Admin page</title>
<link rel="stylesheet" type="text/css" href="css/af.css">
<link rel="stylesheet" href="animation/animate.css">
</head>
<body>
<header>
	<div class="heading animated slideInLeft">
		<h1><i>Welcome Admin</i></h1>
	</div>
	<div class="button animated slideInLeft">
		<a href="addgames.php" class="btn">Add Games</a>
		<a href="deletegames.php" class="btn">Delete Games</a>
	</div>
	
	<form method="post">
			<div class="btn animated slideInLeft">
				<input type="submit" name="logout" value="LogOut">
			</div>

			<?php
				if(isset($_POST['logout']))
				{
					session_destroy();
					header('location:admin.php');
				}

			?>

			
	</form>


</header>

</body>
</html>