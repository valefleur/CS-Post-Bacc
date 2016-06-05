

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
			<form method="post" action="show_tables.php"> 
				<fieldset id="showDatabases">
					<Legend id="legend_title">Community Garden Management Database</Legend>
					<label id="Info">Check the table you wish to display</label>
					</br>
					</br>
					<input type="checkbox" name="community_gardens_checkbox">Community Gardens<br>
					<input type="checkbox" name="gardeners_checkbox" >Gardeners<br>
					<input type="checkbox" name="plots_checkbox" >Plots<br>
					<input type="checkbox" name="plants_checkbox" >Plants<br>
					<input type="submit"  id="submit" value="Display Table(s)">
				</fieldset>  
			</form>
		</div> 
		<div>
			<form method="post" action="add_row_setup.php"> 
				<fieldset id="add_row">
					<Legend id="legend_title">Add a Row</Legend>
					<label id="Info">Select table to add rows to</label>
					</br>
					</br>
					<input type="radio" name="add" value="community_gardens_add_radio">Community Gardens<br>
					<input type="radio" name="add" value="gardeners_add_radio" >Gardeners<br>
					<input type="radio" name="add" value="plots_add_radio" >Plots<br>
					<input type="radio" name="add" value="plants_add_radio" >Plants<br>
					<input type="submit"  id="submit" value="Add Row">
				</fieldset>  
			</form>
		</div> 
		<div>
			<form method="post" action="delete_row_setup.php"> 
				<fieldset id="delete_row">
					<Legend id="legend_title">Delete a Row</Legend>
					<label id="Info">Select table to delete rows from</label>
					</br>
					</br>
					<input type="radio" name="delete" value="community_gardens_delete_radio">Community Gardens<br>
					<input type="radio" name="delete" value="gardeners_delete_radio" >Gardeners<br>
					<input type="radio" name="delete" value="plots_delete_radio" >Plots<br>
					<input type="radio" name="delete" value="plants_delete_radio" >Plants<br>
					<input type="submit"  id="submit" value="Delete Row">
				</fieldset>  
			</form>
		</div> 
		<div>
			<form method="post" action="edit_setup.php"> 
				<fieldset id="edit">
					<Legend id="legend_title">Edit Table</Legend>
					<label id="Info">Select table to edit</label>
					</br>
					</br>
					<input type="radio" name="edit" value="community_gardens_edit_radio">Community Gardens<br>
					<input type="radio" name="edit" value="gardeners_edit_radio" >Gardeners<br>
					<input type="radio" name="edit" value="plots_edit_radio" >Plots<br>
					<input type="radio" name="edit" value="plants_edit_radio" >Plants<br>
					<input type="submit"  id="submit" value="Edit Table">
				</fieldset>  
			</form>
		</div> 
		
		<div>
			<form method="post" action="query.php"> 
				<fieldset id="edit">
					<Legend id="legend_title">Plant Search</Legend>
					<label id="Info">Find all gardens with the given plant</label>
					</br>
					</br>
					<input type="text" name="query" size="100" height="50" maxlength="100" value="Tomato">Enter plant name<br>
					<input type="submit"  id="submit" value="Result">
				</fieldset>  
			</form>
		</div> 
	</body>
</html>


