<?php
/* Program: shoecatalog.php
* Desc: Displays a list of shoe categories from the
* ShoeType table. Includes descriptions.
* Displays radio buttons for user to check.
*/
?>

<html>
<head><title>Shoe Types</title></head>
<body>

<?php
include("includes/dbh.inc.php"); 
$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName) 
or die ("couldn't connect to server");

/* Select all categories from PetType table */
$query = "SELECT * FROM ShoeType ORDER BY shoeType"; 
$result = mysqli_query($conn,$query)
or die ("Couldn't execute query."); 

/* Display text before form */
echo "<div style='margin-left: .1in'>
<h1 style='text-align: center'>Shoe Catalog</h1>
<h2 style='text-align: center'>The following shoes are selected for you.</h2>
<p style='text-align: center'>Find just what you want and hurry in to the store to pick up your new shoe.</p>
<h3>Which shoes are you interested in?</h3>";

/* Create form containing selection list */
echo "<form action='showshoes.php' method='POST'>"; 
echo "<table cellpadding='5' border='1'>";
$counter= 1; 

while($row = mysqli_fetch_assoc($result)) 
{
	extract($row); 
	echo "<tr><td valign='top' width='15%'
				style='font-weight: bold;
				font-size: 1.2em'";
	echo "<input type='radio' name='interest' 
				value='$shoeType'"; 

	if( $counter == 1 ) 
{
echo "checked='checked'";
}
echo ">$shoeType</td>"; 
echo "<td>$typeDescription</td></tr>"; 
$counter ++; 
}
echo "</table>";
echo "<p><input type='submit' value='Select Shoe Type'> </form></p>"; 
?>

</div>
</body>
</html>