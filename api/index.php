<?php

require_once '../src/Route/Router.php';

$request_uri = $_SERVER['REQUEST_URI'];

Router::route($request_uri);
