<?php
include('../config/oop/mysqli_config.php');

$old_account_photo_filename = "";
$account_id = "1";

// Create a prepared statement
$stmt2 = $conn -> stmt_init();

if ($stmt2 -> prepare("SELECT account_photo_filename FROM `accounts` WHERE account_id = ?;")) {
    // Bind parameters
    $stmt2 -> bind_param("s", $account_id);

    // Execute query
    $stmt2 -> execute();

    // Fetch values
    $result = $stmt2 -> get_result();
    while($row = $result -> fetch_assoc()){
        $old_account_photo_filename = $row['account_photo_filename'];
    }

    // Close statement
    $stmt2 -> close();

} else {
    echo "Query Error : $stmt2->errno : $stmt2->error";
}

$conn -> close();
?>