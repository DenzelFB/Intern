<?php
/* Program: chooseshoeName.php
* Desc: Allows the user to enter the information
* for the new shoe. If the category is new,
* it's entered into the database.
*/

if(@$_POST['newbutton'] == "Return to category page" or @$_POST['newbutton'] == "Cancel")

{
header("Location: chooseshoecat.php");
} 

include("includes/dbh.inc.php");
include("includes/addnewtype.inc.php"); 
$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName) 
or die ("Couldn't connect to server");

/* If new was selected for shoe category, check if
category name and description were filled in. */
if(trim($_POST['category']) == "new") 
{
$_POST['category']=trim($_POST['newCat']); 
if(empty($_POST['newCat']) 
or empty($_POST['newDesc']) )
{
include("includes/newcat_form.inc.php"); 
exit(); 
}
else 
{ 
addNewType($_POST['newCat'],$_POST['newDesc'],$conn);
}
} 
include("includes/newname_form.inc.php"); 
?>