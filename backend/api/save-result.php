<?php
header("Content-Type: application/json");

// Includes
include "../config.php";
include "../models/Result.php";

// Get JSON input
$data = json_decode(file_get_contents("php://input"), true);

// Validate input
if (!$data) {
    echo json_encode([
        "status" => "error",
        "message" => "Invalid input"
    ]);
    exit;
}

// Create object
$resultObj = new Result($conn);

// Save result using model
$response = $resultObj->save($data);

// Return JSON
echo json_encode($response);
exit;