<?php
	$objConnect = mysql_connect("180.180.44.12","root","T4cmQLSesETWynRP");
	mysql_select_db("thaiwin_db") or die(mysql_error());
	if($objConnect)
	{
		echo "Database Connected.";
	}
	else
	{
		echo "Database Connect Failed.";
	}

	mysql_close($objConnect);
