<?php

include("html_panel_header.php");

function _stat_referers()
{
	GLOBAL $hits_referer, $loads_referer, $hosts_referer;
	_load_vars();
	_make_stat2('���������� �� ���������',array('�������','����','�����'),@$hits_referer,@$loads_referer,@$hosts_referer);
}

_stat_referers();

include("html_panel_footer.php");

?>