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
	
		<?php if(isset($_POST['community_name']) && $_POST['community_name'] != ''):?>
				<div>
					<table border='1'>
						<tr>
							<td>community_id</td>
							<td>name</td>
							<td>size</td>
							<td>location</td>
						</tr>
						<?php
						
						
							$command = 'SELECT * FROM community_garden';
									$result = mysql_query($command);

								if (!$result) {
									echo "DB Error, could not list tables\n";
									echo 'MySQL Error: ' . mysql_error();
									exit;
								}				
								
									while ($row = mysql_fetch_row($result)) {
									echo "<tr>\n<td>\n {$row[0]}  \n</td>\n<td>\n {$row[1]}  \n</td>\n<td>\n {$row[2]} \n</td>\n<td>\n {$row[3]} \n</td>\n</tr>";
								}	
								
						
							mysql_free_result($result);
						
						?>
					</table>
				</div>
				</br>
			<?php endif ?>
			</br>
			<?php if(isset($_POST['add']) && $_POST['add'] == 'gardeners_add_radio'):?>
				<div>
					<table border='1'>
						<tr>
							<td>Community Gardens</td>
						</tr>
						<tr>
							<td>gardener_id</td>
							<td>fname</td>
							<td>lname</td>
							<td>phone_number</td>
							<td>email</td>
						</tr>
						<?php
							$command = 'SELECT * FROM gardener';
									$result = mysql_query($command);

								if (!$result) {
									echo "DB Error, could not list tables\n";
									echo 'MySQL Error: ' . mysql_error();
									exit;
								}				
								
									while ($row = mysql_fetch_row($result)) {
									echo "<tr>\n<td>\n {$row[0]}  \n</td>\n<td>\n {$row[1]}  \n</td>\n<td>\n {$row[2]} \n</td>\n<td>\n {$row[3]} \n</td>\n<td>\n {$row[4]} \n</td>\n</tr>";
								}	
								
						
							mysql_free_result($result);
						
						?>
					</table>
				</div>
				</br>
			<?php endif ?>
			</br>
			<?php if(isset($_POST['add']) && $_POST['add'] == 'plots_add_radio'):?>
				<div>
					<table border='1'>
						<tr>
							<td>Community Gardens</td>
						</tr>
						<tr>
							<td>plot_id</td>
							<td>plot_size</td>
							<td>community</td>
						</tr>
						<?php
							$command = 'SELECT * FROM plot';
									$result = mysql_query($command);

								if (!$result) {
									echo "DB Error, could not list tables\n";
									echo 'MySQL Error: ' . mysql_error();
									exit;
								}				
								
									while ($row = mysql_fetch_row($result)) {
									echo "<tr>\n<td>\n {$row[0]}  \n</td>\n<td>\n {$row[1]}  \n</td>\n<td>\n {$row[2]}  \n</td>\n</tr>";
								}	
								
						
							mysql_free_result($result);
						
						?>
					</table>
				</div>
				</br>
			<?php endif ?>
			</br>
			<?php if(isset($_POST['add']) && $_POST['add'] == 'plants_add_radio'):?>
				<div>
					<table border='1'>
						<tr>
							<td>Community Gardens</td>
						</tr>
						<tr>
							<td>plant_id</td>
							<td>type</td>
						</tr>
						<?php
							$command = 'SELECT * FROM plant';
									$result = mysql_query($command);

								if (!$result) {
									echo "DB Error, could not list tables\n";
									echo 'MySQL Error: ' . mysql_error();
									exit;
								}				
								
									while ($row = mysql_fetch_row($result)) {
									echo "<tr>\n<td>\n {$row[0]}  \n</td>\n<td>\n {$row[1]}  \n</td>\n</tr>";
								}	
								
						
							mysql_free_result($result);
						
						?>
					</table>
				</div>
				</br>
			<?php endif ?>
			
		<form method="get" action="CS340_project_webpage.php"> 	
			<input type="submit"  id="submit" value="Back">
		</form>

	</body>
</html>


