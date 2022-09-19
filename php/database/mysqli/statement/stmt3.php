<?php
include('../config/oop/mysqli_config.php');

$account_id = 0;

// Create a prepared statement
$stmt3 = $conn -> stmt_init();

if ($stmt3 -> prepare("SELECT account_id FROM `accounts` ORDER BY account_id DESC LIMIT 1;")) {
    // Execute query
    $stmt3 -> execute();

    // Fetch values
    $result = $stmt3 -> get_result();
    $numRows = $result -> num_rows;
    if ($numRows > 0) {
        while($row = $result -> fetch_assoc()){
            $account_id = intval($row['account_id']);
        }
    }

    // Close statement
    $stmt3 -> close();

    $account_id++;

} else {
    echo "Query Error : $stmt3->errno : $stmt3->error";
}

$conn -> close();
?>