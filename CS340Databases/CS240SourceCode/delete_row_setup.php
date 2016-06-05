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
	
	
	
	
				
		<form method="post" action="delete_row.php">
			<?php if(isset($_POST['delete']) && $_POST['delete'] == 'community_gardens_delete_radio'):?>
				<div>
				<table border='1' class="community">
					<tr>
						<td>community_garden</td>
					</tr>
					<tr>
						<td></td>
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
											
						// if($result == "")
						// {
							// echo "<div>Query failed</div>";
						// }
						
						while ($row = mysql_fetch_row($result)) {
							echo "<tr>\n
										<td><input type='checkbox' name='check_community_row[]' value='{$row[0]}'>Delete</input></td>\n
										<td>\n {$row[0]}  \n</td>\n
										<td>\n {$row[1]}  \n</td>\n
										<td>\n {$row[2]} \n</td>\n
										<td>\n {$row[3]} \n</td>\n
									</tr>";
						}	
						mysql_free_result($result);
					?>
				</table>
				</div>
				<?php echo "<div id='command' >Command: {$command}</div>"?>
				</br>
			<?php elseif (isset($_POST['delete']) && $_POST['delete'] == 'gardeners_delete_radio'):?>
				<div>
					<table border='1'>
						<tr>
							<td>gardener</td>
						</tr>
						<tr>
							<td></td>
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
									echo "<tr>\n
												<td><input type='checkbox' name='check_gardener_row[]' value='{$row[0]}'>Delete</input></td>\n
												<td>\n {$row[0]}  \n</td>\n
												<td>\n {$row[1]}  \n</td>\n
												<td>\n {$row[2]} \n</td>\n
												<td>\n {$row[3]} \n</td>\n
												<td>\n {$row[4]} \n</td>\n
											</tr>";
								}	
								
							mysql_free_result($result);
						
						?>
					</table>
				</div>
				<?php echo "<div id='command' >Command: {$command}</div>"?>
				</br>
			<?php elseif (isset($_POST['delete']) && $_POST['delete'] == 'plots_delete_radio'):?>
				<div>
					<table border='1'>
						<tr>
							<td>plot</td>
						</tr>
						<tr>
							<td></td>
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
									echo "<tr>\n
												<td><input type='checkbox' name='check_plot_row[]'' value='{$row[0]}'>Delete</input></td>\n
												<td>\n {$row[0]}  \n</td>\n
												<td>\n {$row[1]}  \n</td>\n
												<td>\n {$row[2]}  \n</td>\n
											</tr>";
								}	
							mysql_free_result($result);
						?>
					</table>
				</div>
				<?php echo "<div id='command' >Command: {$command}</div>"?>
				</br>
			<?php elseif (isset($_POST['delete']) && $_POST['delete'] == 'plants_delete_radio'):?>
				<div>
					<table border='1'>
						<tr>
							<td>plant</td>
						</tr>
						<tr>
							<td></td>
							<td>plant_id</td>
							<td>name</td>
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
									echo "<tr>\n
												<td><input type='checkbox' name='check_plant_row[]' ' value='{$row[0]}'>Delete</input></td>\n
												<td>\n {$row[0]}  \n</td>\n
												<td>\n {$row[1]}  \n</td>\n
											</tr>";
								}	
							mysql_free_result($result);
						?>
					</table>
				</div>
				<?php echo "<div id='command' >Command: {$command}</div>"?>
				</br>
			<?php endif ?>
			
			
				
				</br>
				<input type="submit"  id="submit" value="Delete">
			</form>
			
		<form method="get" action="CS340_project_webpage.php"> 	
			<input type="submit"  id="submit" value="Back">
		</form>
	</body>
</html>


