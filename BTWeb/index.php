<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div id="header">
		Welcome
	</div>
	<?php
		if (isset($_SESSION['valid'])) {
			include 'connection.php';
			$sql = "SELECT * from login";
			$res = mysqli_query($connect,$sql);
	?>
		Welcome <?php echo $_SESSION['name'] ?> ! <a href="logout.php">Logout</a><br/>
			<br/>
			<a href="./view/view.php">View and Add Products</a>
			<br/>
			<a href="./load_data/load_data_select.php">Load data</a>
			<br/><br/>
		<?php
		} else{
			echo "You must be logged in to view this page. <br/><br/>";
			echo " <a href='login.php'>Login</a>";
		}
		?>
		<div id=footer align="center">
			Hello World
		</div>
</body>
</html>