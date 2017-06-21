<?php
// ตัวแปรข้อมูล SERVER MySQL สำหรับเชื่อมต่อ
$servername = "180.180.44.12";
$username = "root";
$password = "T4cmQLSesETWynRP";
$dbname = "arty16_news";

// Create connection สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO tblNews (date, subject, details, section)
VALUES ('21/06/2560', 'John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
