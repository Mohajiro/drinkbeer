<?php
require_once 'app/Database.php';

$db = Database::getInstance()->getConnection();

if ($db) {
    echo "Connected successfully!";
} else {
    echo "Connection failed.";
}