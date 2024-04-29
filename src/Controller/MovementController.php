<?php

require_once(PROJECT_ROOT . "/Database/Database.php");

class MovementController {
    private $conn;

    public function __construct() {
        $this->conn = new Database();
    }

    public function getMovementById($id) {
        $sql = "SELECT * FROM movement WHERE id = :id";
        $movements = $this->conn->executeQuery($sql, array(':id' => $id));

        echo json_encode($movements);
        return $movements ? json_encode($movements) : json_encode(["error" => "Movement not found"]);
    }

    public function getMovementByName($name) {
        $sql = "SELECT * FROM movement WHERE name = :name";
        $movements = $this->conn->executeQuery($sql, array(':name' => $name));

        echo json_encode($movements);
        return $movements ? json_encode($movements) : json_encode(["error" => "Movement not found"]);
    }

    public function getAllMovements() {
        $sql = "SELECT * FROM movement";
        $movements = $this->conn->executeQuery($sql);

        echo json_encode($movements);
        return $movements ? json_encode($movements) : json_encode(["error" => "No movements found"]);
    }

}
