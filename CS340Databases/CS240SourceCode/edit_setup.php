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
	
	
	
	
				
		<form method="post" action="edit_table.php">
			<?php if(isset($_POST['edit']) && $_POST['edit'] == 'community_gardens_edit_radio'):?>
				<div>
				<table border='1' class="community">
					<tr>
						<td>community_garden</td>
					</tr>
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
							echo "<tr>\n
										<td>\n<input type='text' name='text_community_id[]' value='{$row[0]}' readonly></input>\n</td>\n
										<td>\n<input type='text' name='text_community_name[]' value='{$row[1]}'></input>\n</td>\n
										<td>\n <input type='text' name='text_community_size[]' value='{$row[2]}'></input>\n</td>\n
										<td>\n<input type='text' name='text_community_location[]' value='{$row[3]}'></input>\n</td>\n
									</tr>";
						}	
						mysql_free_result($result);
					?>
				</table>
				</div>
				<?php echo "<div id='command' >Command: {$command}</div>"?>
				</br>
				</br>
				<input type="submit"  id="submit" name= "community_garden" value="Edit">
			<?php elseif (isset($_POST['edit']) && $_POST['edit'] == 'gardeners_edit_radio'):?>
				<div>
					<table border='1'>
						<tr>
							<td>gardener</td>
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
									echo "<tr>\n
												<td>\n<input type='text' name='text_gardener_id[]' value='{$row[0]}' readonly></input>\n</td>\n
												<td>\n <input type='text' name='text_gardener_fname[]' value='{$row[1]}'></input>\n</td>\n
												<td>\n <input type='text' name='text_gardener_lname[]' value='{$row[2]}'></input>\n</td>\n
												<td>\n <input type='text' name='text_gardener_phone_number[]' value='{$row[3]}'></input>\n</td>\n
												<td>\n <input type='text' name='text_gardener_email[]' value='{$row[4]}'></input>\n</td>\n
											</tr>";
								}	
								
							mysql_free_result($result);
						
						?>
					</table>
				</div>
				<?php echo "<div id='command' >Command: {$command}</div>"?>
				</br>
				</br>
				<input type="submit"  id="submit" name= "gardener" value="Edit">
			<?php elseif (isset($_POST['edit']) && $_POST['edit'] == 'plots_edit_radio'):?>
				<div>
					<table border='1'>
						<tr>
							<td>plot</td>
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
									echo "<tr>\n
												<td>\n<input type='text' name='text_plot_id[]' value='{$row[0]}' readonly></input>\n</td>\n
												<td>\n <input type='text' name='text_plot_size[]' value='{$row[1]}'></input>\n</td>\n
												<td>\n <input type='text' name='text_plot_community[]' value='{$row[2]}' readonly></input>\n</td>\n
											</tr>";
								}	
							mysql_free_result($result);
						?>
					</table>
				</div>
				<?php echo "<div id='command' >Command: {$command}</div>"?>
				</br>
				</br>
				<input type="submit"  id="submit" name= "plot" value="Edit">
			<?php elseif (isset($_POST['edit']) && $_POST['edit'] == 'plants_edit_radio'):?>
				<div>
					<table border='1'>
						<tr>
							<td>plant</td>
						</tr>
						<tr>
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
												<td>\n<input type='text' name='text_plant_id[]' value='{$row[0]}' readonly></input>\n</td>\n
												<td>\n <input type='text' name='text_plant_name[]' value='{$row[1]}'></input>\n</td>\n
											</tr>";
								}	
							mysql_free_result($result);
						?>
					</table>
				</div>
				<?php echo "<div id='command' >Command: {$command}</div>"?>
				</br>
				</br>
				<input type="submit"  id="submit" name= "plant" value="Edit">
			<?php endif ?>
			</form>
			
		<form method="get" action="CS340_project_webpage.php"> 	
			<input type="submit"  id="submit" value="Back">
		</form>
	</body>
</html>


