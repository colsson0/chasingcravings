<!DOCTYPE html>
<html lang="en">
<head>
	<?php include "headInfo.php";?>
	<?php include "desktopheader.php";?>
</head>
<body>
	<div id="page-wrapper">
		<h1>Report An Issue</h1>
		<div class="form-wrapper-account">
			<form method="report" action = "report.php">
				<table border=0>
					<div class = "container">
						<tr>
							<!-- Do we even need a username? -->
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
								<input type = "email"  name ="email" placeholder = "Enter Email" maxlength="50">
							</td>
						</tr>
					</div>
					<div class="container">
						<tr>
							<td>
								<label><b>Issue</b></label>
							</td>
							<td>
								<select id="issues" name ="issues">
									<option value = "inappropriate">Inappropriate Behavior</option>
									<option value = "wrongaddress">Address Was Incorrect</option>
									<option value = "nonexistent">Truck No Longer Exists</option>
									<option value = "siteerror">Issue With Website</option>
								</select>
							</td>
						</tr>
					</div>
					<div class="container">
						<tr>
							<td>
								<label><b>Comments</b></label>
							</td>
							<td>
							</td>
						</tr>
					</div>
				</table>
				<div class="container">
					<textarea name="comments" rows="5" cols="54" placeholder="Describe the issue."></textarea>
				</div>
				<div class="container">
					<button type = "submit">Submit</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>
