<?php

include_once("config.php");

mysql_connect($mysql['host'], $mysql['user'], $mysql['password']) or die("������ �����. � ������� �������!");
mysql_select_db($mysql['db']) or die("�� ".$mysql['db']." �� �������!");

mysql_query("DROP DATABASE IF EXISTS `".$mysql['db']."`;");
mysql_query("CREATE DATABASE `".$mysql['db']."`;");
mysql_query("USE ".$mysql['db'].";");

mysql_query("CREATE TABLE `hits` (
  `ip` char(15) NOT NULL default '',
  `country` char(7) NOT NULL default '',
  `browser` char(25) NOT NULL default '',
  `os` char(25) NOT NULL default '',
  `referer` char(255) NOT NULL default ''
) TYPE=MyISAM COMMENT='���������� �� �����';");

mysql_query("CREATE TABLE `hosts` (
  `ip` char(15) NOT NULL default '',
  `country` char(7) NOT NULL default '',
  `browser` char(25) NOT NULL default '',
  `os` char(25) NOT NULL default '',
  `referer` char(255) NOT NULL default ''
) TYPE=MyISAM COMMENT='���������� �� ������';");

mysql_query("CREATE TABLE `loads` (
  `ip` char(15) NOT NULL default '',
  `country` char(7) NOT NULL default '',
  `browser` char(25) NOT NULL default '',
  `os` char(25) NOT NULL default '',
  `referer` char(255) NOT NULL default ''
) TYPE=MyISAM COMMENT='���������� �� ���������';");

?>