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
					<td>fname</td>
					<td>lname</td>
					<td>phone_number</td>
					<td>email</td>
				</tr>
				<?php 
					$is_error = false;
					echo "\n<tr>\n";
					$fname = $_POST['fname'];
					$lname = $_POST['lname'];
					$phone_number = $_POST['phone_number'];
					$email = $_POST['email'];
					
					if(isset($fname) && $fname != ''){
						echo "\n<td>\n {$fname} \n</td>\n";
						//this value cannot be null
					}else{
						echo "\n<td>\nCannot be null\n</td>\n";
						$is_error = true;
					}
					
					if(isset($lname) && $lname != ''){
						echo "\n<td>\n {$lname} \n</td>\n";
						//this value cannot be null
					}else{
						echo "\n<td>\nCannot be null\n</td>\n";
						$is_error = true;
					}
					
					if(ctype_digit($phone_number)){
						echo "\n<td>\n {$phone_number} \n</td>\n";
					}elseif($phone_number  == ''){
						echo "\n<td>\nnull\n</td>\n";
					}else{
						echo "\n<td>\nMust be type int(11)\n</td>\n";
						$is_error = true;
					}
					echo "\n<td>\n {$email} \n</td>\n";
						
					if($is_error == false){
								$command = "INSERT INTO gardener(fname,lname,phone_number, email) VALUES('{$fname}', '{$lname}', '{$phone_number}', '{$email}')";
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
			<?php echo "<div id='command' >Command: {$command}</div>"?>
		</br>
		</br>
				
		<form method="get" action="CS340_project_webpage.php"> 	
			<input type="submit"  id="submit" value="Back">
		</form>

	</body>
</html>


