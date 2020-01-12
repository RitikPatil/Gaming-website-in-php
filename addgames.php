<?php
	require "config.php";
?>
	
<html>
<head>
<title>Page Title</title>
<link rel="stylesheet" type="text/css" href="css/ag.css">
<script src="popup/sweetalert.js"></script>
</head>
<body> 
<div class="container">
	<div class="main">
		<h1>Add Games</h1>
		<form method="post" enctype="multipart/form-data">
		<div class="upload">
		<input type="file" name="imglink" accept=".jpg,.jpeg,.png" required><br><br>
		</div>
		<div class="name">
		<input type="text" name="gname" placeholder="Enter The Name " required><br><br>
		</div>
		<div class="url">
		<input type="url" name="url" placeholder="Enter url " required><br><br>
		</div>
		<div class="btn">
		<input type="submit" name="btn1" style="background-color:black;color:white;font-size:25px;" value="Submit">
		</div>
		</form>		
	</div>
	

</div>
	<?php
		if(isset($_POST['btn1']))
		{
			$img_name=$_FILES['imglink']['name'];
			$img_size=$_FILES['imglink']['size'];
			$img_tmp=$_FILES['imglink']['tmp_name'];

			$directory='upload/';
			$target_file=$directory.$img_name;

			$name=$_POST['gname'];

			$link=$_POST['url'];

			$query="select * from fileupload where link='$link'";
			$query_run=mysqli_query($con,$query);
	

			$query="select * from fileupload where name='$name'";
			$query_op=mysqli_query($con,$query);
	


			
			if(file_exists($target_file))
			{
				//echo ' <script language="javascript"> alert("Image file already exists.. Try another image file  ")</script> ';
				echo '<script language="javascript"> swal("", "Image file already exists.. Try another image file  !", "error");</script>';
			}

			else if(mysqli_num_rows($query_op)>0){
				//echo '<script language="javascript"> alert("Name already exists.. Try another name  ")</script>';
				echo '<script language="javascript"> swal("", "Name already exists.. Try another name !", "error");</script>';

			}


			else if(mysqli_num_rows($query_run)>0) 
			{
				//echo '<script language="javascript"> alert("Link already exists.. Try another link  ")</script>';
				echo '<script language="javascript"> swal("", "Link already exists.. Try another link  !", "error");</script>';

			}
			

			else
			{

				move_uploaded_file($img_tmp, $target_file);

				$query="insert into fileupload values('','$target_file','$name','$link')";
				$query_run=mysqli_query($con,$query);

				if($query_run)
				{
					//echo '<script language="javascript"> alert("Data successfully added to the database ")</script>';
					echo '<script language="javascript"> swal("", "Data successfully added to the database !", "success");</script>';
				}
				else
				{
					echo '<script language="javascript"> swal("", "Error !", "Error");</script>';
				}
				
			}




			
		}
		
		
	?>
		
		

</body>
</html>