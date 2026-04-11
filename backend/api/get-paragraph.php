<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

header("Content-Type: application/json");

// FORCE correct path
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../models/Paragraph.php';

// DEBUG
if (!file_exists(__DIR__ . '/../models/Paragraph.php')) {
    echo json_encode(["error" => "File not found"]);
    exit;
}

if (!class_exists('Paragraph')) {
    echo json_encode(["error" => "Class not loaded"]);
    exit;
}

// Run
$paragraph = new Paragraph($conn);
$result = $paragraph->getRandom();

echo json_encode($result);