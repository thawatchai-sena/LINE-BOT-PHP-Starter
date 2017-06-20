<?php

mysql_close($objConnect);

	$objConnect = mysql_connect("arty16.com","arty16","isy!lzj#ko!8iy$[");
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

