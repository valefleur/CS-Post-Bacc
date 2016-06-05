 <?php
// error reporting
 $dbhost = 'oniddb.cws.oregonstate.edu';
	$dbname = 'sabinc-db';
	$dbuser = 'sabinc-db';
	$dbpass = 'wqDqe2ZBLL4xKo1W';

	$mysql_handle = mysql_connect($dbhost, $dbuser, $dbpass)
		or die("Error connecting to database server");

	mysql_select_db($dbname, $mysql_handle)
		or die("Error selecting database: $dbname");
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>CS340 Project</title>
		<link rel="stylesheet" href="style.css" type="text/css">
	</head>
	<body>
	
		<?php if(isset($_POST['add']) && $_POST['add'] == 'community_gardens_add_radio'):?>
				<div>
					<form method="post" action="add_community.php">
						<label>name:<input type="text" name="community_name" id="name" size="20" maxlength="50"></label>
						</br>
						</br>
						<label>size:<input type="text"  name="community_size" id="size" size="20" maxlength="50" ></label>
						</br>
						</br>
						<label>location:<input type="text" name="community_location" id="location" size="20" maxlength="50"></label>
						</br>
						</br>
						<input type="submit"  id="submit" value="Add to table">
					</form>
				</div>
				</br>
			<?php elseif (isset($_POST['add']) && $_POST['add'] == 'gardeners_add_radio'):?>
				<div>
					<form method="post" action="add_gardeners.php">
						<label>fname:<input type="text" name="fname" id="fname" size="20" maxlength="50"></label>
						</br>
						</br>
						<label>lname:<input type="text" name="lname"id="lname" size="20" maxlength="50"></label>
						</br>
						</br>
						<label>phone_number:<input type="text" name="phone_number"id="phone_number" size="20" maxlength="50"></label>
						</br>
						</br>
						<label>email:<input type="text" name="email" id="email" size="20" maxlength="50"></label>
						</br>
						</br>
						<input type="submit"  id="submit" value="Add to table">
					</form>
				</div>
				</br>
			<?php elseif (isset($_POST['add']) && $_POST['add'] == 'plots_add_radio'):?>
				<div>
					<form method="post" action="add_plots.php">
						<label>plot_size:<input name="plot_size" type="text" id="size" size="20" maxlength="50"></label>
						</br>
						</br>
						<label>community:<input type="text" name="plot_community" id="location" size="20" maxlength="50"></label>
						</br>
						</br>
						<input type="submit"  id="submit" value="Add to table">
					</form>
				</div>
				</br>
			<?php elseif (isset($_POST['add']) && $_POST['add'] == 'plants_add_radio'):?>
				<div>
					<form method="post" action="add_plants.php">
						<label>name:<input name= "name" type="text" id="type" size="20" maxlength="50"></label>
						</br>
						</br>
						<input type="submit"  id="submit" value="Add to table">
					</form>
				</div>
				</br>
			<?php endif ?>
		<form method="get" action="CS340_project_webpage.php"> 	
			<input type="submit"  id="submit" value="Back">
		</form>

	</body>
</html>


