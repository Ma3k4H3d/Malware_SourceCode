<?php
function hit()
{
	GLOBAL $mysql;
	mysql_connect($mysql['host'], $mysql['user'], $mysql['password']) or die("������ �����. � ������� �������!");
	mysql_select_db($mysql['db']) or die("�� ".$mysql['db']." �� �������!");
	//��������� ����
	mysql_query("INSERT into hits VALUES('"._ip()."', '"._country(_ip())."', '"._browser()."','"._os()."','"._referer()."')");
	//��������� ����� (���������� ip)
	if (mysql_num_rows(mysql_query("SELECT * FROM hosts WHERE ip = '"._ip()."'"))==0)
	{
		mysql_query("INSERT into hosts VALUES('"._ip()."', '"._country(_ip())."', '"._browser()."','"._os()."','"._referer()."')");
	}
}
hit();
?>