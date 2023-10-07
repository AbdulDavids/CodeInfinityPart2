<!DOCTYPE html>
<html>
<head>
    <title>CSV Generator</title>
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body>
    <div class="container">
        <h1>CSV Generator</h1>


        <form method="post" action="generate_csv.php">
            <label for="recordCount">Number of Records:</label>
            <input type="number" name="recordCount" id="recordCount" required>
            <input type="submit" value="Generate CSV">
        </form>



        <p><a href="upload_csv.php">Upload CSV</a></p>


    </div>
</body>
</html>
