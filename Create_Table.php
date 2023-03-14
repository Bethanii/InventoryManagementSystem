<?php

$dbhost = 'fdb1030.awardspace.net';
$dbuser = '4243171_inventorydb';
$dbpass = 'computer12!';
$dbname = '4243171_inventorydb';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
    die('Could not connect: ' . mysqli_error());
}

echo 'Connected successfully' . "<br>";

$sql = "CREATE TABLE Inventory (
    ProductID INT(5) PRIMARY KEY,
    ProductName VARCHAR(30) NOT NULL,
    UnitPrice DECIMAL(10,2),
    CurrentAmount INT(6),
    ReorderAmount INT(6)
)";

if (mysqli_query($conn, $sql)) {
    echo "Table created successfully";
} else {
    echo "Error in table creation: " . mysqli_error($conn);
}

mysqli_close($conn);
?>