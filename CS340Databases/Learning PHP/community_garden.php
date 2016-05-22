<?php
ini_set('display_errors', 'On');

//Connect to db
$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "edwardse-db", "tvSH3gJ47IW3hu8k", "edwardse-db");
if($mysqli->connect_error){
	echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
else echo "Hey, Adina!";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<body>
	<div>
		<table>
			<tr>
				<td>Community Garden</td>
			</tr>
			<tr>
				<td>Name</td>
				<td>Size</td>
				<td>Location</td>
			</tr>
			<?php
				if(!($stmt = $mysqli->prepare("SELECT * FROM community_garden"))){
					echo "Prepare failed: " . $stmt->errno . " " . $stmt->error;
				}
				else echo "Prepare SUCEEDED!\n";
				if(!$stmt->execute()){
					echo "Execute failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}
				else echo "Execute SUCEEDED!\n";
				if(!$stmt->bind_result($community_id, $name, $size, $location)){
					echo "Bind failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}
				else echo "Bind SUCEEDED!\n";
				while($stmt->fetch()){
					#echo "Got something! " . $community_id . " " . $name . " " . $size . " " . $location;
					echo "<tr>\n<td>\n" . $community_id . "\n</td>\n<td>\n" . $name . "\n</td>\n<td>\n" . $size . "\n</td>\n<td>\n" . $location . "\n</td>\n</tr>;"
				}
				$stmt->close();
			?>
		</table>
	</div>
</body>
</html>