<?php
function sendResponse($data, $status = "success") {
    echo json_encode([
        "status" => $status,
        "data" => $data
    ]);
    exit;
}

function sendError($message) {
    echo json_encode([
        "status" => "error",
        "message" => $message
    ]);
    exit;
}
?>