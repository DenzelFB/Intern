<?php
/* Program: addshoe.php
* Desc: Adds new shoe to the database. 
* A confirmation page is sent to the user.
*/

if (@$_POST['newbutton'] == "Cancel") 
{
header("Location: chooseshoecat.php");
} 

	include("includes/dbh.inc.php");
		$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName) 
		or die ("Couldn't connect to server");

			foreach($_POST as $field => $value) 
			{
			if(empty($value)) 
			{
			if($field == "shoeName" or $field == "shoeDescription")
			{
			$blank_array[] = $field;
			}
			}

				else 
			{
			if($field != "category")
			{
			if(!preg_match("/^[A-Za-z0-9., _-]+$/",$value))
			{
			$error_array[] = $field;
			}
			if($field == "newCat")
			{
			$clean_data['shoeType']=trim(strip_tags($value));
			}
			else
				{
				$clean_data[$field] = trim(strip_tags($value));
				}
				}
				}
				} 
				if(@sizeof($blank_array)>0 or @sizeof($error_array)>0) 
			{
			if(@sizeof($blank_array) > 0)
				{
					echo "<p><b>You must enter both shoe name and
					shoe description</b></p>\n";
				}
				if(@sizeof($error_array) > 0)	
			
				{
				echo "<p><b>The following fields have incorrect
				information. Only letters, numbers, spaces,
				underscores, and hyphens are allowed:</b><br
				/>\n";
					foreach($error_array as $value)
					{
					echo "&nbsp;&nbsp;$value<br />\n";
					}
				}

			extract((array)$clean_data);
			include("includes/newname_form.inc.php");
			exit();
			}
			foreach($clean_data as $field => $value) 	
	{
	if(!empty($value) and $field != "shoeColor") 
	{
	$fields_form[$field] =
	ucfirst(strtolower(strip_tags(trim($value))));
	$fields_form[$field] =
	mysqli_real_escape_string($conn,
	$fields_form[$field]);
	if($field == "price") 
	{
	$fields_form[$field] =
	(float) $fields_form[$field];
	}
	}
	if(!empty($_POST['shoeColor'])) 
{
$shoeColor = strip_tags(trim($_POST['shoeColor']));
$shoeColor = ucfirst(strtolower($shoeColor));
$shoeColor =
mysqli_real_escape_string($conn,$shoeColor);
}
	} 
?>


	<html>
	<head>
		<title>Add Shoe</title>
	</head>

	<body>
	<?php
	$field_array = array_keys($fields_form); 
	$fields=implode(",",$field_array); 
	$query = "INSERT INTO Shoe ($fields) VALUES ("; foreach($fields_form as $field => $value) 
	{
	if($field == "price")
	{
	$query .= "$value ,";
	}
	else
	{
	$query .= "'$value' ,";
	}
	} 
	$query .= ") "; 
	$query = preg_replace("/,\)/",")",$query); 
	$result = mysqli_query($conn,$query) 
	or die ("Couldn't execute query");
	$shoeID = mysqli_insert_id($conn); 
	$query = "SELECT * from Shoe WHERE shoeID='$shoeID'"; 
	$result = mysqli_query($conn,$query)
	or die ("Couldn't execute query.");

	$row = mysqli_fetch_assoc($result);
	extract($row);
	echo "The following shoe has been added to the
	Shoe Catalog:<br />
	<ul>
	<li>Category: $shoeType</li>
	<li>Shoe Name: $shoeName</li>
	<li>Shoe Description: $shoeDescription</li>
	<li>Price: \$$price</li>
	<li>Picture file: $pix</li>\n";
	if (@$shoeColor != "") 
	{
	$query = "SELECT shoeName FROM Color WHERE shoeName='$shoeName' AND shoeColor='$shoeColor'";
	$result = mysqli_query($conn,$query)
	or die("Couldn't execute query.");
	$num = mysqli_num_rows($result);
	if ($num < 1)
	{
	$query = "INSERT INTO Color (shoeName,shoeColor,pix) VALUES ('$shoeName','$shoeColor','$pix')";
	$result = mysqli_query($conn,$query)
	or die("Couldn't execute query.".mysqli_error($conn));
	echo "<li>Color: $shoeColor</li>\n";
	}
	}
	echo "</ul>\n";
	echo "<a href='chooseshoecat.php'>Add Another Shoe</a>\n";
	?>

</body>
</html>