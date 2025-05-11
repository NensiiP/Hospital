<?php
$servername = "db4free.net";  // Change if using a different host
$username = "novenaadmin2311";         // Your database username
$password = "aasecure1234";             // Your database password
$dbname = "novena_hosp_2311";    // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
