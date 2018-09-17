<?php
/* Program name: newname_form.inc
* Description: Script displays a form that asks for
* the new shoe information.
*/

$labels = array(
"shoeName" => "Shoe Name: ",
"shoeDescription" => "Shoe Description: ",
"price" => "Price:",
"pix" => "Picture file name: ",
"shoeColor" => "Shoe color (optional):");
if(isset($_POST['category'])) 
{
$category = $_POST['category'];
} else
{
$category = $_POST['newCat'];
} 
?>

<html>
	<head>
		<title>New Shoe Information Form</title>
			<style type='text/css'>
			<!--
			form { margin: 1em; padding: 0; }
			.field { padding-top: .5em; }
			label { font-weight: bold; float: left; width: 18%;
			margin-right: 1em; text-align: right; }
			#submit { margin-top: 1em; )
			-->
			</style>
	</head>

		<body>
			<form action="addshoe.php" method="post">
				<?php
				echo "<h4>Shoe Information</h4>"; 
				echo "<div class='field'> <label>Shoe Category:</label>
				<b>$category</b></div>\n";
				foreach($labels as $field => $label)
				{
				echo "<div class='field'>
				<label for='$field'>$label</label>
				<input type='text' name='$field' id='$field'
				size='65' maxlength='65'
				value='".@$$field."' /></div>\n";
				}
				?>

				<div id="submit">
					<input type='hidden' name='newCat'
					value='<?php echo $category ?>' />
						<input type='submit' value='Submit Shoe' />
							<input type='submit' name='newbutton' value='Cancel' />
				</div> 

			</form>
		</body>
</html>