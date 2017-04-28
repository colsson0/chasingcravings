<!DOCTYPE html>
<html lang="en">
<head>
	<?php include "headInfo.php";?>
	<?php include "desktopheader.php";?>
</head>
<body>
	<?php
		$specialMessage = "";
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			include "dbcredentials.php";
			
			$connect=mysqli_connect($server, $user, $pw, $db);
			if( !$connect) 
			{
				die("ERROR: Cannot connect to database $db on server $server 
				using user name $user (".mysqli_connect_errno().
				", ".mysqli_connect_error().")");
			}
			else{
				$userQuery = "SELECT * FROM useraccounts WHERE username = '".$_POST['username']."' AND email='".$_POST['email']."';";
				$result = mysqli_query($connect, $userQuery);
				if (!$result) 
				{
					die("Could not successfully run query ($userQuery) from $db: " .	
					mysqli_error($connect) );
				}	
				if (mysqli_num_rows($result) == 0) 
				{
					$specialMessage = "Invalid username/email, please try again";
				}
				else
				{
					$row = mysqli_fetch_assoc($result);
					$pwd =$row['pwd'];
					$to = $row['email'];
					$subject = "Chasing Cravings Password Recovery";
					$message = "Your password is: ".$pwd;
					$headers = "From : admin@chasingcravings.com";
					if(mail($to, $subject, $message, $headers)){
						$specialMessage = "Email sent.";
					}
					else{
						$specialMessage = "Password recovery failed.";
					}
				}
			}
		}
	?>
	<div id="page-wrapper">
		<h1>Forgot Password</h1>
		<div class="form-wrapper-account">
			<form method="POST" action = "forgotpassword.php">
				<table border=0>
					<div class = "container">
						<tr>
							<td>
								<label><b>Username</b></label>
							</td>
							<td>
								<input type = "text" name ="username" placeholder = "Enter Username">
							</td>
						</tr>
					</div>
					<div class="container">
						<tr>
							<td>
								<label><b>Email</b></label>
							</td>
							<td>
								<input type = "email"  name ="email" placeholder = "Enter Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" maxlength="50">
							</td>
						</tr>
					</div>
				</table>
				<div class="container">
					<button type = "submit">Submit</button>
				</div>
			</form>
		</div>
		<?php echo $specialMessage; ?>
		<br><p><a href="login.php">Return to Login</a></p>
	</div>
</body>
</html>
