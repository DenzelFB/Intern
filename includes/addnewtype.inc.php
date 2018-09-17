<?php
/* Function addNewType
* Desc Adds a new shoe type and description to the
* ShoeType table. Checks for the new shoe type
* first and does not add it to the table if
* it is already there.
*/

function addNewType($shoeType,$typeDescription,$conn)

{
/* Check whether new category is in ShoeType table.
If it is not in table, add it to table. */
$query = "SELECT shoeType FROM ShoeType WHERE shoeType ='$shoeType'";

$result = mysqli_query($conn,$query) or die("Couldn’t execute select query");
$ntype = mysqli_num_rows($result); //
if ($ntype < 1) // if new type is not in table
{
$shoeType = ucfirst(strip_tags(trim($shoeType)));
$typeDescription = ucfirst(strip_tags(trim($typeDescription)));
$shoeType = mysqli_real_escape_string($conn,$shoeType);
$typeDescription = mysqli_real_escape_string($conn,$typeDescription);
$query="INSERT INTO ShoeType (shoeType,typeDescription)
VALUES ('$shoeType','$typeDescription')";
$result = mysqli_query($conn,$query) or die("Couldn’t execute insert query");
}
return;
} 
?>