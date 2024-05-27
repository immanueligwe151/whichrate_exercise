<?php 
    include 'db.php';

    $sql = "SELECT * FROM instructions";
    $result = $conn->query($sql);
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
            <h3>These are the instructions that have been entered:</h3>
            <table>
                <tr id='table-heading'>
                    <th>Ref Number</th>
                    <th>Postcode</th>
                    <th>Registeration Number</th>
                    <th>Hire Start Date</th>
                    <th>Duration of Hire</th>
                    <th>Date for Report</th>
                    <th>Report Created</th>
                </tr>
                <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $table_row = "<td>" . htmlspecialchars($row["client_ref"]) . "</td>
                            <td>" . htmlspecialchars($row["claimant_postcode"]) . "</td>
                            <td>" . htmlspecialchars($row["claimant_vrm"]) . "</td>
                            <td>" . htmlspecialchars($row["hire_start_date"]) . "</td>
                            <td>" . htmlspecialchars($row["hire_duration"]) . "</td>
                            <td>" . htmlspecialchars($row["required_date"]) . "</td>
                            <td>" . htmlspecialchars($row["created_at"]) . "</td>";
                            echo "<tr>" . $table_row . "</tr>";
                            
                        }

                    } else {
                        $error_result = "<tr>
                            <td>No results found</td>
                            <td>No results found</td>
                            <td>No results found</td>
                            <td>No results found</td>
                            <td>No results found</td>
                            <td>No results found</td>
                            <td>No results found</td>                    
                        </tr>";
                        echo $error_result;
                    }
                ?>
            </table>
        </section>
        <footer>
            
        </footer>
    </body>
</html>