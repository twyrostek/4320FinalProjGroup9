<?php
if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS'])
{ // if request is not secure, redirect to secure url
     $url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
     header('Location: ' . $url);
}
session_start();
session_unset();
session_destroy();
$_POST = array();
header("Location: index.php");
?>
