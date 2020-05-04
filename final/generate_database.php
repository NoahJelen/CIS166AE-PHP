<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="errors.css">
	<meta charset="utf-8">
	<title>generate the database</title>
</head>

<body>
<?php
    //connect to the mysql server
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname= "contact_info";
    $conn = mysqli_connect($servername, $username, $password);
    
    // check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    //create the database
    $sql = "CREATE DATABASE contact_info";
    if (mysqli_query($conn, $sql)) {
        echo nl2br("Database created successfully\n");
    } else {
        echo "Error creating database: " . mysqli_error($conn);
    }
    mysqli_close($conn);
    
    //create the table
    $conn = mysqli_connect($servername, $username, $password,$dbname);
    $sql = "CREATE TABLE contact_info (
        id INT(2) PRIMARY KEY AUTO_INCREMENT, 
        firstname VARCHAR(255) NOT NULL,
        lastname VARCHAR(255) NOT NULL,
        email VARCHAR(255),
        address VARCHAR(255),
        city VARCHAR(255),
        state VARCHAR(255),
        phonenum VARCHAR(255)
        )";

    if (mysqli_query($conn, $sql)) {
        echo nl2br("Table created successfully\n");
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }
    mysqli_close($conn);
?>
</body>
</html> 
