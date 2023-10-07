<!DOCTYPE html>
<html>
<head>
    <title>Upload CSV</title>
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body>
    <h1>Upload CSV File</h1>

    <div class="container">
        <form method="post" enctype="multipart/form-data">
            <div class="selectcsv">
            <label for="csvFile">Select CSV file:</label>
            <input type="file" name="csvFile" id="csvFile" required accept=".csv">
            </div>
            <input type="submit" value="Upload and Insert Data">
        </form>





<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['csvFile'])) {
    $csvFile = $_FILES['csvFile'];

    // Check if the file is a CSV file
    $fileType = pathinfo($csvFile['name'], PATHINFO_EXTENSION);
    if (strtolower($fileType) !== 'csv') {
        alert('Only CSV files are allowed.');
    }

    // Process the uploaded CSV file
    $csvData = array_map('str_getcsv', file($csvFile['tmp_name']));
    $headerRow = array_shift($csvData); // Remove and store the header row
    $rowCount = 0; // Initialize the record count

    try {
        // Create a database connection to an SQLite file
        $pdo = new PDO('sqlite:mydb.sqlite');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        // Create the table if it doesn't exist
$createTableQuery = "
CREATE TABLE IF NOT EXISTS csv_data (
    Id TEXT,
    Name TEXT,
    Surname TEXT,
    Initials TEXT,
    Age INTEGER,
    DateOfBirth DATE
);
";

$pdo->exec($createTableQuery);

// clear existing data from the table
$clearTableQuery = "DELETE FROM csv_data";
$pdo->exec($clearTableQuery);








        // Insert data into the database
        $query = "INSERT INTO csv_data (Id, Name, Surname, Initials, Age, DateOfBirth) VALUES (?, ?, ?, ?, ?, ?)";
        $statement = $pdo->prepare($query);

        foreach ($csvData as $row) {
            list($Id, $name, $surname, $initials, $age, $dateOfBirth) = $row;

            // Convert the date format from 'dd/mm/YYYY' to 'YYYY-MM-DD'
            $dateOfBirth = date('Y-m-d', strtotime($dateOfBirth));

            $statement->execute([$Id, $name, $surname, $initials, $age, $dateOfBirth]);
            $rowCount++; // Increment the record count
        }

        echo "<p>CSV data successfully imported into the database.<br> Total records added: $rowCount</p>";
    } catch (PDOException $e) {
        die('Error: ' . $e->getMessage());
    }
}
?>




</div>
</body>
</html>

