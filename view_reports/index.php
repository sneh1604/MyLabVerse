<?php
// Start the session at the very beginning
session_start();

// Replace these values with your actual database details
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'odlms_db';

// Establish a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to fetch user reports from the database
function fetch_user_reports($userID, $userName) {
    global $conn; // Assuming you have a database connection variable

    $reports = array();

    // Fetch reports for the specified user from the database
    $query = $conn->prepare("SELECT * FROM `user_reports` WHERE `user_id` = ? AND `user_name` = ?");
    $query->bind_param("is", $userID, $userName);
    $query->execute();
    $result = $query->get_result();

    // Check if there are reports
    if ($result->num_rows > 0) {
        // Fetch the reports and store them in an array
        while ($row = $result->fetch_assoc()) {
            $reports[] = $row;
        }
    }

    // Close the database connection
    $query->close();

    return $reports;
}

// Example usage:
if (isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) {
    $userID = $_SESSION['user_id'];
    $userName = $_SESSION['user_name'];

    // Fetch user reports
    $reports = fetch_user_reports($userID, $userName);

    // Check if there are reports to display
    if ($reports) {
        // Loop through the reports and display them
        foreach ($reports as $report) {
            // Display report details, e.g., client_name, test_name, pdf_filename, created_at
            echo "Client: " . $report['client_name'] . "<br>";
            echo "Test: " . $report['test_name'] . "<br>";
            echo "PDF Filename: " . $report['pdf_filename'] . "<br>";
            echo "Created At: " . $report['created_at'] . "<br>";
            echo "<hr>";
        }
    } else {
        // No reports to display
        echo "No reports found.";
    }
} else {
    // User not logged in, redirect to login page or handle accordingly
    header("Location: login.php");
    exit();
}

// Close the database connection at the end of the script
$conn->close();
?>
