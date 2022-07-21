<?php
	session_start();
	require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Sign Up Page</title>
<link rel="stylesheet" href="style.css">
</head>
<body style="background-color:lightblue">
	<div id="main-wrapper">
	
		<form action="register.php" method="post" >
			
            <div class="login-wrap">
			<div class="login-html">
				<input id="tab-2" type="radio" name="tab" class="sign-up" checked>
				<label for="tab-2" class="tab" >Sign Up</label>
				<br>
				<br>
				<div class="login-form">
					
					<div class="sign-up-htm">
						<div class="group">
							<label  class="label">Username</label>
							<input id="user" name="username" type="text" class="input" required>
						</div>
						<div class="group">
							<label for="pass" class="label">Password</label>
							<input id="pass" name="password" type="password" class="input" required>
						</div>
						<div class="group">
							<label for="pass" class="label">Confirm Password</label>
							<input id="pass"  type="password" class="input" name="cpassword" required>
						</div>
						<br>
						<div class="group">
							<input type="submit" name="register" class="button" value="Sign Up" >
						</div>
						
						<div class="foot-lnk">
							
							<a class="group" href="index.php" ><button type="button" class="button">Back to Login</button></a>

						</div><div class="hr"></div>
					</div>
				</div>
			</div>
		</div>    
	    </form>
		
		<?php
			if(isset($_POST['register']))
			{
				$username=$_POST['username'];
				$password=$_POST['password'];
				$cpassword=$_POST['cpassword'];
				
				if($password==$cpassword)
				{
					$query = "select * from new_table where username='$username'";
					//echo $query;
				$query_run = mysqli_query($con,$query);
				
				if($query_run)
					{
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("This Username Already exists.. Please try another username!")</script>';
						}
						else
						{
							$query = "insert into new_table values('$username','$password')";
							$query_run = mysqli_query($con,$query);
							if($query_run)
							{
								echo '<script type="text/javascript">alert("User Registered.. Welcome")</script>';
								$_SESSION['username'] = $username;
								$_SESSION['password'] = $password;
								header( "Location: index.php");
							}
							else
							{
								echo '<p class="bg-danger msg-block">Registration Unsuccessful due to server error. Please try later</p>';
							}
						}
					}
					else
					{
						echo '<script type="text/javascript">alert("DB error")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';
				}
				
			}
			else
			{
			}
		?>
	</div>
	
</body>
</html>       