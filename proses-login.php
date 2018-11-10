<?php 
include 'config_db.php';
$db = new database();

$db->login($_POST['usname'], $_POST['pswd']);
?>