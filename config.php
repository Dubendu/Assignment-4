<?php
// server connection
$servername = "localhost";
$username = "root";
// their is no password in default
$password = "";
// our database name
$dbname = "category";  
// lets check its connected
$conn = new mysqli($servername, $username, $password,$dbname);  
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>