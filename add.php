<?php 
    include 'db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $client_ref = $_POST['client-ref'];
        $claimant_postcode = $_POST['claimant-postcode'];
        $claimant_vrm = $_POST['claimant-vrm'];
        $hire_start_date = $_POST['hire-start-date'];
        $hire_duration = $_POST['hire-duration'];
        $required_date = $_POST['required-date'];
    
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO instructions (client_ref, claimant_postcode, claimant_vrm, hire_start_date, hire_duration, required_date, completed, created_at) VALUES (?, ?, ?, ?, ?, ?, FALSE, CURRENT_TIMESTAMP)");
        $stmt->bind_param("ssssss", $client_ref, $claimant_postcode, $claimant_vrm, $hire_start_date, $hire_duration, $required_date);
    
        // Execute the statement
        if ($stmt->execute()) {
            echo "New task added successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
    
        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
    
?>

<!DOCTYPE html>
<html lang='en'>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Whichrate Instructions Wizard</title>
    <link rel='stylesheet' href='styles.css'>
    </head>
    <body>
        <header>
            <h1>Whichrate Instructions Wizard</h1>
            <h6>The tool with which to put in instructions for a Whichrate report.</h6>
            <nav>
                <a href="index.php">Home</a>
                <a href="add.php">Add New Instruction</a>
                <a href="view.php">View Stored Instructions</a>
            </nav>
        </header>
        <section id='view-section'>
            <h3>Fill out the form below to add a new instruction:</h3>
            <form method='POST' action='add.php'>
                <label for='client-ref' class='form-label'>Reference Number:</label>
                <input type='text' id='client-ref' name='client-ref' class='form-input' required>
                <br>
                <label for='claimant-postcode' class='form-label'>Postcode:</label>
                <input type='text' id='claimant-postcode' name='claimant-postcode' class='form-input' required>
                <br>
                <label for='claimant-vrm' class='form-label'>Registeration Number:</label>
                <input type='text' id='claimant-vrm' name='claimant-vrm' class='form-input' required>
                <br>
                <label for='hire-start-date' class='form-label'>Hire Start Date:</label>
                <input type='date' id='hire-start-date' name='hire-start-date' class='date-input' required>
                <br>
                <label for='hire-duration' class='form-label'>Duration of Hire:</label>
                <input type='text' id='hire-duration' name='hire-duration' class='form-input' required>
                <br>
                <label for='required-date' class='form-label'>Date for Report:</label>
                <input type='date' id='required-date' name='required-date' class='date-input' required>
                <br>
                <button type='submit'>Add instruction</button>
            </form>
        </section>
        <footer>
            
        </footer>
    </body>
</html>