<?PHP
include "config.php";

header_print(true);   //載入header檔

if ($_GET['action'] != 'back')  //判斷是否從下一頁送回
{
	if ($_POST)
	{
		$username = explode('@', trim($_POST['email']));
		if ( ckusername($username[0]) && trim($username[0]) != '' )  //檢查使用者帳號是否重複
		{
			$sql = "INSERT INTO user (c_name, e_name, email, username, password, telphone, celphone, address, add_time, up_time)VALUES(";
			$sql .= "'" . ckString($_POST['c_name'], 200) . "' , ";
			$sql .= "'" . ckString($_POST['e_name'], 200) . "' , ";
			$sql .= "'" . ckString($_POST['email'], 255) . "' , ";
			$sql .= "'" . ckString($username[0], 255) . "' , ";
			$sql .= "'" . md5(ckString($username[0], 255)) . "' , ";	//密碼使用MD5編碼
			$sql .= "'" . ckString($_POST['telphone'], 100) . "' , ";
			$sql .= "'" . ckString($_POST['celphone'], 100) . "' , ";
			$sql .= "'" . ckString($_POST['address'], 255) . "' , ";
			$sql .= "'" . time() . "' , ";
			$sql .= "'" . time() . "')";
			if ( mysql_query($sql) )
			{
				$userid = get_col_value('user', 'id', "WHERE username = '" . $username[0] . "' AND password = '" . md5($username[0]) . "'");
				if ( $userid == '' )
				{
					echo "系統發生問題，請洽系統管理員";
					exit;
				}
			}else{
				echo "系統發生問題，請洽系統管理員";
				exit;
			}
		}else{
			echo "<script language=\"JavaScript\">";
			echo "window.alert('此E-mail已經有人使用了，請重新輸入!!');";
			echo "location.href('user_add.php');";
			echo "</script>";
			exit; 
		}
	}else{
		echo "<script language=\"JavaScript\">";
		echo "window.alert('請回上一頁填寫個人資料!!');";
		echo "location.href('user_add.php');";
		echo "</script>";
		exit; 
	}
}
?>

<style type="text/css">
<!--
.style2 {font-size: 11pt}
.style3 {color: #FFFFFF}
.style4 {color: #FF0000}
-->
</style>
<script type="text/JavaScript">
<!--
function Sumprice()
{
	//計算BMI
	var Obj = document.form1;
	var height = Obj.user_h.options[Obj.user_h.selectedIndex].value;
	var weight = Obj.user_w.options[Obj.user_w.selectedIndex].value;
	if ( height == '' || height == 0 )
	{
		alert('請選擇身高!!');
		Obj.user_h.focus();
		return false;
	}
	if ( weight == '' || weight == 0 )
	{
		return false;
	}
	weight = parseInt(weight);
	height = parseInt(height);
	Obj.bmi.value = formatFloat( (weight / (height * height) * 10000) ,3 );
	Obj.good_w.value = formatFloat( ( ( 18.5 * (height * height) )/10000), 1);
	Obj.good_w2.value = formatFloat( ( ( 24 * (height * height) )/10000), 1);
	if ( weight > Obj.good_w2.value )
	{
		document.getElementById('msg').innerHTML = "<span style = 'padding-left:29px'><font style = 'font-size:15px;color:#FA0300'>(超出標準了,多運動,控制一下飲食吧.祝福你!)</font></span>";
	
	}else if ( weight < Obj.good_w.value )
	{
		document.getElementById('msg').innerHTML = "<span style = 'padding-left:29px'><font style = 'font-size:15px;color:#FA0300'>(有點過瘦了,要多吃一點喔.祝福你!)</font></span>";
	}else{
		document.getElementById('msg').innerHTML = "<span style = 'padding-left:29px'><font style = 'font-size:15px;color:#1C19FF'>(身材維持的不錯喔,繼續加油.祝福你!)</font></span>";
	}
}

function check()
{
	var Obj = document.form1;
	if ( !dateV(Obj.year.options[Obj.year.selectedIndex].value, Obj.month.options[Obj.month.selectedIndex].value, Obj.day.options[Obj.day.selectedIndex].value) )
	{
		alert('請選擇正確的出生年月日!!');
		Obj.day.focus();
	
	}else if ( Obj.user_h.options[Obj.user_h.selectedIndex].value == '' )
	{
		alert('請選擇身高!!');
		Obj.user_h.focus();
	
	}else if ( Obj.user_w.options[Obj.user_w.selectedIndex].value == '' )
	{
		alert('請選擇體重!!');
		Obj.user_w.focus();
	}else{
		Obj.submit();
	}
}
//-->
</script>

<body>

<table border = '1' cellpadding = '0' cellspacing = '0' width = '760' class = 'header_table'>
<tr>
	<td><?PHP include_once ROOT_PATH . '/menubar.php';?></td>
</tr>
<tr>
	<td>
	<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
	<tr>
		<td>
		<div class = 'fast_link'>
		<?PHP
		$nowL = array('首頁' => 'health.php', '註冊會員' => '');
		echo show_path_url($nowL);
		?>
		</div>
		</td>
	</tr>
	<tr>
		<td align = 'center'>
		<table border =' 0' cellpadding = '0' cellspacing = '0' width = '100%'>
		<tr>
		   <td width = '180'><?PHP include_once ROOT_PATH . "/leftmenu.php";?></td>
		   <td valign = 'top' align = 'center'>
			<table border = '0' cellpadding = '2' cellspacing = '0' width = '98%'>
			<form id = 'form1' name = 'form1' method = 'post' action = 'user_health2.php'>
			<tr>
				<td align = 'right' valign = 'top' width = '50%'>
				<table border = '0' cellpadding = '4' cellspacing = '0' width = '100%'>
				<tr>
					<td colspan = '2'><div class = 'title3'>請輸入您的基本資料</div></td>
				</tr>
				<tr>	
					<td class = 'text15px' width = '30%'><div style = 'padding-left:15px'>性別</div></td>
					<td class = 'text15px'>
					<input type="radio" name="user_sex" id="user_sex" value="男" checked>男
					<input type="radio" name="user_sex" id="user_sex" value="女">女
					</td>
				</tr>
				<tr>	
					<td class = 'text15px'><span class="style4">﹡</span>出生年月日</td>
					<td class = 'text15px'>
					民國 <select id = 'year' name = 'year'>
					<?PHP
					for ($i = 1; $i <= (date("Y") - 1911); $i++)
					{
						echo "<option value = '" . ($i + 1911) . "'>" . $i . "</option>\n";
					}
					?>
					</select> 年
					<select id = 'month' name = 'month'>
					<?PHP
					for ($i = 1; $i <= 12; $i++)
					{
						echo "<option value = '" . $i . "'>" . $i . "</option>\n";
					}
					?>
					</select> 月
					<select id = 'day' name = 'day'>
					<?PHP
					for ($i = 1; $i <= 31; $i++)
					{
						echo "<option value = '" . $i . "'>" . $i . "</option>\n";
					}
					?>
					</select> 日
					</td>
				</tr>
				<tr>
					<td class = 'text15px' width = '20%'><span class="style4">﹡</span>身高</td>
					<td class = 'text15px'>
					<select id = 'user_h' name = 'user_h' onchange = 'Sumprice()'>
					<option value = '' selected>請選擇</option>
					<?PHP
					for ($i = 100; $i <= 200; $i++)
					{
						echo "<option value = '" . $i . "'>" . $i . "</option>\n";
					}
					?>
					</select> 公分
					</td>
				</tr>
				<tr>
					<td class = 'text15px'><span class="style4">﹡</span>體重</td>
					<td class = 'text15px'>
					<select id = 'user_w' name = 'user_w' onchange = 'Sumprice()'>
					<option value = '' selected>請選擇</option>
					<?PHP
					for ($i = 20; $i <= 150; $i++)
					{
						echo "<option value = '" . $i . "'>" . $i . "</option>\n";
					}
					?>
					</select> 公斤
					</td>
				</tr>
				<tr>
					<td class = 'text15px'><div style = 'padding-left:15px'>腰圍</span></td>
					<td class = 'text15px'>
					<select id = 'waistline' name = 'waistline'>
					<?PHP
					for ($i = 10; $i < 60; $i = $i + 0.5)
					{
						echo "<option value = '" . $i . "'>" . $i . "</option>\n";
					}
					?>
					</select> 吋
					</td>
				</tr>
				<tr>
					<td class = 'text15px' colspan = '2'><span style = 'padding-left:15px'>您的身體質量指數 (BMI) 為</span>
					<input name="bmi" type="text" id="bmi" size="3" readonly></td>
				</tr>
				<tr>
					<td colspan = '2' id = 'msg' name = 'msg'>&nbsp;</td>
				</tr>
				<tr>
					<td class = 'text15px' colspan = '2'><span style = 'padding-left:15px'>您的理想體重為
					<input name="good_w" type="text" id="good_w" size="3" readonly>
					~
					<input name="good_w2" type="text" id="good_w2" size="3" readonly></td>
				</tr>
				</table>
				</td>
				<td align = 'left' valign = 'top' width = '55%'>
				<table border = '0' cellpadding = '4' cellspacing = '0' width = '90%'>
				<tr>
					<td colspan = '2'>&nbsp;</td>
				</tr>
				<tr>
					<td class = 'text15px' align = 'left'>糖尿病</td>
					<td class = 'text15px' align = 'left'>
					<input type="radio" name="diabetes" id="diabetes" value="有">有
					<input type="radio" name="diabetes" id="diabetes" value="沒有" checked>沒有
					<input type="radio" name="diabetes" id="diabetes" value="不知道">不知道
					</td>
				</tr>
				<tr>	
					<td class = 'text15px' align = 'left'>高血壓</td>
					<td class = 'text15px' align = 'left'>
					<input type="radio" name="hypertension" id="hypertension" value="有">有
					<input type="radio" name="hypertension" id="hypertension" value="沒有" checked>沒有
					<input type="radio" name="hypertension" id="hypertension" value="不知道">不知道
					</td>
				</tr>
				<tr>	
					<td class = 'text15px' align = 'left'>心臟病</td>
					<td class = 'text15px' align = 'left'>
					<input type="radio" name="heart" id="heart" value="有">有
					<input type="radio" name="heart" id="heart" value="沒有" checked>沒有
					<input type="radio" name="heart" id="heart" value="不知道">不知道
					</td>
				</tr>
				<tr>	
					<td class = 'text15px' align = 'left'>腎臟病</td>
					<td class = 'text15px' align = 'left'>
					<input type="radio" name="kidney" id="kidney" value="有" onclick = 'show_kidney(true)'>有
					<input type="radio" name="kidney" id="kidney" value="沒有" checked  onclick = 'show_kidney(false)'>沒有
					<input type="radio" name="kidney" id="kidney" value="不知道" onclick = 'show_kidney(false)'>不知道
					</td>
				</tr>
				<tr id = 'showkidney' name = 'showkidney' style = 'display:none' align = 'left'>
					<td colspan = '2'><font style = 'font-size:15px'>
					<input type = 'radio' id = 'kidney_cure' name = 'kidney_cure' value = '' checked>無洗腎，有洗腎
					<input type = 'radio' id = 'kidney_cure' name = 'kidney_cure' value = 'HD'>血液透析(HD)
					<div style = 'padding-left:129px'><input type = 'radio' id = 'kidney_cure' name = 'kidney_cure' value = 'CAPD'>腹膜透析(CAPD)</div>
					</font>
					</td>
				</tr>
				<tr>
					<td colspan = '2'><div style = 'padding-left:202px;padding-top:100px;'>
					<input type = 'hidden' id = 'userid' name = 'userid' value = '<?PHP echo $userid;?>'>
					<input type = 'button' name = 'next' id = 'next' value = '下一頁' onclick = 'check()'>
					</td>
				</tr>
				</table>
				</td>
			</tr>
			</form>
			</table>
			</td>
		</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td><?PHP include_once ROOT_PATH . "/footer.php";?></td>
	</tr>
	</table>
	</td>
</tr>
</table>

</body>
</html>