<?php
require_once "connect.php";
if (isset($_GET['id'])) {
     $id = $_GET['id'];
     $sql = "DELETE FROM `tours` WHERE `id` = '$id'";
     querySQL($sql);
     setcookie('notifi', 'delete success!!!', time() + 3600, '/');
     header('location: index.php');
}
