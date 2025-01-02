<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $userId = trim($_POST['user_id']);
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);
  $confirmPassword = trim($_POST['confirm_password']);
  $userType = trim($_POST['user_type']);

  // Check if password and confirm password match
  if ($password !== $confirmPassword) {
    echo '<script>alert("Passwords do not match.");</script>';
    exit;
  }

  // Database connection
  $conn = new mysqli('localhost', 'root', '', 'vending_machine');

  if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
  }

  // Check if the user already exists
  $query = $conn->prepare('SELECT * FROM users WHERE user_id = ? OR email = ?');
  $query->bind_param('ss', $userId, $email);
  $query->execute();
  $result = $query->get_result();

  if ($result->num_rows > 0) {
    echo '<script>alert("User ID or Email already exists.");</script>';
  } else {
    // Insert user into the database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $insert = $conn->prepare('INSERT INTO user (user_id, email, password, user_type) VALUES (?, ?, ?, ?)');
    $insert->bind_param('ssss', $userId, $email, $hashedPassword, $userType);

    if ($insert->execute()) {
      // Redirect based on user type
      if ($userType === 'customer') {
        header("Location: smart_retail.html");
      } elseif ($userType === 'vendor') {
        header("Location: home1.html");
      }
      exit;
    } else {
      echo '<script>alert("Error: Could not sign up. Please try again.");</script>';
    }

    $insert->close();
  }

  $query->close();
  $conn->close();
}
?>
