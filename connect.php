<?php

mysql_close($objConnect);

<?php
	$objConnect = mysql_connect("1.2.181.16","root","");
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
?>

