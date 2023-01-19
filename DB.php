<?php
session_start();

if (!isset($_SESSION['username'])) {
    // User is not logged in, redirect to login page
    header('Location: index.php');
    exit();
}

$username = $_SESSION['username'];
$name = $users[$username]['name'];

?>
<!DOCTYPE html>
<html>
<head>
  <title>User Portal</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div id="container">
    <div id="header">
      <h1>User Portal</h1>
    </div>
    <div id="content">
      <h2>Welcome, <?php echo $name; ?>!</h2>
      <a href="logout.php">Logout</a>
    </div>
  </div>
