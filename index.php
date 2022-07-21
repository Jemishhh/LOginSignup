<?php
	session_start();
	require_once('config.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<link rel="stylesheet" href="style.css">
</head>
<body style="background-color:lightblue">
	<div id="main-wrapper">

		<form action="index.php" method="post">
		
            <div class="login-wrap">
				<div class="login-html">
					<input id="tab-1" type="radio" name="tab" class="sign-in" checked>
					<label for="tab-1" class="tab">Sign In</label>
					<br><br>
					<div class="login-form">
						
						<div class="sign-in-htm">
							<div class="group">
								<label for="user" class="label">Username</label>
								<input id="user"name="username" type="text" class="input" required>
							</div>
							<div class="group">
								<label for="pass" class="label">Password</label>
								<input id="pass" type="password" name="password" class="input" required>
							</div>
							<div class="group">
								<input id="check" type="checkbox" class="check" checked>
								<label for="check"> Keep me Signed in</label>
							</div>
							<br>
							<div class="group">
								<input type="submit" class="button" name="login" value="Login"  >
							</div>
							<a class="group" href="register.php"><button type="button" class="button">Sign-up</button></a>
							</div>
							
							
						</div>
						<div class="hr"></div>
						
					</div>
				</div>
			</div>
		</form>
		
		<?php
			if(isset($_POST['login']))
			{
				$username=$_POST['username'];
				$password=$_POST['password'];
				$query = "select * from new_table where username='$username' and password='$password' ";
				//echo $query;
				$query_run = mysqli_query($con,$query);
				
				if($query_run)
				{
					if(mysqli_num_rows($query_run)>0)
					{
					$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
					
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
					
					header( "Location: homepage.php");
					}
					else
					{
						echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Database Error")</script>';
				}
			}
			else
			{
			}
		?>
		
	</div>
	
</body>
</html>