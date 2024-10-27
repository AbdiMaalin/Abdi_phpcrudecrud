<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Northland Analytics PHP/MySQL Test Page</title>
</head>
<body>
    <h1>Northland Analytics PHP/MySQL Test Page</h1>
    <p>Database Records Found</p>

    <?php
    // Database connection setup
    $conn = new mysqli('localhost', 'Sacsac', 'changeme', 'employees');

    // Check for connection success
    if ($conn->connect_error) {
        die("MySQL Connection Failed: " . $conn->connect_error);
    }

    // Define the SQL query
    $sql = "SELECT first_name, last_name, hire_date FROM employees";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch and print each row
        while ($row = $result->fetch_assoc()) {
            echo "Employee: " . $row["first_name"] . " " . $row["last_name"] . 
                 ", Hire Date: " . $row["hire_date"] . "<br>";
        }
    } else {
        echo "<p>No Records Found</p>";
    }

    // Close the connection
    $conn->close();
    ?>

    <p>
        For more information on connecting PHP to MySQL, 
        <a href="https://www.php.net/manual/en/book.mysqli.php" target="_blank">click here</a>.
    </p>
</body>
</html>
