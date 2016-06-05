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
		
		<?php 
			
			$community = $_POST['check_community_row'];
			$gardener = $_POST['check_gardener_row'];
			$plot = $_POST['check_plot_row'];
			$plant = $_POST['check_plant_row'];				
			
			
			if(isset($community) )
			{
				$rows = $community;
				$table = "community_garden";
				$table_id = "community_id";
			}
			else if(isset($gardener) )
			{
				$rows = $gardener;
				$table = "gardener";
				$table_id = "gardener_id";
			}
			else if(isset($plot) )
			{
				$rows = $plot;
				$table = "plot";
				$table_id = "plot_id";
			}
			else if(isset($plant) )
			{
				$rows = $plant;
				$table = "plant";
				$table_id = "plant_id";
			}				
			else
			{
				$table = "";
			}
			
		$count = count($rows);
		
			if($count > 0)
			{
				 foreach($rows as $id){
					 $command = "DELETE FROM {$table} WHERE {$table_id} = {$id}";
					 
						$result = mysql_query($command);
									if (!$result) {
									echo "DB Error, could not list tables\n";
									echo 'MySQL Error: ' . mysql_error();
									exit;
								}		
								
								echo "<div>Row Deleted: {$table_id} [{$id}] from {$table} table</div>\n";
				}
				echo "rows successfully deleted";
			}
			else
			{
				echo "Row count is not >0";
			}		
		?>
		<?php echo "<div id='command' >Command: {$command}</div>"?>
		<form method="get" action="CS340_project_webpage.php"> 	
			<input type="submit"  id="submit" value="Back">
		</form>

	</body>
</html>


