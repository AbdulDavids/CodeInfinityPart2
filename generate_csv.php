<?php

require 'functions.php';


// Main process
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $recordCount = (int)$_POST['recordCount'];
    $csvFilename = generateCSV($recordCount);


    echo "<h2>Data exported to CSV file: $csvFilename</h2><br><h2> $recordCount records made.</h2>";
}

?>





<!DOCTYPE html>
<html>
<head>
    <title>Generate CSV</title>
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body>
    <div class="container">
    <p>Upload a CSV file: <a href="upload_csv.php">Upload CSV</a></p>
    </div>
</body>
</html>



