<?PHP 
include_once 'config.php';

header_print(true);   //載入header檔

?>
<style type="text/css">
<!--
-->
</style>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<body>
<table border = '0' cellpadding = '' cellspacing = '' width = '100%'>
<!--DWLayoutTable-->

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
	if ($USER['userid'] == '')
	{
		echo "<div style = 'padding-top:0px;padding-left:0px'>\n";
		echo "<div><a href = '" . ROOT_URL . "/user_add.php'><img src = '" . ROOT_URL . "/img/register.jpg' width = '212' height = '80' border = '0'></a></div>\n";
		echo "<div><a href = '" . ROOT_URL . "/userlogin.php'><img src = '" . ROOT_URL . "/img/userlogin.jpg' width = '212' height = '80' border = '0'></a></div>\n";
		echo "</div>\n";
	}
	?>	  
<tr>
  <td height="45" colspan="4" valign="top"><a href = 'img/健康知識.doc'></a><img src="img/leftmenu2_02.jpg" width="212" height="45"></td>
</tr>
<tr>
  <td height="25" colspan="4" valign="top"><a href = 'food.php?class=food1'><img src="img/leftmenu2_05.jpg" width="212" height="25" border="0"></a></td>
</tr>
<tr>
  <td height="25" colspan="4" valign="top"><a href = 'food.php?class=food2'><img src="img/leftmenu2_06.jpg" width="212" height="25" border="0"></a></td>
</tr>
<tr>
  <td height="25" colspan="4" valign="top"><a href = 'food.php?class=food3'><img src="img/leftmenu2_07.jpg" width="212" height="25" border="0"></a></td>
</tr>
<tr>
  <td height="25" colspan="4" valign="top"><a href = 'food.php?class=food4'><img src="img/leftmenu2_08.jpg" width="212" height="25" border="0"></a></td>
</tr>
<tr>
  <td height="25" colspan="4" valign="top"><a href = 'food.php?class=food5'><img src="img/leftmenu2_09.jpg" width="212" height="25" border="0"></a></td>
</tr>
<tr>
  <td height="25" colspan="4" valign="top"><a href = 'food.php?class=food6'><img src="img/leftmenu2_10.jpg" width="212" height="25" border="0"></a></td>
</tr>
<tr>
  <td height="25" colspan="4" valign="top"><img src="img/leftmenu2_11.jpg" width="212" height="25" border="0" onmouseover = "show_display('other_div');"></td>
</tr>
<tr id = 'other_div' name = 'other_div' style = 'display:none'>
	<td>
	<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
	<tr>
		<td><a href = 'food.php?class=food7&class2=<?PHP echo rawurlencode('調味料');?>'><img src = '<?PHP echo ROOT_URL;?>/img/leftmenu2_11_1.jpg' border = '0'></a></td>
	</tr>
	<tr>
		<td><a href = 'food.php?class=food7&class2=<?PHP echo rawurlencode('中式早餐');?>''><img src = '<?PHP echo ROOT_URL;?>/img/leftmenu2_11_2.jpg' border = '0'></a></td>
	</tr>
	<tr>
		<td><a href = 'food.php?class=food7&class2=<?PHP echo rawurlencode('西式早餐');?>''><img src = '<?PHP echo ROOT_URL;?>/img/leftmenu2_11_3.jpg' border = '0'></a></td>
	</tr>
	<tr>
		<td><a href = 'food.php?class=food7&class2=<?PHP echo rawurlencode('家常菜');?>''><img src = '<?PHP echo ROOT_URL;?>/img/leftmenu2_11_4.jpg' border = '0'></a></td>
	</tr>
	<tr>
		<td><a href = 'food.php?class=food7&class2=<?PHP echo rawurlencode('小吃');?>''><img src = '<?PHP echo ROOT_URL;?>/img/leftmenu2_11_5.jpg' border = '0'></a></td>
	</tr>
	<tr>
		<td><a href = 'food.php?class=food7&class2=<?PHP echo rawurlencode('套餐');?>''><img src = '<?PHP echo ROOT_URL;?>/img/leftmenu2_11_6.jpg' border = '0'></a></td>
	</tr>
	<tr>
		<td><a href = 'food.php?class=food7&class2=<?PHP echo rawurlencode('零食點心');?>''><img src = '<?PHP echo ROOT_URL;?>/img/leftmenu2_11_7.jpg' border = '0'></a></td>
	</tr>
	<tr>
		<td><a href = 'food.php?class=food7&class2=<?PHP echo rawurlencode('飲料');?>''><img src = '<?PHP echo ROOT_URL;?>/img/leftmenu2_11_8.jpg' border = '0'></a></td>
	</tr>
	<tr>
		<td><a href = 'food.php?class=food7&class2=<?PHP echo rawurlencode('酒類');?>''><img src = '<?PHP echo ROOT_URL;?>/img/leftmenu2_11_9.jpg' border = '0'></a></td>
	</tr>
	</table>
	</td>
</tr>
<tr>
  <td height="25" colspan="4" valign="top"><a href = 'measure.php'><img src="img/leftmenu2_17.jpg" width="212" height="25" border="0"></a></td>
</tr>
<tr>
  <td height="56" colspan="4" valign="top"><a href = '<?PHP echo ROOT_URL;?>/img/認識食物.doc'><span style="padding-top:0px;padding-left:0px"><img src="img/leftmenu2_12.jpg" width="212" height="56" border="0" /></span></a><a href="weight.php"></a></td>
</tr>
<tr>
  <td height="25" colspan="4" valign="top"><a href="knowegg.php"><img src="img/leftmenu2_13.jpg" width="212" height="25" border="0" /></a></td>
</tr>
<tr>
  <td height="25" colspan="4" valign="top"><a href = 'potassium.php'><img src="img/leftmenu2_14.jpg" width="212" height="25" border="0" /></a></td>
</tr>
<tr>
  <td height="25" colspan="4" valign="top"><a href = 'phosphorous.php'><img src="img/leftmenu2_15.jpg" width="212" height="25" border="0" /></a><a href = 'no_1.php'></a></td>
</tr>
<tr>
  <td height="27" colspan="4" valign="top"><a href = 'knowna.php'><img src="img/leftmenu2_16.jpg" width="212" height="25" border="0" /></a><a href = 'no_2.php'></a></td>
</tr>
<tr>
  <td height="131" colspan="4" valign="top"><a href = 'history.php'><img src="img/leftmenu_bt1.jpg" width="212" height="131" border="0" /></a><a href = 'no_3.php'></a></td>
</tr>
<tr>
  <td height="11"></td>
  <td></td>
  <td></td>
  <td></td>
</tr>
</table>
</body>