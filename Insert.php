<?php
// ตัวแปรข้อมูล SERVER MySQL สำหรับเชื่อมต่อ
$servername = "1.1.128.169";
$username = "root";
$password = "T4cmQLSesETWynRP";
$dbname = "arty16_news";

// Create connection สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_query("SET NAMES UTF8");
// mysql_query("SET NAMES UTF8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO tblNews (date, subject, details,section)
VALUES ('2017-06-21', 'ผบ.ป.๖ พัน.๑๖ ตรวจคลัง สป.๕', 'เมื่อ....', 'ฝกบ.')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
