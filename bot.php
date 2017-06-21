<?php
$access_token = 'wFclPDWuQ98RUXWnnkzOsDpxOOtCMw9GqqbO1IBSYXAIKdVqyDDqsYwHjNXZ8HahwQNHasEcCn4Vj0+UAd3iGjKzW+H92xw5Qe7SVR2GAyXv+F4IARwqwf3uJPuNz5E3t3uXMTGF8bdnLkmQGk5ScQdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];

//https://arty16db.herokuapp.com/Insert.php?msg=""
			
			
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
			
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
VALUES ('2017-06-21', $text, 'เมื่อ....', 'ฝกบ.')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();


		}
	}
}
echo "OK";
