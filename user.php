<?php
session_start();

// Database of registered users (normally this would be stored in a database)
$users = array(
    'user1' => array('password' => '5f4dcc3b5aa765d61d8327deb882cf99', 'name' => 'John Smith'),
    'user2' => array('password' => '5f4dcc3b5aa765d61d8327deb882cf99', 'name' => 'Jane Doe')
);

if (isset($_SESSION['username'])) {
    // User is logged in, redirect to home page
    header('Location: home.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($users[$username]) && $users[$username]['password'] == md5($password)) {
        // Login successful, create session
        $_SESSION['username'] = $username;
        header('Location: home.php');
        exit();
    } else {
        // Login failed, redirect to login page
        header('Location: index.php');
        exit();
    }
}

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
      <form action="index.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <input type="submit" value="Login">
      </form>
    </div>
  </div>
</body>
</html>
