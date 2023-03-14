<?php

include 'Add_New_Item_Form.html';

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
    $pname = $_POST['pname'];
    $uprice = $_POST['uprice'];
    $camount = $_POST['camount'];
    $ramount = $_POST['ramount'];
    
    $sql = "SELECT ProductID FROM Inventory WHERE ProductID = '$pid'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        
        echo "Product ID already exists";
    } elseif (empty($pid) || empty($pname) || empty($uprice) || empty($camount) || empty($ramount)) {
       
        echo "Please fill out all fields";
    } else {
        
        $sql = "INSERT INTO Inventory (ProductID, ProductName, UnitPrice, CurrentAmount, ReorderAmount) VALUES ('$pid', '$pname', '$uprice', '$camount', '$ramount')";
    
        if(mysqli_query($conn, $sql)) {
            echo "Item added successfully";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
mysqli_close($conn);
?>