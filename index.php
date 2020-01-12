<?php
	session_start();
	require "config.php";

?>
<!DOCTYPE html>
<html>
<head>
<title>Main page</title>
<link rel="stylesheet" type="text/css" href="css/in.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
<link rel="stylesheet" href="animation/animate.css">
<script src="js/jquery.js"></script>
<script src="way/jquery.waypoints.min.js"></script>

</head>
<body>
<header>
	<div class="heading animated flipInX">
		<h1>Welcome <?php echo $_SESSION['username'] ?></h1>	
	</div>

	<div class="main">
		<form method="post">
			<div class="btn">
				<input type="submit" name="logout" value="LogOut">
			</div>

			<?php
				if(isset($_POST['logout']))
				{
					session_destroy();
					header('location:home.php');
					


				}

			?>

			
		</form>

	</div>
	<div class="search animated slideInLeft">
		
		<input type="text" name="s1" id="se" placeholder="Search">
		<div  class="icon">
			<a href="#">
				<i class="fas fa-search-location"></i>
			</a>


		</div>
		
	</div>

</header>


<?php
echo "<div id='result'></div>";
echo "<div class='container'>";

	$query="select * from fileupload";
	$query_run=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($query_run))
	{

		$img=$row[1];	
		$name=$row[2];
		$link=$row[3];

			

	        echo "<div class='box-1 animated fadeInRightBig'>";
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

echo "</div>";
?>

<div class="special">
	<div class="title">
		<h3>Special Car Games</h3>
	</div>

	<div class="part1">
		<div class="view1">
			<a href="https://cdn.gametop.com/free-games-download/Dirt-Rally-Driver-HD.exe">Download</a>
		</div>
		<img src="images/car1.jpg">
	
	</div>

	<div class="part2">
		<div class="view2">
			<a href="https://cdn.gametop.com/free-games-download/Insane-Monster-Truck-Racing.exe">Download</a>
		</div>
		<img src="images/car2.jpg">
	
	</div>

	<div class="part3">
		<div class="view3">
			<a href="https://cdn.gametop.com/free-games-download/Mad-Cars.exe">Download</a>
		</div>
		<img src="images/car3.jpg">
	
	</div>

	<div class="part4">
		<div class="view4">
			<a href="https://cdn.gametop.com/free-games-download/Moto-Racing-2.exe">Download</a>
		</div>
		<img src="images/car4.jpg">
	
	</div>

	<div class="part5">
		<div class="view5">
			<a href="https://cdn.gametop.com/free-games-download/Sky_Track.exe">Download</a>
		</div>
		<img src="images/car5.jpg">
	
	</div>


	<div class="part6">
		<div class="view6">
			<a href="https://cdn.gametop.com/free-games-download/Tiny-Cars-2.exe">Download</a>
		</div>
		<img src="images/car6.jpg">
	
	</div>
	
</div>


<footer>
<h3>
	All Copyrights © Reserved By Akshay and Ritik.
</h3>

	
</footer>





<script>

	$(document).ready(function(){

		$('.part1').waypoint(function(direction){
			$('.part1').addClass('animated fadeInLeftBig')

		},{
			offset: '87%'
			
		});

		$('.part2').waypoint(function(direction){
			$('.part2').addClass('animated fadeInLeftBig')

		},{
			offset: '87%'
			
		});


		$('.part3').waypoint(function(direction){
			$('.part3').addClass('animated fadeInLeftBig')

		},{
			offset: '87%'
			
		});

	

		$('.part4').waypoint(function(direction){
			$('.part4').addClass('animated fadeInLeftBig')

		},{
			offset: '87%'
			
		});


		$('.part5').waypoint(function(direction){
			$('.part5').addClass('animated fadeInLeftBig')

		},{
			offset: '87%'
			
		});


		$('.part6').waypoint(function(direction){
			$('.part6').addClass('animated fadeInLeftBig')

		},{
			offset: '87%'
			
		});



		$('#se').keyup(function(){
			var txt= $(this).val();
			if(txt != ''){
				$.ajax({
					url:"fetch.php",
					method:"post",
					data:{search:txt},
					dataType:"text",
					success:function(data)
					{
						$('#result').html(data);
					}




				});

			}
			else{
				$('#result').html('');
			}

		});







	});

</script>




</body>

</html>