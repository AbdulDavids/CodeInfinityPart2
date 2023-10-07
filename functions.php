<?php


// Function to generate and export CSV data
function generateCSV($recordCount) {
    try {
        // Path to the CSV file
        $csvFile = 'output/output.csv';

        // Clear the existing CSV file if it exists
        if (file_exists($csvFile)) {
            unlink($csvFile);
        }



        $names = [
            "Lewis", "Max", "Charles", "Valtteri", "Daniel", "Lando", "Pierre", "Carlos", "Sergio", "Fernando",
            "Sebastian", "George", "Kimi", "Esteban", "Nico", "Antonio", "Yuki", "Mick", "Nikita", "Lance"
            ];
        
            $surnames = [
            "Hamilton", "Verstappen", "Leclerc", "Bottas", "Ricciardo", "Norris", "Gasly", "Sainz", "Perez", "Alonso",
            "Vettel", "Russell", "Raikkonen", "Ocon", "Hulkenberg", "Giovinazzi", "Tsunoda", "Schumacher", "Mazepin", "Stroll"
            ];

        // Track used data to prevent duplicates
        $usedData = [];




        // Generate and insert random data into the CSV file
        $csv = fopen($csvFile, 'w');
        fputcsv($csv, ["Id", "Name", "Surname", "Initials", "Age", "DateOfBirth"]);



        for ($i = 1; $i <= $recordCount; $i++) {
            // Generate random data
            $name = $names[array_rand($names)];
            $surname = $surnames[array_rand($surnames)];
            $initials = substr($name, 0, 1);
            $age = rand(0, 200); // Adjust age range as needed
            $dateOfBirth = date('d/m/Y', strtotime("-{$age} years"));

            // Check for duplicates
            $data = [$name, $surname, $age, $dateOfBirth];
            $dataHash = md5(implode('', $data));

            if (!in_array($dataHash, $usedData)) {
                // Write data to the CSV file
                fputcsv($csv, [$i, $name, $surname, $initials, $age, $dateOfBirth]);

                // Store data hash to prevent duplicates
                $usedData[] = $dataHash;
            } else {
                $i--;
            }
        }



        fclose($csv);

        // Return the generated CSV filename
        return $csvFile;
    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }
}



//------------------------------------------------------------------------------------




















?>