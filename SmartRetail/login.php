<?php
session_start();

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $userType = trim($_POST['user_type']); // Retrieve user type from the form

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'vending_machine');

    // Check the connection
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Prepare the query to fetch the user data based on the username
    $query = $conn->prepare('SELECT * FROM user WHERE user_id = ?');
    $query->bind_param('s', $username);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        // Fetch the user data
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Set session variables for the logged-in user
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['email'] = $user['email'];

            // Redirect based on user type
            if ($userType === 'customer') {
                header('Location: smart_retail.html');
            } elseif ($userType === 'vendor') {
                header('Location: home1.html');
            } else {
                echo '<script>alert("Invalid user type selected.");</script>';
            }
            exit;
        } else {
            echo '<script>alert("Invalid password.");</script>';
        }
    } else {
        echo '<script>alert("No user found with that username.");</script>';
    }

    // Close the database connection
    $query->close();
    $conn->close();
} else {
    echo '<script>alert("Invalid request method.");</script>';
}
?>
