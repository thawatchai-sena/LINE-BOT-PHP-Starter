<?php
 
$strAccessToken = "wFclPDWuQ98RUXWnnkzOsDpxOOtCMw9GqqbO1IBSYXAIKdVqyDDqsYwHjNXZ8HahwQNHasEcCn4Vj0+UAd3iGjKzW+H92xw5Qe7SVR2GAyXv+F4IARwqwf3uJPuNz5E3t3uXMTGF8bdnLkmQGk5ScQdB04t89/1O/w1cDnyilFU=";
 
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
 
$strUrl = "https://api.line.me/v2/bot/message/reply";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
$msg = $arrJson['events'][0]['message']['text'];


// วันที่ เดือน ปี ที่บันทึกข้อมูล
$now = date('Y-m-d H:i:s');


// บันทึกข้อความลงฐานข้อมูล
// ตัวแปรข้อมูล SERVER MySQL สำหรับเชื่อมต่อ
$servername = "118.175.249.2";
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
$sql = "INSERT INTO tblNews (date, subject, details, section)
VALUES ('$now', '$msg', 'เมื่อ....', 'ฝกบ.')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();


if($msg == "สวัสดี"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "สวัสดี ID คุณคือ ".$arrJson['events'][0]['source']['userId'];
  
}else if($msg == "ชื่ออะไร"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันยังไม่มีชื่อนะ";
 }else if($msg == "ชื่อไร"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันยังไม่มีชื่อนะ";
 }else if($msg == "ใครอะ"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันก็ไม่รู้เหมือนกัน";
}else if($msg == "ทำอะไรได้บ้าง"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันทำอะไรไม่ได้เลย คุณต้องสอนฉันอีกเยอะ";
}else{
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันไม่เข้าใจคำสั่ง";
}
 
//$ch = curl_init();
//curl_setopt($ch, CURLOPT_URL,$strUrl);
//curl_setopt($ch, CURLOPT_HEADER, false);
//curl_setopt($ch, CURLOPT_POST, true);
//curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
//curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
//curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//$result = curl_exec($ch);
curl_close ($ch);
