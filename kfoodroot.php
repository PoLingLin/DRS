<?PHP
include "config.php";

if ( !ck_guest_value(session_id()) )
{
	phpDirect(ROOT_URL . '/health1.php');
}

header_print(true);   //載入header檔
?>

<style type="text/css">
<!--
.style2 {font-size: 11pt}
.style3 {color: #000000}
.style5 {font-size: 10pt}
.style6 {font-size: 10pt; color: #000000; }
-->
</style>

<link href="css/style.css" rel="stylesheet" type="text/css">
<body>

<table border = '0' cellpadding = '0' cellspacing = '0' width = '760' class = 'header_table'>
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
		$nowL = array('首頁' => 'index.php', '配餐' => 'kfoodroot.php');
		echo show_path_url($nowL);
		?>
		</div>
		</td>
	</tr>
	<tr>
		<td valign = 'top' align = 'center'>
		<table border = '0' cellpadding = '2' cellspacing = '0' width = '100%'>
		  <!--DWLayoutTable-->
		<tr>
			<td height="518" valign = 'top' class = 'leftmenu'>
			<div style = 'padding-left:10px'>
			  <div class = 'title'><img src="img/leftmenu_tittle03.jpg" width="155" height="45" border="0"></div>
			</div>
			<table border = '0' cellpadding = '2' cellspacing = '1' width = '100%'>
			<tr>
				<td class = 'text13px'>
				<div style = 'padding-left:56px;padding-top:5px'>
				餐別
				<select id = 'meal' name = 'meal' style = 'font-size:13px' onchange = 'show_food()'>
					<option value = 'breakfast'>早餐</option>
					<option value = 'lunch'>午餐</option>
					<option value = 'dinner'>晚餐</option>
				</select>
				</div>
				<div style = 'padding-top:10px;padding-left:15px'>
				佔一天份量
				<select id = 'percent' name = 'percent' onchange = 'show_food()' style = 'font-size:13px'>
					<option value = '' selected>請選擇</option>
					<option value = '6'>1 / 6</option>
					<option value = '5'>1 / 5</option>
					<option value = '4'>1 / 4</option>
					<option value = '3'>1 / 3</option>
					<option value = '2'>1 / 2</option>
					<option value = '1'>1</option>
				</select>
				</div>				</td>
			</tr>
            
            <!--種類選單-->
			<tr id = 'food' name = 'food' style = 'display:none'>
				<td class = 'text13px'>
				<div style = 'padding-top:10px;padding-left:30px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food1' id = 'food1' name = 'food1'>全榖根莖類</a></div>
				<div style = 'padding-top:10px;padding-left:30px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food2' id = 'food2' name = 'food2'>豆魚肉蛋類</a></div>
				<div style = 'padding-top:10px;padding-left:30px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food3' id = 'food3' name = 'food3'>蔬菜類</a></div>
				<div style = 'padding-top:10px;padding-left:30px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food4' id = 'food4' name = 'food4'>水果類</a></div>
				<div style = 'padding-top:10px;padding-left:30px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food5' id = 'food5' name = 'food5'>油脂類</a></div>
				<div style = 'padding-top:10px;padding-left:30px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food6' id = 'food6' name = 'food6'>奶類</a></div>
				<div style = 'padding-top:10px;padding-left:30px'><a href = "javascript:show_display('other_div');" id = 'food7' name = 'food7' onmouseover = "show_display('other_div');">其它</a></div>				
				<div id = 'other_div' name = 'other_div' style = 'display:none'>
				<div style = 'padding-top:5px;padding-left:35px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7' id = 'class2_food1' name = 'class2_food1'>調味料</a></div>
				<div style = 'padding-top:5px;padding-left:35px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7' id = 'class2_food2' name = 'class2_food2'>中式早餐</a></div>
				<div style = 'padding-top:5px;padding-left:35px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7' id = 'class2_food3' name = 'class2_food3'>西式早餐</a></div>
				<div style = 'padding-top:5px;padding-left:35px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7' id = 'class2_food4' name = 'class2_food4'>家常菜</a></div>
				<div style = 'padding-top:5px;padding-left:35px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7' id = 'class2_food5' name = 'class2_food5'>小吃</a></div>
				<div style = 'padding-top:5px;padding-left:35px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7' id = 'class2_food6' name = 'class2_food6'>套餐</a></div>
				<div style = 'padding-top:5px;padding-left:35px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7' id = 'class2_food7' name = 'class2_food7'>零食點心</a></div>
				<div style = 'padding-top:5px;padding-left:35px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7' id = 'class2_food8' name = 'class2_food8'>飲料</a></div>
				<div style = 'padding-top:5px;padding-left:35px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7' id = 'class2_food9' name = 'class2_food9'>酒類</a></div>
				</div>
				</td>
			</tr>
            
            
			</table>
            
			<?PHP
			//先判斷是否為會員,修改健檢資料
			if ($USER['userid'] != '')
			{
				echo "<div style = 'padding-top:5px;padding-left:10px'><a href = '" . ROOT_URL . "/useredit2.php'><div class = 'title'>修改健檢資料</div></a></div>\n";
			}else if ( $USER['session_id'] != '')
			{
				echo "<div style = 'padding-top:5px;padding-left:10px'><a href = '" . ROOT_URL . "/health1.php'><div class = 'title'>修改健檢資料</div></a></div>\n";
			}
			//先判斷是否為會員,清除健檢資料
			if ($USER['session_id'] != '')
			{
				$id = $USER['health_id'];
				$id2 = $USER['session_id'];
				if($USER['health_id'] != '' && $_GET['action'] == 'dele')
				{					
		        //刪除資料庫資料語法
        			$sql = "delete from guest_health where health_id='$id'";
					$sql2 = "delete from guest_food where session_id='$id2'";
		  	      if(mysql_query($sql))
    			  {
	       			 showMsg('清除成功!!');
	     			 reDirect(ROOT_URL . "/index.php");
				  }				 				 
				  else
				  {
		   		     showMsg('清除失敗，請洽系統管理員!!');
	    			 reDirect(ROOT_URL . "/index.php");
 				  }
				  if(mysql_query($sql2))
    			  {
	       			 showMsg('清除成功!!');
	     			 reDirect(ROOT_URL . "/index.php");
				  }				 				 
				  else
				  {
		   		     showMsg('清除失敗，請洽系統管理員!!');
	    			 reDirect(ROOT_URL . "/index.php");
 				  }
				}
				echo "<div style = 'padding-top:5px;padding-left:10px'><a href = 'kfoodroot.php?action=dele&id=" . $id . "&id2=".$id2."' onclick = 'return confirm(\"確定要刪除嗎?\")' id='action'><div class = 'title'>清除資料</div></a></div>\n";
			}
			
			
			//今日配餐紀錄			
			echo "<div style = 'padding-top:5px;padding-left:10px;'>\n";
			echo "<div class = 'title'>今日配餐紀錄</div></div>\n";
			if ( countSQL('guest_food', 'id', "WHERE session_id = '" . session_id() . "'") > 0 )
			{				
				$sql = "SELECT rand, percent, meal, flag FROM guest_food WHERE session_id = '" . session_id() . "'";
				$result = mysql_query($sql);
				while ( $row = mysql_fetch_array($result) )
				{
					$logPlate[$row['rand']]['percent'] = $row['percent']; //份量
					$logPlate[$row['rand']]['meal']    = $row['meal'];    //餐別
					$logPlate[$row['rand']]['flag']    = $row['flag'];    //判斷是否已送出
				}

				foreach ( $logPlate as $key => $value )
				{
					$percent = ($logPlate[$key]['percent'] == 1)? '1' : "1/" . $logPlate[$key]['percent'];
					if ($logPlate[$key]['flag'] == 1)
					{
						echo "<div style = 'padding-top:5px;padding-left:30px' class = 'text13px'><a href = '" . ROOT_URL . "/save_plate.php?percent=" . $logPlate[$key]['percent'] . "&meal=" . $logPlate[$key]['meal'] . "'>" . $MEALTYPE[$logPlate[$key]['meal']] . " - 份量：" . $percent . "</a></div>\n";
					}else{
						echo "<div style = 'padding-top:5px;padding-left:30px' class = 'text13px'><a href = '" . ROOT_URL . "/food_plate.php?percent=" . $logPlate[$key]['percent'] . "&meal=" . $logPlate[$key]['meal'] . "&rand=" . $key . "'>" . $MEALTYPE[$logPlate[$key]['meal']] . " - 份量：" . $percent . "</a></div>\n";
					}
				}
				echo "</div>\n";
			}
			else
			{
				echo "<div style = 'padding-top:5px;padding-left:15px' class = 'text13px'>尚無配餐紀錄</div>\n";
			}
			
			//我的配餐紀錄
			echo "<div id = 'oldplate' name = 'oldplate' style = 'padding-top:10px;padding-left:10px;'>\n";
			if ( $USER['userid'] != '' )
			{ 
				$i = 0;
				echo "<div class = 'title'>我的配餐紀錄</div>\n";
				$plate = mysql_query("SELECT * FROM user_food WHERE userid = '" . $USER['userid'] . "' ORDER BY add_time DESC LIMIT 0,5");
				while ( $prow = mysql_fetch_array($plate) )
				{
					echo "<div style = 'padding-top:5px;padding-left:10px'><a href = '' id = 'plate_" . $i . "' name = 'plate_" . $i . "'><font style = 'font-size:13px'>" . date("Y-m-d", $prow['add_time']) . " - " . $MEALTYPE[$prow['meal']] . "</font></a></div>\n";
					echo "<input type = 'hidden' id = 'plateid_" . $i . "' name = 'plateid_" . $i . "' value = '" . $prow['id'] . "'>\n";
					$i++;
				}
				if ($i == 0)
				{
					echo "<div style = 'padding-top:5px;padding-left:15px' class = 'text13px'>尚無配餐紀錄</div>\n";
				}
				echo "<input type = 'hidden' id = 'plate_no' name = 'plate_no' value = '" . $i . "'>\n";
			}
			echo "</div>\n";
			?>			</td>
			<td width="512" valign = 'top' style = 'padding:0 10 0 5'>
			<div class = 'title3'>配餐</div>       
            <img src = '<?PHP echo ROOT_URL;?>/img/吃的金字塔.jpg' width = '500'>			
<!-----------------------------------------------------------------------------------------------------------
					<form action = 'search_plate.php??percent=5&meal=breakfast&rand=113012130' method = 'post' id = 'searchplateform' name = 'searchplateform'>
					<?PHP/*
					if ( $USER['userid'] != '' )
					{*/
					?>
<div style = 'padding-right:5px'>
							<select id = 'year' name = 'year'>
							<?PHP/*
							for ($i = 2009; $i <= date("Y"); $i++)
							{
								$selected = ( $i == date("Y") )? 'selected' : '';
								echo "<option value = '" . $i . "' " . $selected . ">" . $i . "</option>\n";
							}*/
							?>
							</select> 年
							<select id = 'month' name = 'month'>
							<?PHP/*
							for ($i = 1; $i <= 12; $i++)
							{
								$selected = ( $i == date("n") )? 'selected' : '';
								echo "<option value = '" . $i . "' " . $selected . ">" . $i . "</option>\n";
							}*/
							?>
							</select> 月
							<select id = 'day' name = 'day'>
							<?PHP/*
							for ($i = 1; $i <= 31; $i++)
							{
								$selected = ( $i == date("d") )? 'selected' : '';
								echo "<option value = '" . $i . "' " . $selected . ">" . $i . "</option>\n";
							}*/
							?>
							</select> 日
							<input type = 'button' id = 'platesearch' name = 'platesearch' value = '查詢配餐紀錄' style = 'width:95px' onclick = 'cksearchplate()'>
							</div>
                            
                            <?php/* } */?>
                            </form>
----------------------------------------------------------------------------------------------------------->
			</td>   
			<td width="17" align = 'center' valign = 'top' class = 'rightmenu'><?PHP include_once 'right_menu.php';?></td>
		<td width="32">&nbsp;</td>
		</tr>
		</table>
		</td>
	</tr>
	</table>
	</td>
</tr>
<tr>
	<td>
	<?PHP include_once ROOT_PATH . "/footer.php";?>
	</td>
</tr>
</table>

<script language = 'javascript'>
<!--
function show_food()
{
	if (document.getElementById('percent').options[document.getElementById('percent').selectedIndex].value == '')
	{
		document.getElementById('food').style.display = 'none';
	}else{
		var p_value = document.getElementById('percent').options[document.getElementById('percent').selectedIndex].value;
		var m_value = document.getElementById('meal').options[document.getElementById('meal').selectedIndex].value;
		document.getElementById('food').style.display = 'block';
		var rand = get_random(1, 999999999);
		document.getElementById('food1').href = "<?PHP echo ROOT_URL;?>/rootstalk.php?class=food1&percent=" + p_value + "&meal=" + m_value + "&rand=" + rand;
		document.getElementById('food2').href = "<?PHP echo ROOT_URL;?>/rootstalk.php?class=food2&percent=" + p_value + "&meal=" + m_value + "&rand=" + rand;
		document.getElementById('food3').href = "<?PHP echo ROOT_URL;?>/rootstalk.php?class=food3&percent=" + p_value + "&meal=" + m_value + "&rand=" + rand;
		document.getElementById('food4').href = "<?PHP echo ROOT_URL;?>/rootstalk.php?class=food4&percent=" + p_value + "&meal=" + m_value + "&rand=" + rand;
		document.getElementById('food5').href = "<?PHP echo ROOT_URL;?>/rootstalk.php?class=food5&percent=" + p_value + "&meal=" + m_value + "&rand=" + rand;
		document.getElementById('food6').href = "<?PHP echo ROOT_URL;?>/rootstalk.php?class=food6&percent=" + p_value + "&meal=" + m_value + "&rand=" + rand;
		
		document.getElementById('class2_food1').href = "<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo rawurlencode('調味料');?>&percent=" + p_value + "&meal=" + m_value + "&rand=" + rand;
		document.getElementById('class2_food2').href = "<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo rawurlencode('中式早餐');?>&percent=" + p_value + "&meal=" + m_value + "&rand=" + rand;
		document.getElementById('class2_food3').href = "<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo rawurlencode('西式早餐');?>&percent=" + p_value + "&meal=" + m_value + "&rand=" + rand;
		document.getElementById('class2_food4').href = "<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo rawurlencode('家常菜');?>&percent=" + p_value + "&meal=" + m_value + "&rand=" + rand;
		document.getElementById('class2_food5').href = "<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo rawurlencode('小吃');?>&percent=" + p_value + "&meal=" + m_value + "&rand=" + rand;
		document.getElementById('class2_food6').href = "<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo rawurlencode('套餐');?>&percent=" + p_value + "&meal=" + m_value + "&rand=" + rand;
		document.getElementById('class2_food7').href = "<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo rawurlencode('零食點心');?>&percent=" + p_value + "&meal=" + m_value + "&rand=" + rand;
		document.getElementById('class2_food8').href = "<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo rawurlencode('飲料');?>&percent=" + p_value + "&meal=" + m_value + "&rand=" + rand;
		document.getElementById('class2_food9').href = "<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo rawurlencode('酒類');?>&percent=" + p_value + "&meal=" + m_value + "&rand=" + rand;

		var plate_no = document.getElementById('plate_no').value;
		document.getElementById('oldplate').style.display = 'block';
		for (i = 0; i < plate_no; i++)
		{
			var pid = document.getElementById('plateid_' + i).value;
			document.getElementById('plate_' + i).href = "<?PHP echo ROOT_URL;?>/oldplate.php?percent=" + p_value + "&meal=" + m_value + "&rand=" + rand + "&pid=" + pid;
		}
	}
}

function show_other_div()
{
	if ( document.getElementById('other_div').style.display == 'none' )
	{
		document.getElementById('other_div').style.display = 'block';
	}else{
		document.getElementById('other_div').style.display = 'none';
	}
}
//-->
</script>
</body>
</html>