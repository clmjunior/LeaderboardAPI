<?php

require_once(PROJECT_ROOT . "/Database/Database.php");

class UserController {
    private $conn;

    public function __construct() {
        $this->conn = new Database();
    }

    public function getUserById($id) {
        $sql = "SELECT * FROM user WHERE id = :id";
        $users = $this->conn->executeQuery($sql, array(':id' => $id));

        echo json_encode($users);
        return $users ? json_encode($users) : json_encode(["error" => "User not found"]);
    }

    public function getUserByName($name) {
        $sql = "SELECT * FROM user WHERE name = :name";
        $users = $this->conn->executeQuery($sql, array(':name' => $name));

        echo json_encode($users);
        return $users ? json_encode($users) : json_encode(["error" => "User not found"]);
    }

    public function getAllUsers() {
        $sql = "SELECT * FROM user";
        $users = $this->conn->executeQuery($sql);

        echo json_encode($users);
        return $users ? json_encode($users) : json_encode(["error" => "No users found"]);
    }

}

