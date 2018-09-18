<?php
/* Program: showshoes.php
* Desc: Displays all the shoes in a category.
* Category is passed in a variable from a
* form. The information for each shoe is
* displayed on a single line, unless the shoe
* comes in more than one color. If the shoe
* comes in colors, a single line is displayed
* without a picture, and a line for each color,
* with pictures, is displayed following the
* single line. Small pictures are displayed,
* which are links to larger pictures.
*/
?>


<html>
<head>
	<title>Shoe Catalog</title>
</head>
<body>

<?php
include("includes/dbh.inc.php");

$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName)
or die ("couldn't connect to server");

/* Select shoes of the given type */
$query = "SELECT * FROM Shoe WHERE shoeType=\"{$_POST['interest']}\""; 
$result = mysqli_query($conn,$query)
or die ("Couldn't execute query.");

/* Display results in a table */
echo "<table cellspacing='10' border='0' cellpadding='0'
width='100%''>";

echo "<tr><td colspan='5' style='text-align: right'>
Click on any picture to see a larger
version. <hr /></td></tr>\n";
while($row = mysqli_fetch_assoc($result)) 
{
$f_price = number_format($row['price'],2);

/* check whether shoe comes in colors */
$query = "SELECT * FROM Color WHERE shoeName='{$row['shoeName']}'"; 
$result2 = mysqli_query($conn,$query)
or die(mysqli_error($conn));
$ncolors = mysqli_num_rows($result2);

/* display row for each shoe */
echo "<tr>\n";
echo " <td>{$row['shoeID']}</td>\n";
echo " <td style='font-weight: bold;
font-size: 1.1em'>{$row['shoeName']}</td>\n";
echo " <td>{$row['shoeDescription']}</td>\n";

/* display picture if shoe does not come in colors */
if( $ncolors <= 1 ) 
{
echo "<td><a href='../images/{$row['pix']}'
border='0'>
<img src='../images/{$row['pix']}'
border='0' width='100' height='80' />
</a></td>\n";
}
echo "<td align='center'>\$$f_price</td>\n
</tr>\n";

/* display row for each color */
if($ncolors > 1 ) 
{
while($row2 = mysqli_fetch_assoc($result2)) 
{
echo "<tr><td colspan=2>&nbsp;</td>
<td>{$row2['shoeColor']}</td>
<td><a href='../images/{$row2['pix']}'
border='0'>
<img src='../images/{$row2['pix']}'
border='0' width='100'

height='80' /></a></td>\n";
}
}
echo "<tr><td colspan='5'><hr /></td></tr>\n";
}
echo "</table>\n";
echo "<div style='text-align: center'>
<a href='shoecatalog.php'>
<h3>See more shoes</h3></a></div>";
?>

</body>
</html>