<?php
	session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>
	<a href="index.php">Home</a><br />
	<?php
		include 'connection.php';

		if(isset($_POST['submit']))
		{
			$user = mysqli_real_escape_string($connect,$_POST['username']);
			$pass = mysqli_real_escape_string($connect,$_POST['password']);

			if ($user == "" || $pass == "") {
				echo "Either username or password field is empty.";
				echo "<br/>";
				echo "<a href ='login.php'>Go back</a>";
			}else{
				$sql = "SELECT * from login where username = '$user' AND password='$pass'";
				$res = mysqli_query($connect,$sql)
				or die("Could not execute the select query");

				$row = mysqli_fetch_assoc($res);

				if(is_array($row) && !empty($row)){
					$validuser = $row['username'];
					$_SESSION['valid'] = $validuser;
					$_SESSION['name'] = $row['name'];
					$_SESSION['id'] = $row['id'];
				}
				else{
					echo "Invalid username or password.";
					echo "<br/>";
					echo "<a href='login.php'>Go back</a>";
				}
				if (isset($_SESSION['valid'])) {
					header('Location:index.php');
				}
			}
		}else{
	?>
		<p><font size="+2">Login</font></p>
		<form method="post">
			<table width="75%" border="0">
				<tr>
					<td width="10%">Username</td>
					<td><input type="text" name="username" placeholder="Username:admin"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password" placeholder="Password:admin"></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" name="submit" value="Login"></td>
				</tr>
			</table>
		</form>
	<?php
	}
	?>
</body>
</html>