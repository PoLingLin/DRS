<?PHP 
include_once 'config.php';

#header_print(true);   //載入header檔

/*if ( trim($_POST['username']) != '' && trim($_POST['password']) != '' )	//判斷是否有送出帳號密碼
{
	login_user( trim($_POST['username']), trim($_POST['password']) );
}*/

?>
<style type="text/css">
<!--
-->
</style>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<body>
<table border = '0' cellpadding = '' cellspacing = '' width = '100%'>
<?PHP
	/*if ($USER['userid'] == '')
	{
		echo "<tr>\n";
		echo "   <td height='16' colspan='3' align='left' valign='top'><img src='img/login_01.jpg' width='212' height='16'></td>\n";
		echo "   <td width='784'></td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "   <td width='22' height='74' valign='top'><img src='img/login_02.jpg' width='22' height='74'></td>\n";
		echo "   <td width='173' valign='top'>\n";
		echo "<table width = '100%' border = '0' cellpadding = '0' cellspacing = '0'>\n";
		echo "<tr>\n";
		echo "  <td width = '37' height = '74' valign = 'top'>\n";
		echo "  <table width = '100%' border = '0' cellpadding = '0' cellspacing = '0' bgcolor = '#FDCA01'>\n";
		echo "  <tr>\n";
		echo "     <td width = '37' height = '74' align = 'center' valign = 'top' bgcolor = '#FDCA01' class = 'login' >帳號：<br><br>密碼：</td>\n";
		echo "   </tr>\n";
		echo "   </table>\n";
		echo "   </td>\n";
		echo "   <td width = '136' valign = 'top' bgcolor = '#FDCA01'><a href = 'type_1.php'><span class = 'title2' style = 'padding-left:25px'>\n";
		echo "   <form id = 'loginform' name = 'loginform' method = 'post' action = 'userlogin.php'>\n";
		echo "   <table width = '136' \n";
		echo "   <tr>\n";
		echo "      <td><input type = 'text' name = 'username' id = 'username' style='font-size: 9pt; width: 78px; height: 16; border: 1px solid=#C0C0C0; padding-left: 0px; padding-right=0px size=15'></td>\n";
		echo "   </tr>\n";
		echo "   <tr>\n";
		echo "      <td><input type = 'password' name = 'password' id = 'password' style='font-size: 9pt; width: 78px; height: 16; border: 1px solid=#C0C0C0; padding-left: 0px; padding-right=0px size=15'></td>\n";
		echo "   </tr>\n";
		echo "   <td colspan = '0'>\n";
		echo "   <input type = 'button' name = 'ok' id = 'ok' value = '登入' onclick = 'javascript:check_login();'>\n";
		echo "   <input type = 'reset' name = 'reset' id = 'reset' value = '清除'></td>";
		echo "   </table>\n";
		echo "    </span></a></td>\n";
		echo "  </tr>\n";
		echo "  </table>\n";
		echo "  </td>\n";
		echo "  <td width='17' valign='top'><img src='img/login_04.jpg' width='17' height='74'></td>\n";
		echo "  <td></td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<td height='12' colspan='3' valign='top'><img src='img/login_05.jpg' width='212' height='12'></td>\n";
		echo "<td></td>\n";
		echo "</tr>\n";
	}*/
	?>	  
<tr>
	<td height="139" colspan="4" align="left" valign="top">
	<?PHP
	if ($USER['userid'] == '')
	{
		echo "<div style = 'padding-top:0px;padding-left:0px'>\n";
		echo "<div><a href = '" . ROOT_URL . "/user_add.php'><img src = '" . ROOT_URL . "/img/register.jpg' width = '212' height = '80' border = '0'></a></div>\n";
		echo "</div>\n";
		echo "<div style = 'padding-top:0px;padding-left:0px'>\n";
		echo "<div><a href = '" . ROOT_URL . "/userlogin.php'><img src = '" . ROOT_URL . "/img/userlogin.jpg' width = '212' height = '80' border = '0'></a></div>\n";
		echo "</div>\n";

	}
	?>
    
    <a href = 'history.php'><div style = 'padding-top:0px;padding-left:0px'>
      <div><img src="img/leftmenu_bt1.jpg" width="212" height="131" border="0" /></div>
	  </div>
    </a></td>
</tr>
<tr>
  <td height="145" colspan="4" align="left" valign="top">
	  <div style = 'padding-top:0px;padding-left:0px'>
	  <div class = ''><img src="img/leftmenu_bt2.jpg" width="212" height="137" border="0" /></div>
	</div></td>
</tr>
<tr>
  <td height="31" colspan="4" valign="top">
	  <div style = 'padding-top:0px;padding-left:0px'>
	  <div class = ''><img src="img/leftmenu_knowledge.jpg" width="212" height="23" border="0" /></div>
	</div></td>
</tr>
<tr>
  <td height="27" colspan="4" valign="top"><a href = 'type_1.php'><div class = 'title2' style = 'padding-left:25px'>秘訣一
    
  </div>
  </a></td>
</tr>
<tr>
  <td height="27" colspan="4" valign="top"><a href = 'type_2.php'><div class = 'title2' style = 'padding-left:25px'>秘訣二</div>
  </a></td>
</tr>
<tr>
  <td height="27" colspan="4" valign="top"><a href = 'type_3.php'><div class = 'title2' style = 'padding-left:25px'>秘訣三</div>
  </a></td>
</tr>
<tr>
  <td height="27" colspan="4" valign="top"><a href = 'type_4.php'><div class = 'title2' style = 'padding-left:25px'>秘訣四</div>
  </a></td>
</tr>
<tr>
  <td height="27" colspan="4" valign="top"><a href = 'type_5.php'><div class = 'title2' style = 'padding-left:25px;'>秘訣五</div>
  </a></td>
</tr>
<tr>
  <td height="27" colspan="4" valign="top"><a href="weight.php"><div class = 'title2' style = 'padding-left:25px'>認識體重</div>
  </a></td>
</tr>
<tr>
  <td height="27" colspan="4" valign="top"><div class = 'title2' style = 'padding-left:25px'>認識尿酸</div></td>
</tr>
<tr>
  <td height="31" colspan="4" valign="top"><div style = 'padding-top:0px;padding-left:0px'>
    <div class = ''><img src="img/leftmenu_kidney.jpg" width="212" height="23" /></div>
    </div></td>
</tr>
<tr>
  <td height="27" colspan="4" valign="top"><a href = 'no_1.php'><div class = 'title2' style = 'padding-left:25px'>腎臟移植</div>
  </a></td>
</tr>
<tr>
  <td height="27" colspan="4" valign="top"><a href = 'no_2.php'><div class = 'title2' style = 'padding-left:25px'>血液透析</div>
  </a></td>
</tr>
<tr>
  <td height="27" colspan="4" valign="top"><a href = 'no_3.php'><div class = 'title2' style = 'padding-left:25px'>腹膜透析</div>
  </a></td>
</tr>
<tr>
  <td height="16"></td>
  <td></td>
  <td></td>
  <td></td>
</tr>
</table>
<script language = 'javascript'>
<!--
function check_login()
{
	var Obj = document.form1;
	if ( trim(Obj.username.value) == '' )
	{
		alert('請輸入帳號!!');
		Obj.username.focus();
	
	}else if ( trim(Obj.password.value) == '' )
	{
		alert('請輸入密碼!!');
		Obj.password.focus();
	
	}else{
		Obj.submit();
	}
}
//-->
</script>
