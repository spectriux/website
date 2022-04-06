<?php
session_start();
$url = '/site/login-page.php';
if (!isset($_SESSION['userId']))
{
  if ($url != $_SERVER['SCRIPT_NAME']) {
    header('Location: login-page.php');
  }
}
