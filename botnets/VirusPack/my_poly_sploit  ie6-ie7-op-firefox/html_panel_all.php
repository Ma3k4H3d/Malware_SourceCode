<?php

include("html_panel_header.php");

function _stat_all()
{
	GLOBAL $hits_ip, $loads_ip, $hosts_ip;
	_load_vars();
	_make_stat4('����� ����������',array('����','�����','��������','������ %'));
}

_stat_all();

include("html_panel_footer.php");

?>