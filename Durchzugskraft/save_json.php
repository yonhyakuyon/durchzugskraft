<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['json'])) {
    $jsonData = json_decode($_POST['json'], true);
    if ($jsonData) {
        $_SESSION['json_data'] = $jsonData;
        echo json_encode(["status" => "success", "message" => "JSON saved to session"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid JSON data"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "No JSON data received"]);
}