<?php

class Router {
    public static function route($request_uri) {

        define('PROJECT_ROOT', dirname(__DIR__));
        
        $request_uri = strtok($request_uri, '?');
        
        $user_pattern = '/\/users\/?$/';
        $user_id_pattern = '/\/user\/get_user_by_id\/(\d+)/';
        $user_name_pattern = '/\/user\/get_user_by_name\/(\w+)/';
        $movement_pattern = '/\/movements\/?$/';
        $movement_id_pattern = '/\/movement\/get_movement_by_id\/(\d+)/';
        $movement_name_pattern = '/\/movement\/get_movement_by_name\/(\w+)/';
        $record_pattern = '/\/records\/?$/';
        $record_id_pattern = '/\/record\/get_record_by_id\/(\d+)/';
        $rankings_pattern = '/\/record\/get_rankings\/?$/';
        $rankings_movement_pattern = '/\/record\/get_rankings_by_movement\/(\w+)/';
        
        if (preg_match($user_pattern, $request_uri)) {
            self::handleAllUsers();
        } elseif (preg_match($user_id_pattern, $request_uri, $matches)) {
            self::handleUserById($matches[1]);
        } elseif (preg_match($user_name_pattern, $request_uri, $matches)) {
            self::handleUserByName($matches[1]);
        } elseif (preg_match($movement_id_pattern, $request_uri, $matches)) {
            self::handleMovementById($matches[1]);
        } elseif(preg_match($movement_pattern, $request_uri)) {
            self::handleAllMovements();
        } elseif (preg_match($movement_name_pattern, $request_uri, $matches)) {
            self::handleMovementByName($matches[1]);
        } elseif (preg_match($record_pattern, $request_uri, $matches)) {
            self::handleAllRecords();
        } elseif (preg_match($record_id_pattern, $request_uri, $matches)) {
            self::handleRecordById($matches[1]);
        } elseif (preg_match($rankings_pattern, $request_uri, $matches)) {
            self::handleRanking();
        } elseif (preg_match($rankings_movement_pattern, $request_uri, $matches)) {
            self::handleRankingByMovement($matches[1]);
        } else {
            self::handleNotFound();
        }
    }
    
    private static function handleAllUsers() {
        require PROJECT_ROOT . "/Controller/UserController.php";
        $controller = new UserController();
        $controller->getAllUsers();
    }

    private static function handleUserById($user_id) {
        require PROJECT_ROOT . '/Controller/UserController.php';
        $controller = new UserController();
        $controller->getUserById($user_id);
    }
    
    private static function handleUserByName($user_name) {
        require PROJECT_ROOT . '/Controller/UserController.php';
        $controller = new UserController();
        $controller->getUserByName($user_name);
    }
    
    private static function handleAllMovements() {
        require PROJECT_ROOT . '/Controller/MovementController.php';
        $controller = new MovementController();
        $controller->getAllMovements();
    }

    private static function handleMovementById($movement_id) {
        require PROJECT_ROOT . '/Controller/MovementController.php';
        $controller = new MovementController();
        $controller->getMovementById($movement_id);
    }
    
    private static function handleMovementByName($movement_name) {
        require PROJECT_ROOT . '/Controller/MovementController.php';
        $controller = new MovementController();
        $controller->getMovementByName($movement_name);
    }

    private static function handleAllRecords() {
        require PROJECT_ROOT . '/Controller/RecordController.php';
        $controller = new RecordController();
        $controller->getAllRecords();
    }

    private static function handleRecordById($record_id) {
        require PROJECT_ROOT . '/Controller/RecordController.php';
        $controller = new RecordController();
        $controller->getRecordById($record_id);
    }

    private static function handleRanking() {
        require PROJECT_ROOT . '/Controller/RecordController.php';
        $controller = new RecordController();
        $controller->getAllRankings();
    }

    private static function handleRankingByMovement($movement_name) {
        require PROJECT_ROOT . '/Controller/RecordController.php';
        $controller = new RecordController();
        $controller->getRankingByMovement($movement_name);
    }
    
    private static function handleNotFound() {
        http_response_code(404);
        include "../api/error.html";
    }
}


