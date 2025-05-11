<?php
$servername = "db4free.net";  // Change if using a different host
$username = "hospitaladmin";         // Your database username
$password = "novena123";             // Your database password
$dbname = "novena_hospitall";    // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
