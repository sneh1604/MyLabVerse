<?php
// dynamic_form_script.php

// Check if the test_id parameter is set
if (isset($_GET['test_id'])) {
    $testId = $_GET['test_id'];

    // Based on the test_id, load the corresponding dynamic form
    switch ($testId) {
        case '8': // Assuming test_id 1 corresponds to the Hemogram test
            generateHemogramForm();
            break;
        // Add cases for other tests as needed
        // case '2': // Another test
        //    generateAnotherTestForm();
        //    break;
        default:
            echo "No form available for the selected test.";
            break;
    }
} else {
    echo "Test ID not provided.";
}

// Function to generate the Hemogram test form
function generateHemogramForm()
{
    ?>
    <div class="form-group">
        <label for="client_name">Client Name:</label>
        <input type="text" class="form-control" id="client_name" name="client_name" placeholder="Enter Client Name">
    </div>
    
    <div class="form-group">
        <h5>Blood Counts:</h5>

        <div class="form-group">
            <label for="hemoglobin">Hemoglobin:</label>
            <input type="text" class="form-control" id="hemoglobin" name="hemoglobin" placeholder="Enter Hemoglobin">
        </div>
        <div class="form-group">
            <label for="rbcCount">Total R.B.C. Count:</label>
            <input type="text" class="form-control" id="rbcCount" name="rbc_count" placeholder="Enter Total R.B.C. Count">
        </div>
        <div class="form-group">
            <label for="wbcCount">W.B.C. Count:</label>
            <input type="text" class="form-control" id="wbcCount" name="wbc_count" placeholder="Enter W.B.C. Count">
        </div>
        <div class="form-group">
            <label for="plateletCount">Platelet Count:</label>
            <input type="text" class="form-control" id="plateletCount" name="platelet_count" placeholder="Enter Platelet Count">
        </div>

        <!-- Heading for Differential Count -->
        <h5>Differential Count:</h5>
        
        <!-- Labels and input fields for Differential Count -->
        <div class="form-group">
            <label for="polymorphs">Polymorphs:</label>
            <input type="text" class="form-control" id="polymorphs" name="polymorphs" placeholder="Enter Polymorphs">
        </div>
        <div class="form-group">
            <label for="lymphocytes">Lymphocytes:</label>
            <input type="text" class="form-control" id="lymphocytes" name="lymphocytes" placeholder="Enter Lymphocytes">
        </div>
        <div class="form-group">
            <label for="eosinophils">Eosinophils:</label>
            <input type="text" class="form-control" id="eosinophils" name="eosinophils" placeholder="Enter Eosinophils">
        </div>
        <div class="form-group">
            <label for="monocytes">Monocytes:</label>
            <input type="text" class="form-control" id="monocytes" name="monocytes" placeholder="Enter Monocytes">
        </div>
        <div class="form-group">
            <label for="basophils">Basophils:</label>
            <input type="text" class="form-control" id="basophils" name="basophils" placeholder="Enter Basophils">
        </div>

        <!-- Heading for Blood Indices -->
        <h5>Blood Indices:</h5>
        
        <!-- Labels and input fields for Blood Indices -->
        <div class="form-group">
            <label for="pcv">P.C.V.:</label>
            <input type="text" class="form-control" id="pcv" name="pcv" placeholder="Enter P.C.V.">
        </div>
        <div class="form-group">
            <label for="mcv">M.C.V.:</label>
            <input type="text" class="form-control" id="mcv" name="mcv" placeholder="Enter M.C.V.">
        </div>
        <div class="form-group">
            <label for="mch">M.C.H.:</label>
            <input type="text" class="form-control" id="mch" name="mch" placeholder="Enter M.C.H.">
        </div>
        <div class="form-group">
            <label for="mchc">M.C.H.C.:</label>
            <input type="text" class="form-control" id="mchc" name="mchc" placeholder="Enter M.C.H.C.">
        </div>
        <div class="form-group">
            <label for="rdw">R.D.W.:</label>
            <input type="text" class="form-control" id="rdw" name="rdw" placeholder="Enter R.D.W.">
        </div>

        <!-- Heading for Smear Study -->
        <h5>Smear Study:</h5>
        
        <!-- Labels and input fields for Smear Study -->
        <div class="form-group">
            <label for="rbcs">R.B.C.s:</label>
            <select class="form-control" id="rbcs" name="rbcs">
            <option value="high">High</option>
            <option value="normal">Normal</option>
            <option value="low">Low</option>
        </select>
        </div>
        <div class="form-group">
            <label for="wbcs">W.B.C.s:</label>
            <select class="form-control" id="wbcs" name="wbcs">
            <option value="high">High</option>
            <option value="normal">Normal</option>
            <option value="low">Low</option>
        </select>
        </div>
        <div class="form-group">
            <label for="plateletOption">Platelet Option:</label>
            <select class="form-control" id="plateletOption" name="platelet_option">
                <option value="high">High</option>
                <option value="normal">Normal</option>
                <option value="low">Low</option>
            </select>
        </div>
        <!-- Add more fields as needed -->
    </div>
    <?php
}
?>
