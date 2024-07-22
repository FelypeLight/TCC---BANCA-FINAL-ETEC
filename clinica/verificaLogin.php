<?php
session_start();
if(!isset($userId) || $userId !== true ){
    header("location: login.php");
    exit;
}
?>