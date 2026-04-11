<?php
header("Content-Type: application/json");

include "../config.php";
include "../helpers/response.php";

$sql = "SELECT r.*, p.content 
        FROM results r
        JOIN paragraphs p ON r.paragraph_id = p.id
        ORDER BY r.created_at DESC
        LIMIT 10";

$result = $conn->query($sql);

$data = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

sendResponse($data);
?>