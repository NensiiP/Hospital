<?php
$servername = "mysql.railway.internal";  // Change if using a different host
$username = "root";         // Your database username
$password = "TxCCeCwhUiuoUpGCQjTQoDiKHdhdzArx";             // Your database password
$dbname = "railway";    // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
