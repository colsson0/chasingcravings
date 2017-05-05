<!DOCTYPE HTML>
<html>
	<head>
		<?php include "headInfo.php";?>
	</head>
	<body>
		<?php
			include "desktopheader.php";
			include "dbcredentials.php";
			$connect=mysqli_connect($server, $user, $pw, $db);
			if( !$connect) 
			{
				die("ERROR: Cannot connect to database $db on server $server 
				using user name $user (".mysqli_connect_errno().
				", ".mysqli_connect_error().")");
			}
			// If the user is logged in...
			if(isset($_SESSION['userID']) != null){
				if($_GET['remove'] != null){
					$userQuery = "DELETE FROM favorites WHERE userID=".$_SESSION['userID']." AND truckID=".$_GET['remove'];
					$result = mysqli_query($connect, $userQuery);
				}
				$userQuery = "SELECT trucks.truckID AS truckID, trucks.pictureURL AS picURL, trucks.truckName AS truckName FROM favorites, trucks WHERE trucks.truckID = favorites.truckID AND favorites.userID =".$_SESSION['userID'];
				$result = mysqli_query($connect, $userQuery);
				if (!$result) 
				{
					die("Could not successfully run query ($userQuery) from $db: " .	
					mysqli_error($connect) );
				}
				if (mysqli_num_rows($result) == 0) 
				{
					echo "No favorites yet.
					";
				}
				// Generate the html code to display information
				else 
				{ 
					//not working
					//$row = mysqli_fetch_assoc($result);
					//$newAcctType = $row['acctType'];
					
					echo "<div id=\"page-wrapper\">
					<aside id=\"nav-aside\" role=\"complementary\">
						<nav id=\"nav-menu\" role=\"navigation\">
							<ul>
								<li><a href=\"myaccount.php\">Manage Account</a></li>";
								//not working
								//if($newAcctType == "truck"){
									//echo "<li><a href=\"truckaccount.php\">Truck Account</a></li>";
								//}
					echo		"<li class=\"active\"><a href=\"favorites.php?remove=\">Favorites</a></li>
							</ul>
						</nav>
					</aside>
					<h1>Favorites</h1>
					<div class=\"form-wrapper\">
						<table border = 0>
							<div class=\"container\">
								<tr>
									<th></th>
									<th>Truck Name</th>
									<th></th>
								</tr>
							</div>";
					while ($row = mysqli_fetch_assoc($result))
					{
						echo "<tr>
							<td>
								<img src=\"".$row['picURL']."\">
							</td>
							<td>
								<a href=\"truck.php?truckID=".$row['truckID']."\">".$row['truckName']."</a>
							</td>
							<td>
								<a href=\"favorites.php?remove=".$row['truckID']."\">X</a>
							</td>
						</tr>
						";
					}
					echo "</table>
					</div>";
				}
				
				mysqli_close($connect);   // close the connection
			}
			else {
				// If the user got here without being logged in, send them to the log in page
				echo "<script>window.location.replace(\"login.php\");</script>";
			}
		?>
		</div>
	</body>
</html>


