<?php

include 'Dispatch_Item_Form.html';

$dbhost = 'fdb1030.awardspace.net';
$dbuser = '4243171_inventorydb';
$dbpass = 'computer12!';
$dbname = '4243171_inventorydb';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
    die('Could not connect: ' . mysqli_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pid = $_POST['pid'];
    $damount = $_POST['damount'];
    
    $sql = "SELECT * FROM Inventory WHERE ProductID = $pid";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 0) {
        echo "Product ID does not exist";
    } else {
        $sql = "UPDATE Inventory SET CurrentAmount = CurrentAmount - $damount WHERE ProductID = $pid";
        if(mysqli_query($conn, $sql)) {
            echo "Item dispatched successfully";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>