<?php
include('db_con.php');
session_start();

// Define an empty variable to hold the error message
$error_message = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if both username and password are provided
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Retrieve username and password from the form
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Validate credentials by querying the database
        $query = "SELECT * FROM users WHERE username = ? AND password = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if a row is returned
        if ($result->num_rows == 1) {
            // Credentials are valid, redirect to dashboard.php
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
            exit;
        } else {
            // Invalid credentials, set error message
            $error_message = "Invalid username or password. Please try again.";
        }
    }
}
?>
<style>
  .error-message{
    color: red;
    font-size: 12px;
    text-align: center;
    align-items: center;
    display: flex;
  }
</style>

<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <link rel="shortcut icon" href="./img/logo-2.png" type="image/x-icon" />
    <meta name="theme-color" content="#2B2B35" />
    <link rel="stylesheet" href="css/plugins/bootstrap.min.css" />
    <link rel="stylesheet" href="css/plugins/font-awesome.min.css" />
    
    <link rel="stylesheet" href="css/login.css" />
    <title>Luche | Log In</title>
</head>
<body>
    <div class="container">
        <div class="brand-logo">
            <img src="./img/logo-2.png" alt="">
        </div>
        <div class="brand-title">USER LOGIN</div>
        <div class="inputs">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label>Username</label>
                <input type="text" name="username" placeholder="Username" />
                <label>Password</label>
                <input type="password" name="password" placeholder="Password" />
                <button type="submit">LOGIN</button>
                <!-- Display error message if present -->
                <?php if (!empty($error_message)) { ?>
                    <span class="error-message"><?php echo $error_message; ?></span>
                <?php } ?>
            </form>
        </div>
    </div>
</body>
</html>
