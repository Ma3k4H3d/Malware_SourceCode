<?php

include_once("config.php");
include_once("vars.php");
include_once("antihack.php");
include_once("geoip.php");
include_once("functions.php");

function panel(){
	GLOBAL $act;
	if (@$act=="����� ����������")
	{
		include_once("html_panel_all.php");
		return 0;
	}
	if (@$act=="������")
	{
		include_once("html_panel_countries.php");
		return 0;
	}
	if (@$act=="��������")
	{
		include_once("html_panel_browsers.php");
		return 0;
	}
	if (@$act=="��")
	{
		include_once("html_panel_os.php");
		return 0;
	}
	if (@$act=="��������")
	{
		include_once("html_panel_referers.php");
		return 0;
	}
	if (@$act=="��������")
	{
		include_once("html_panel_clear.php");
		return 0;
	}
	if (@$act=="�����")
	{
		setcookie("user", "");
		setcookie("pass", "");
		include_once("html_admin_go.php");
		return 0;
	}
	include_once("html_panel.php");
}
panel();
?>