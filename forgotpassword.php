<!DOCTYPE html>
<html lang="en">
<head>
	<?php include "headInfo.php";?>
	<?php include "desktopheader.php";?>
</head>
<body>
	<div id="page-wrapper">
		<h1>Forgot Password</h1>
		<div class="form-wrapper-account">
			<form method="forgotpassword" action = "forgotpassword.php">
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
		<br><p><a href="login.php">Return to Login</a></p>
	</div>
</body>
</html>
