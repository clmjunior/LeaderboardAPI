<?php

require_once(PROJECT_ROOT . "/Database/config.php");

class Database {

    public $conn;

    public function __construct() {
        $this->setDBConnection();
    }

    private function setDBConnection() {
        try {
            $conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->conn = $conn;
        } catch(PDOException $e) {
            $error_message = 'ERROR: ' . $e->getMessage();
            $response = ['error' => $error_message];
            echo json_encode($response);
            return null;
        }
    }

    public function getDBConnection() {
        return $this->conn;
    }

    public function executeQuery($sql, $params = array()) {
        try {
            $stmt = $this->getDBConnection()->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $error_message = 'ERROR: ' . $e->getMessage();
            $response = ['error' => $error_message];
            echo json_encode($response);
            return null;
        }
    }

}