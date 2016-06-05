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
		<div>
			<table border='1'>
				<tr>
					<td>plot_size</td>
					<td>community</td>
				</tr>
				<?php 
					$is_error = false;
					echo "\n<tr>\n";
					$plot_size = $_POST['plot_size'];
					$community = $_POST['plot_community'];
					
					if(ctype_digit($plot_size)){
						echo "\n<td>\n {$plot_size} \n</td>\n";
					}elseif($plot_size  == ''){
						echo "\n<td>\nnull\n</td>\n";
					}else{
						echo "\n<td>\nMust be type int(11)\n</td>\n";
						$is_error = true;
					}
					
					//check if community exits in community_garden table
					$command_search = "SELECT community_id FROM community_garden WHERE community_id='{$community}'";
					$result_search = mysql_query($command_search);
					if (!$result_search) {
						 echo "DB Error, could not list tables\n";
						 echo 'MySQL Error: ' . mysql_error();
						 exit;
					}	
					
					 if(ctype_digit($community)){
						
						 if(mysql_num_rows ( $result_search )> 0){
							 echo "\n<td>\n {$community} \n</td>\n";
						}else{
							echo "\n<td>\nMust exist in community_garden\n</td>\n";
							$is_error = true;
						 }
					 }elseif($community  == ''){
						echo "\n<td>\nnull\n</td>\n";
					}else{
						echo "\n<td>\nMust be type int(11)\n</td>\n";
						$is_error = true;
					}
					mysql_free_result($result_search);		
					
					if($is_error == false){
								$command = "INSERT INTO plot(plot_size,community) VALUES('{$plot_size}', '{$community}')";
								 $result = mysql_query($command);
							 if (!$result) {
								 echo "DB Error, could not list tables\n";
								 echo 'MySQL Error: ' . mysql_error();
								 exit;
							}	
						mysql_free_result($result);
					
						echo "\n</tr> </br> <div>Row added successfully</div>";
					}else{
						echo "\n</tr> </br> <div>Cannot add row</div>";
					}
				?>
				</table>
			</div>
			<?php echo "<div id='command' >Command: {$command_search}</div>"?>
			<?php echo "<div id='command' >Command: {$command}</div>"?>
		</br>
		</br>
				
		<form method="get" action="CS340_project_webpage.php"> 	
			<input type="submit"  id="submit" value="Back">
		</form>

	</body>
</html>


