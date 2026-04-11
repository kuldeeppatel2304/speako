<?php

class Paragraph {

    private $conn;
    private $table = "paragraphs";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getRandom() {

        $sql = "SELECT id, content FROM {$this->table} ORDER BY RAND() LIMIT 1";
        $result = $this->conn->query($sql);

        if ($result && $result->num_rows > 0) {
            return [
                "status" => "success",
                "data" => $result->fetch_assoc()
            ];
        }

        return [
            "status" => "error",
            "message" => "No paragraph found"
        ];
    }
}