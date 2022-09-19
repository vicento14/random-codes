<?php
include('../config/oop/mysqli_config.php');

$cellphone_number = "00000000000";
$account_id = "1";

// Create a prepared statement
$stmt1 = $conn -> stmt_init();

if ($stmt1 -> prepare("UPDATE `account_information` SET cellphone_number = ? WHERE account_id = ?;")) {
    // Bind parameters
    $stmt1 -> bind_param("ss", $cellphone_number, $account_id);

    // Execute query
    $stmt1 -> execute();

    // Close statement
    $stmt1 -> close();

} else {
    echo "Query Error : $stmt1->errno : $stmt1->error";
}

$conn -> close();
?>