<?php

include("html_panel_header.php");

function _stat_browsers()
{
	GLOBAL $hits_browser, $loads_browser, $hosts_browser;
	_load_vars();
	_make_stat1('���������� �� ���������',array('�������','����','�����','��������','������ %'),@$hits_browser,@$loads_browser,@$hosts_browser);
}

_stat_browsers();

include("html_panel_footer.php");

?>