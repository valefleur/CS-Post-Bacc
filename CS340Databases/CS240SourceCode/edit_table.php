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
			$is_error = false;
			if(isset($_POST['community_garden']))
			{
				$community_id = $_POST['text_community_id'];
				$community_name = $_POST['text_community_name'];
				$community_size = $_POST['text_community_size'];
				$community_location = $_POST['text_community_location'];
				
				//we only need total count from one attribute since they all have the same size
				$community_row_count = count($community_id);
				
				for($n=0; $n <= $community_row_count-1; $n++)
				{
						// Have to make sure entries are valid
						// conditions of update, community name cannot be null, size must be a number, location cannot be null
						 if($community_name[$n] == '')
						{
							echo "<div>Error in row {$n}:  Community name cannot be null</div></br>";
						}
						elseif(!(ctype_digit($community_size[$n])) )
						{
							echo "<div>Error in row {$n}:  Community size must be an integer</div></br>";
						}
						elseif($community_location[$n] == '')
						{
							echo "<div>Error in row {$n}:  Community location cannot be null</div></br>";
						}
						else
						{
							$command = "UPDATE community_garden SET 
																name='{$community_name[$n]}', 
																size='{$community_size[$n]}',
																location='{$community_location[$n]}' 
																WHERE community_id='{$community_id[$n]}' ";
							$result = mysql_query($command);
							if (!$result) {
								echo "DB Error, could not list tables\n";
								echo 'MySQL Error: ' . mysql_error();
								exit;
							}	
							mysql_free_result($result);
							echo "<div>Update row {$n} Success. Command: {$command}</div></br>";
						}
				}
				
			}
			elseif(isset($_POST['gardener']))
			{
				$gardener_id = $_POST['text_gardener_id'];
				$gardener_fname = $_POST['text_gardener_fname'];
				$gardener_lname = $_POST['text_gardener_lname'];
				$gardener_pnohe_number = $_POST['text_gardener_phone_number'];
				$gardener_email= $_POST['text_gardener_email'];
				
				//we only need total count from one attribute since they all have the same size
				$gardener_row_count = count($gardener_id);
				
				for($n=0; $n <= $gardener_row_count-1; $n++)
				{
						// Have to make sure entries are valid
						 if($gardener_fname[$n] == '')
						{
							echo "<div>Error in row {$n}:  fname cannot be null</div></br>";
						}
						elseif($gardener_lname[$n] == '')
						{
							echo "<div>Error in row {$n}:  lname cannot be null</div></br>";
						}
						elseif(!(ctype_digit($gardener_pnohe_number[$n])) )
						{
							echo "<div>Error in row {$n}:  phone number must be an integer</div></br>";
						}
						else
						{
							$command = "UPDATE gardener SET 
																fname='{$gardener_fname[$n]}', 
																lname='{$gardener_lname[$n]}',
																phone_number='{$gardener_pnohe_number[$n]}',
																email='{$gardener_email[$n]}' 
																WHERE gardener_id='{$gardener_id[$n]}' ";
							$result = mysql_query($command);
							if (!$result) {
								echo "DB Error, could not list tables\n";
								echo 'MySQL Error: ' . mysql_error();
								exit;
							}	
							mysql_free_result($result);
							echo "<div>Update row {$n} Success. Command: {$command}</div></br>";
						}
				}
			}
			elseif(isset($_POST['plot']))
			{
				$plot_id = $_POST['text_plot_id'];
				$plot_size = $_POST['text_plot_size'];
				$plot_community = $_POST['text_plot_community'];
				
				//we only need total count from one attribute since they all have the same size
				$plot_row_count = count($plot_id);
				
				for($n=0; $n <= $plot_row_count-1; $n++)
				{
						// Have to make sure entries are valid
						 if(!(ctype_digit($plot_size[$n])) )
						{
							echo "<div>Error in row {$n}: plot size must be an integer</div></br>";
						}
						else
						{
							$command = "UPDATE plot SET 
																plot_size='{$plot_size[$n]}' 
																WHERE plot_id='{$plot_id[$n]}' ";
							$result = mysql_query($command);
							if (!$result) {
								echo "DB Error, could not list tables\n";
								echo 'MySQL Error: ' . mysql_error();
								exit;
							}	
							mysql_free_result($result);
							echo "<div>Update row {$n} Success. Command: {$command}</div></br>";
						}
				}
			}
			elseif(isset($_POST['plant']))
			{
				$plant_id = $_POST['text_plant_id'];
				$plant_name = $_POST['text_plant_name'];
				
				//we only need total count from one attribute since they all have the same size
				$plant_row_count = count($plant_id);
				
				for($n=0; $n <= $plant_row_count-1; $n++)
				{
						// Have to make sure entries are valid
						 if($plant_name[$n] == '')
						{
							echo "<div>Error in row {$n}:  name cannot be null</div></br>";
						}
						else
						{
							$command = "UPDATE plant SET 
																name='{$plant_name[$n]}' 
																WHERE plant_id='{$plant_id[$n]}' ";
							$result = mysql_query($command);
							if (!$result) {
								echo "DB Error, could not list tables\n";
								echo 'MySQL Error: ' . mysql_error();
								exit;
							}	
							mysql_free_result($result);
							echo "<div>Update row {$n} Success. Command: {$command}</div></br>";
						}
				}
			}
			else
			{
				echo "There was an error in your edit";
			}
		
		?>
		<form method="get" action="CS340_project_webpage.php"> 	
			<input type="submit"  id="submit" value="Back">
		</form>

	</body>
</html>


