#include <windows.h>

// �������, ������� ������������ ������
#define PLUGIN_CMD "say"

typedef int (WINAPI *PluginMain)(char *arg);

int WINAPI PluginFunc(char *arg)
{
	Sleep(10);
	// ���� ���� ��� �����
	// arg - ������ � �����������, ������� ���� ������� ����� �������
	MessageBox(0, arg, "message to l4m3r", 0);
	return 0;
}

__declspec(dllexport) int WINAPI InitModule(int (*a)(char *, PluginMain, char *), char *dllname)
{
	Sleep(10);
	// �-��� ������������� �������
	// ����� ������ ������� ������� ;)
	int (*RegisterPlugin)(char *, PluginMain, char *);
	RegisterPlugin = a;
	RegisterPlugin(PLUGIN_CMD, PluginFunc, dllname); 

	return 0;
}

bool __stdcall DllMain(HINSTANCE, DWORD, PVOID) {return true;}