    `<?php

session_start();

$conn = new mysqli(
    "localhost",
    "root",
    "",
    "online1",
    "3306"
);

if ($conn->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
