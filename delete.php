<?php
include('./core/functions.php');
session_start();
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['id']))
    {
        $allData = json_decode(file_get_contents('./data.json'),true);
        
        unset($allData[$_GET['id']]);

        $allData = array_values($allData);
        file_put_contents('./data.json', json_encode($allData));
        $_SESSION['success'][] = "student deleted successfully";
        redirect('./profile.php');
        die;
    }
}