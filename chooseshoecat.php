<?php
/* Program: chooseshoeCat.php
* Desc: Allows users to select a shoe type. All the
* existing shoe types from the PetType table
* are displayed with radio buttons. A section
* to enter a new shoe type is provided.
*/
?>

<html>
	<head>
  		<title>Shoe Categories</title>
			<style type='text/css'>
			<!--
			#new { border: thin solid; margin: 1em 0; padding: 1em;
			}
			#radio { padding-bottom: 1em; }
			.field { padding-top: .5em; }
			label { font-weight: bold ; }
			#new label { width: 20%; float: left;
			margin-right: 1em; text-align: right; }
			input { margin-left: 1em; }
			#new input { margin-left: 0 }
			-->
			</style>
	</head>

<body style='margin: 1em'>
	<h3>Select a category for the shoe you're adding.</h3>
		<p>If you are adding a shoe in a category that is not
		listed, choose <b>New Category</b> and type the
		name and description of the category. Press
		<b>Submit Category</b> when you have finished
		selecting an existing category or typing a new
		category.</p>

<?php
include("includes/dbh.inc.php");
	$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName)
		or die ("couldn't connect to server");
			$query="SELECT shoeType FROM ShoeType ORDER BY shoeType"; 
				$result = mysqli_query($conn,$query)
		or die ("Couldn't execute query.");

	/* Display form for selecting shoe type */
	echo "<form action='chooseshoename.php'
	method='post'>";
		$counter=0; 
			while($row = mysqli_fetch_assoc($result)) 
				{
				extract($row);
					echo "<label><input type='radio' name='category' 
						value='$shoeType'";
			if($counter == 0) 
				{
				echo " checked='checked'";
				}
				echo " />$shoeType </label>"; 
				$counter++; 
				}
?>

<div id="new"> 
<div id="radio">
<label for="category">New Category</label>
<input type="radio" name="category" id="category"
value="new" />
</div>

<div class="field">
<label for="newCat">Category name: </label>
<input type="text" name="newCat" size="20"
id="newCat" maxlength="20" /></div>
<div class="field">
<label for="newDesc">Category description: </label>
<input type="text" name="newDesc" id="newDesc"
size="70%" maxlength="255" /></div>
</div>

<input type='submit' value='Submit Category' />
</form>
</body>
</html>