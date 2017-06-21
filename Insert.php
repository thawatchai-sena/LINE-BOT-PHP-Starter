<html>
<head>
<title>ThaiCreate.Com PHP & UTF-8</title>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
</head>
<body>
<?php
    
// ตัวแปรสำหรับรับค่า
$message = $_GET["msg"];
        
// ตัวแปรข้อมูล SERVER MySQL สำหรับเชื่อมต่อ
$servername = "180.180.43.255";
$username = "root";
$password = "T4cmQLSesETWynRP";
$dbname = "arty16_news";

// Create connection สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);
    
// ทำให้บันทึกข้อมูลลง MySQL เป็นภาษาไทยได้
$conn->set_charset("utf8");
    
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO tblNews (date, subject, details,section)
VALUES ('2017-06-21', $message, 'เมื่อ....', 'ฝกบ.')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
</html>
