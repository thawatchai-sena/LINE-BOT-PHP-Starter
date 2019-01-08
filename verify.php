<?php
$access_token = 'wFclPDWuQ98RUXWnnkzOsDpxOOtCMw9GqqbO1IBSYXAIKdVqyDDqsYwHjNXZ8HahwQNHasEcCn4Vj0+UAd3iGjKzW+H92xw5Qe7SVR2GAyXv+F4IARwqwf3uJPuNz5E3t3uXMTGF8bdnLkmQGk5ScQdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);
echo "OK";
//echo $result;
