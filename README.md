
# CSV Data Generator and Database Import

This project is a PHP-based web application that allows you to generate CSV files with random data and import them into an SQLite database. It includes features for generating CSV files with unique records, uploading existing CSV files for database insertion, and downloading generated CSV files. Done as part of the Code Infinity profiency test.

## Features

- **Generate CSV**: Create CSV files with random data including names, surnames, initials, ages, and dates of birth. Ensure that generated records are unique.

- **Upload CSV**: Upload existing CSV files and insert their data into an SQLite database table. The uploaded data can be used for further analysis or reporting.

- **Download CSV**: After generating a CSV file, it will show in the output directory. 

## Getting Started

1. **Prerequisites**: Make sure you have PHP and a web server (e.g., XAMPP) installed on your machine.


2. **Clone the Repository**: Clone this repository to your server directory.

   ```bash
   git clone https://github.com/AbdulDavids/CodeInfinityPart2.git
   ```

3. **Install dependancies**:

   - Run the following command in the project directory to install project dependencies:

     ```bash
     composer install
     ```


4. **PHP Configuration (Optional)**: If you encounter a "Maximum execution time exceeded" error, you can change the maximum execution time in the `php.ini` file. Locate your `php.ini` file and increase the `max_execution_time` directive. For example:

   ```ini
   max_execution_time = 300
   ```

5. **Start the Web Server**: Start your web server and make sure it's configured to execute PHP files.

6. **Access the Application**: Open a web browser and access the application by navigating to the project's root directory (e.g., `http://localhost/CodeInfinityPart2`).

## Usage

1. **Generate CSV**:
   - Access the "Generate CSV" page.
   - Specify the number of records you want to generate.
   - Click the "Generate CSV" button.
   - The CSV file will be in your output directory as output.csv.

2. **Upload CSV**:
   - Access the "Upload CSV" page.
   - Select a CSV file to upload.
   - Click the "Upload and Insert Data" button.
   - View the total number of records added to the database.


## Customization

- **Modify Data**: You can customize the data generation process by editing the arrays of names and surnames in the `generate_csv.php` file. I've used names of Formula One drivers. 


