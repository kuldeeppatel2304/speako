<?php

class Result {

    private $conn;
    private $table = "results";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Save result
    public function save($data) {

        // Validation
        if (
            !isset($data['paragraph_id']) ||
            !isset($data['spoken_text'])
        ) {
            return [
                "status" => "error",
                "message" => "Missing required fields"
            ];
        }

        $user_id = $data['user_id'] ?? null;
        $paragraph_id = (int)$data['paragraph_id'];
        $spoken_text = trim($data['spoken_text']);
        $accuracy = (float)($data['accuracy'] ?? 0);
        $fluency = (float)($data['fluency'] ?? 0);
        $grammar = (float)($data['grammar'] ?? 0);
        $total = (float)($data['total'] ?? 0);

        $stmt = $this->conn->prepare("
            INSERT INTO {$this->table}
            (user_id, paragraph_id, spoken_text, accuracy, fluency, grammar_score, total_score)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ");

        if (!$stmt) {
            return [
                "status" => "error",
                "message" => "Prepare failed"
            ];
        }

        $stmt->bind_param(
            "iissddd",
            $user_id,
            $paragraph_id,
            $spoken_text,
            $accuracy,
            $fluency,
            $grammar,
            $total
        );

        if ($stmt->execute()) {
            return [
                "status" => "success",
                "message" => "Result saved successfully"
            ];
        }

        return [
            "status" => "error",
            "message" => "Failed to save result"
        ];
    }

    // Get latest results
    public function getLatest($limit = 10) {

        $limit = (int)$limit;

        $stmt = $this->conn->prepare("
            SELECT r.*, p.content 
            FROM {$this->table} r
            JOIN paragraphs p ON r.paragraph_id = p.id
            ORDER BY r.created_at DESC
            LIMIT ?
        ");

        $stmt->bind_param("i", $limit);
        $stmt->execute();

        $result = $stmt->get_result();

        $data = [];

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return [
            "status" => "success",
            "data" => $data
        ];
    }

    // Get results by user (future use)
    public function getByUser($user_id) {

        $stmt = $this->conn->prepare("
            SELECT * FROM {$this->table}
            WHERE user_id = ?
            ORDER BY created_at DESC
        ");

        $stmt->bind_param("i", $user_id);
        $stmt->execute();

        $result = $stmt->get_result();

        $data = [];

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return [
            "status" => "success",
            "data" => $data
        ];
    }
}