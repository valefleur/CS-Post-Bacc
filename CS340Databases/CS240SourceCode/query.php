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
			
			$query =  $_POST['query'];
			
			if($query == '')
			{
				echo "Query Empty";
			}
			else
			{
			//give it a try
				$command = "SELECT cg.name, cg.location FROM community_garden cg
														INNER JOIN community_garden_with_gardener cgwg ON cg.community_id = cgwg.community_id
														INNER JOIN gardener g ON cgwg.gardener_id = g.gardener_id
														INNER JOIN gardener_with_plot gwp ON g.gardener_id = gwp.gardener_id
														INNER JOIN plot po ON gwp.plot_id = po.plot_id
														INNER JOIN plot_with_plant pwp ON po.plot_id = pwp.plot_id
														INNER JOIN plant pa ON pwp.plant_id = pa.plant_id
														WHERE pa.name = '{$query}'
														ORDER BY cg.location";
				$result = mysql_query($command);
					if (!$result) {
						echo "DB Error, could not list tables\n";
						echo 'MySQL Error: ' . mysql_error();
						exit;
					}	
					$fields_num = mysql_num_fields($result);

					// echo "<h1>Table: {$table}</h1>";
					echo "<table border='1'>";
					
					// printing table headers
					for($i=0; $i<$fields_num; $i++)
					{
						$field = mysql_fetch_field($result);
						echo "<td>{$field->name}</td>";
					}
					echo "</tr>";//</br>\n";
					// printing table rows
					// ekcho "<div>here</div>";
					//echo "</tr></br>";
					// $row = mysql_fetch_row($result);
					// echo $row;
					// echo "<div>here</div>";
					
					
					
					
					while($row = mysql_fetch_row($result))
					{	
					
					
						echo "<tr>";

						// of $row to $cell variable
						foreach($row as $cell)
{
						//echo "<div>{$cell}</div>";
							echo "<td>{$cell}</td>";
						}
						echo "</tr>";
					}
					echo "</table>";
					mysql_free_result($result);
			}
			
		?>
		<?php echo "<div id='command' >Command: {$command}</div>"?>
		<form method="get" action="CS340_project_webpage.php"> 	
			<input type="submit"  id="submit" value="Back">
		</form>

	</body>
</html>


