<html>
<head>
<title>ThaiCreate.Com PHP & MySQL Tutorial</title>
</head>
<body>
<?php
	$objConnect = mysql_connect("180.180.44.12","root","T4cmQLSesETWynRP");
	if($objConnect)
	{
		echo "Database Connected.";
	}
	else
	{
		echo "Database Connect Failed.";
	}

	mysql_close($objConnect);
?>
</body>
</html>
