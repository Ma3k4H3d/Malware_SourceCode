<?php

include("html_panel_header.php");

function _stat_os()
{
	GLOBAL $hits_os, $loads_os, $hosts_os;
	_load_vars();
	_make_stat1('���������� �� ������������ ��������',array('��','����','�����','��������','������ %'),@$hits_os,@$loads_os,@$hosts_os);
}

_stat_os();

include("html_panel_footer.php");

?>