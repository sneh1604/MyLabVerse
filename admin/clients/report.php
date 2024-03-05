<?php
// report.php

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Fetch user details based on the user ID
    $qry = $conn->query("SELECT * FROM `client_list` WHERE id = '{$userId}'");

    if ($qry->num_rows > 0) {
        $userDetails = $qry->fetch_assoc();
        // Render the user details
        ?>
        <div>
            <h4>User Details</h4>
            <p><strong>Name:</strong> <?php echo $userDetails['firstname'] . ' ' . $userDetails['middlename'] . ' ' . $userDetails['lastname']; ?></p>
            <p><strong>ID:</strong> <?php echo $userDetails['id']; ?></p>
            <p><strong>Gender:</strong> <?php echo $userDetails['gender']; ?></p>
            <p><strong>Contact:</strong> <?php echo $userDetails['contact']; ?></p>
            <p><strong>Email:</strong> <?php echo $userDetails['email']; ?></p>
            <p><strong>Date of Birth:</strong> <?php echo $userDetails['dob']; ?></p>
            <p><strong>Address:</strong> <?php echo $userDetails['address']; ?></p>
            <!-- Add any other fields you want to display -->
        </div>
        <?php
    } else {
        echo 'User not found.';
    }
} else {
    echo 'Invalid request.';
}
?>
