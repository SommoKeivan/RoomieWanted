<?php
// Include the bootstrap file to initialize the application
require_once("bootstrap.php");

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve username and password from the POST request
    $username = $_POST["username"] ?? '';
    $password = $_POST["password"] ?? '';

    // Validate the inputs
    if (empty($username) || empty($password)) {
        echo "invalid"; // Return "invalid" if either field is empty
        exit; // Exit to prevent further execution
    }

    // Check user credentials against the database
    $res = $dbh->checkCredentials($username, $password);
    
    // If the credentials are invalid, return "invalid"
    if ($res === null) {
        echo "invalid";
    } else {
        // Return user information or a success message
        echo $res; 
    }
} else {
    // Handle cases where the request method is not POST
    echo "invalid request"; // Return an error for invalid request method
}
?>
