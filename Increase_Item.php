<?php

include 'Increase_Item_Form.html';

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
    $iamount = $_POST['iamount'];
    
    if (empty($pid) || empty($iamount)) {
    
        echo "Please provide input for both fields";
        
    } else {
    
        $check_sql = "SELECT ProductID FROM Inventory WHERE ProductID = $pid";
        $result = mysqli_query($conn, $check_sql);
        
        if (mysqli_num_rows($result) == 0) {
            echo "Product ID does not exist";
        } else {
        $sql = "UPDATE Inventory SET CurrentAmount = CurrentAmount + $iamount WHERE ProductID = $pid";
        
        if(mysqli_query($conn, $sql)) {
            echo "Item increased successfully";
        } else {
            echo "Error: " . mysqli_error($conn);
            }
        }
    }
}
mysqli_close($conn);
?> 