<!DOCTYPE html>
<html>
<head>
<h1>Items to be Reordered</h1>
<style type="text/css">
   table {
	margin: 8px;
	 }

	th {
	   font-family: Arial, Helvetica, sans-serif;
	   font-size: 1em;
	   background: #666;
	   color: #FFF;
	   padding: 5px 20px;
	   border-collapse: separate;
	   border: 1px solid #000;
	   }

	td {
	   font-family: Arial, Helvetica, sans-serif;
	   font-size: .7em;
	   border: 1px solid #DDD;
	   }
</style>
</head>
<body>
<?php

$dbhost = 'fdb1030.awardspace.net';
$dbuser = '4243171_inventorydb';
$dbpass = 'computer12!';
$dbname = '4243171_inventorydb';
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(! $conn ) {
   die('Could not connect: ' . mysqli_error());
	     }
             
$sql = "SELECT ProductID, ProductName FROM Inventory WHERE CurrentAmount < ReorderAmount";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

$display_string = "<table>";
$display_string .= "<tr>";
$display_string .= "<th>Product Id</th>";
$display_string .= "<th>Product Name</th>";
$display_string .= "</tr>";

while($row = mysqli_fetch_assoc($result)) {
   $display_string .= "<tr>";
   $display_string .= "<td>".$row["ProductID"]."</td>";
   $display_string .= "<td>".$row["ProductName"]."</td>";
   $display_string .= "</tr>";
}
$display_string .= "</table>";
   echo $display_string;
} else {
  echo "0 results";
}

mysqli_close($conn);
?>
</body>
</html>