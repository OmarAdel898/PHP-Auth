<?php
require_once 'Database.php';
require_once 'UserModel.php';

$db=Database::getInstance()->getConnection();
$userModel = new User($db);
?>