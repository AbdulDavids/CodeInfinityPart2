<?php


// Function to generate and export CSV data
function generateCSV($recordCount) {
    try {
        $csvFile = 'output/output.csv';

        // clear the existing CSV file if it exists
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

        // track used data
        $usedData = [];




    
        $csv = fopen($csvFile, 'w');
        fputcsv($csv, ["Id", "Name", "Surname", "Initials", "Age", "DateOfBirth"]);



        for ($i = 1; $i <= $recordCount; $i++) {
            $name = $names[array_rand($names)];
            $surname = $surnames[array_rand($surnames)];
            $initials = substr($name, 0, 1);
            $age = rand(0, 200); // Adjust age range as needed
            $dateOfBirth = date('d/m/Y', strtotime("-{$age} years"));

            $data = [$name, $surname, $age, $dateOfBirth];
            $dataHash = md5(implode('', $data));

            if (!in_array($dataHash, $usedData)) {
                fputcsv($csv, [$i, $name, $surname, $initials, $age, $dateOfBirth]);

                $usedData[] = $dataHash;
            } else {
                $i--;
            }
        }



        fclose($csv);

        return $csvFile;
    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }
}



//------------------------------------------------------------------------------------




?>
