<?php

require_once(PROJECT_ROOT . "/Database/Database.php");

class RecordController {
    private $conn;

    public function __construct() {
        $this->conn = new Database();
    }

    public function getRecordById($id) {
        $sql = "SELECT * FROM personal_record WHERE id = :id";
        $records = $this->conn->executeQuery($sql, array(':id' => $id));

        echo json_encode($records);
        return $records ? json_encode($records) : json_encode(["error" => "Record not found"]);
    }

    public function getAllRecords() {
        $sql = "SELECT * FROM personal_record";
        $records = $this->conn->executeQuery($sql);

        echo json_encode($records);
        return $records ? json_encode($records) : json_encode(["error" => "No records found"]);
    }

    public function getAllRankings() {

        $sql = "SELECT 
                movement.name as movement_name, 
                personal_record.date, 
                MAX(personal_record.value) as max_value, 
                user.name as user_name 
                FROM personal_record 
                LEFT JOIN user ON user_id=user.id
                LEFT JOIN movement ON movement_id=movement.id
                GROUP BY user.name, movement.name
                ORDER BY max_value DESC, movement_name ASC";
        $rankings = $this->conn->executeQuery($sql);

        $position = 0;
        $previous_max_value = null;
        $previous_movement_name = null;

        foreach( $rankings as &$ranking ) {
            
            if ($ranking["movement_name"] !== $previous_movement_name) {
                $position = 0; 
                $previous_max_value = null; 
                $previous_movement_name = $ranking["movement_name"]; 
            }
        
            if ($ranking["max_value"] !== $previous_max_value) {
                $position++;
                $previous_max_value = $ranking["max_value"];
            }
        
            $ranking['position'] = $position;
        }
       
        echo json_encode($rankings);
        return $rankings ? json_encode($rankings) : json_encode(["error" => "No rankings found"]);
    }

    public function getRankingByMovement($movement_name) {

        $movement_name = str_replace("_", " ", $movement_name);

        $sql = "SELECT 
                movement.name as movement_name, 
                personal_record.date, 
                MAX(personal_record.value) as max_value, 
                user.name as user_name 
                FROM personal_record 
                LEFT JOIN user ON user_id=user.id
                LEFT JOIN movement ON movement_id=movement.id
                WHERE movement.name = :name
                GROUP BY user.name, movement.name
                ORDER BY max_value DESC, movement_name ASC";
        $rankings = $this->conn->executeQuery($sql, array(':name' => $movement_name));
        
        $position = 0;
        $previous_max_value = null;
        $previous_movement_name = null;

        foreach( $rankings as &$ranking ) {
            
            if ($ranking["movement_name"] !== $previous_movement_name) {
                $position = 0; 
                $previous_max_value = null; 
                $previous_movement_name = $ranking["movement_name"]; 
            }
        
            if ($ranking["max_value"] !== $previous_max_value) {
                $position++;
                $previous_max_value = $ranking["max_value"];
            }
        
            $ranking['position'] = $position;
        }

        echo json_encode($rankings);
        return $rankings ? json_encode($rankings) : json_encode(["error" => "No rankings found"]);
    }

}
