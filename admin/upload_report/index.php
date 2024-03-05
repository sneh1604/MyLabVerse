<?php
require_once('C:\xampp\htdocs\odlms\config.php'); // Adjust the path accordingly
require_once('C:\xampp\htdocs\odlms\admin\upload_report\functions.php'); // Include the functions file

// Fetch clients and tests from the database
$clients = fetch_clients(); // You need to implement this function
$tests = fetch_tests(); // You need to implement this function

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assume $pdfContent is obtained from the uploaded file
    $pdfContent = file_get_contents($_FILES['report']['tmp_name']);

    // Get other form data
    $clientId = $_POST['client']; // Assuming the id is selected in the dropdown
    $clientName = get_client_name_by_id($clientId); // You need to implement this function
    $testId = $_POST['test']; // Assuming the id is selected in the dropdown
    $testName = get_test_name_by_id($testId); // You need to implement this function
    $pdfFilename = $_FILES['report']['name'];

    // Save the report to the database
    if (save_report_to_database($clientName, $testName, $pdfContent, $pdfFilename)) {
        // Report saved successfully
        echo "Report uploaded successfully.";
    } else {
        // Failed to save the report
        echo "Failed to upload the report.";
    }
}
?>

<div class="container-fluid">
    <form action="" method="post" enctype="multipart/form-data" id="upload-report-form">
        <div class="form-group">
            <label for="client">Select Client:</label>
            <select name="client" id="client" class="form-control form-control-sm" required>
                <option value="" disabled selected>Select Client</option>
                <?php foreach ($clients as $client) : ?>
                    <option value="<?= $client['id'] ?>"><?= $client['firstname'] . ' ' . $client['lastname'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="test">Select Test:</label>
            <select name="test" id="test" class="form-control form-control-sm" required>
                <option value="" disabled selected>Select Test</option>
                <?php foreach ($tests as $test) : ?>
                    <option value="<?= $test['id'] ?>"><?= $test['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="report">Test Report (PDF only):</label>
            <input type="file" name="report" id="report" class="form-control form-control-sm form-control-border" accept="application/pdf" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload Report</button>
    </form>
</div>
