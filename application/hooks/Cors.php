<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cors {
    public function enableCors() {
        header('Access-Control-Allow-Origin: *'); // Allow all origins or specify one
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            exit(0); // Stop further execution for preflight requests
        }
    }
}