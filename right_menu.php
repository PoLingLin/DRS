<?PHP
include "config.php";

?>
<?PHP
if ( ck_login(session_id()) )
{
	echo "<table width = '263' border = '0' cellpadding = '0' cellspacing = '0'>\n";
	echo "<tr>\n";
	echo "	<td valign = 'top'><span style = 'padding-right:10px'>\n";
	$showName = ( trim($USER['c_name']) != '')? $USER['c_name'] : $USER['username'];
	echo "<a href = '" . ROOT_URL . "/userinfo.php'> Hi!! " . $showName . "</a>\n";
	echo "<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/useredit.php'><font style = 'font-size:13px'>修改資料</font></a></span>";
	echo "<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/logout.php'><font style = 'font-size:13px'>登出</font></a></span>\n";
	echo "</span></td>\n";
	echo "</tr>\n";
	echo "</table>\n";
}
?>
<table width="262" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="263" height="65" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr>
        <td width="262" height="65" valign="top"><img src="img/search_01.jpg" width="263" height="65" /></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="18" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
	  <?PHP
	  if ( trim($_GET['percent']) != '' && trim($_GET['meal']) != '' && trim($_GET['rand']) != '' )
	  {
	      echo "<form action = '" . ROOT_URL . "/rootstalk.php?percent=" . $_GET['percent'] . "&meal=" . $_GET['meal'] . "&rand=" . $_GET['rand'] . "' method = 'post' id = 'searchform' name = 'searchform'>\n";
	  }else{
		  echo "<form action = '" . ROOT_URL . "/food.php' method = 'post' id = 'searchform' name = 'searchform'>\n";
	  }
	  ?>
      <tr>
        <td width="27" height="18" valign="top"><img src="img/search_02.jpg" width="27" height="18" /></td>
        <td width="148" valign="top"><input type = 'text' id = 'keyword' name = 'keyword' style="font-size: 8.5pt; width: 145px; height: 15; border: 1px solid #C0C0C0; padding-left: 0px; padding-right: 0px" size="15" value = '請輸入食物名稱' onclick = 'this.value = ""'></td>
        <td width="19" valign="top"><img src="img/search_03.jpg" width="19" height="18" /></td>
        <td width="35" valign="top"><a href = 'javascript:cksearch()'><img src="img/search_06.jpg" width="35" height="18" border = '0'></a></td>
	
        <td width="34" valign="top"><img src="img/search_04.jpg" width="34" height="18" /></td>
      </tr>
	  </form>
    </table></td>
  </tr>
  <tr>
    <td height="25" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr>
        <td width="263" height="25" valign="top"><img src="img/search_05.jpg" width="263" height="25" /></td>
		
        </tr>
      
    </table></td>
  </tr>
  <tr>
    <td height="54" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr>
        <td width="263" height="36" valign="top"><img src="img/right_menu_03.jpg" width="262" height="36" border="0" /></td>
        </tr>
      <tr>
        <td height="18" valign="top"><span class="text15px">
        <?PHP
		$food = get_food_plate(session_id());
		if ( count($food) == 0 )
		{
			echo "<div style = 'padding-top:10px;padding-left:5px'><font class = 'redvalue' style = 'font-size:13px'>您的餐盤尚無食物</font></div>";
		}else{
			echo "<table border = '0' cellpadding = '4' cellspacing = '0' width = '100%'>\n";
			echo "<tr>\n";
			echo "	<td class = 'text13px'>食物名稱</td>\n";
			echo "	<td class = 'text13px' width = '21%'>份量</td>\n";
			echo "	<td class = 'text13px' width = '21%'>熱量</td>\n";
			echo "</tr>\n";
			foreach ($food as $key => $value)
			{
				$food_name   = get_col_value("choose_food", "ch_name", "WHERE ch_id = '" . $value['food_id'] . "'");
				$foodN       = utf8_substr($food_name, 0, 18); //切割食物名稱
				$carTotal    = $carTotal + $value['cal'];      //卡洛里
				$thismeal    = $value['meal'];                 //餐別
				$thispercent = ($value['percent'] == '1')? $value['percent'] : "1/" . $value['percent']; //佔一天份量
				echo "<tr>\n"; 
				echo "	<td class = 'text13px'>\n";
				echo "	<a href = 'javascript:view_food(" . $value['food_id'] . ")' title = '" . $food_name . "'>" . $foodN . "</a>";
				echo "	</td>\n" ;
				echo "	<td class = 'text13px'>x " . $value['portion'] . "</td>\n";
				echo "	<td align = 'center' class = 'text13px'>" . $value['cal'] . "</td>\n";
				echo "</tr>\n";
			}
			echo "<tr>\n";
			echo "	<td colspan = '3' class = 'text13px' align = 'right'><hr>\n";
			echo "	<table border = '0' cellpadding = '1' cellspacing = '1' width = '100%'>\n";
			echo "	<tr>\n";
			echo "		<td class = 'text13px' align = 'left'>".dishes()."查詢餐盤...</a></td>\n";
			echo "		<td class = 'text13px' align = 'right'><span style = 'padding-right:12px'>總和：" . $carTotal . "</span></td>\n";
			echo "	</td>\n";
			echo "	</table>\n";
			echo "	</td>\n";
			echo "</tr>\n";
			echo "</table>\n";
		}
		?>	
        </span></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="22" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr>
        <td width="263" height="22" valign="top"><?PHP include_once 'needcal.php';?></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="117" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr>
        <td width="263" height="36" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <!--DWLayoutTable-->
          <tr>
            <td width="263" height="36" valign="top"><img src="img/right_menu_05.jpg" width="262" height="36" /></td>
              </tr>
          </table></td>
        </tr>
      <tr>
        <td height="27" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <!--DWLayoutTable-->
          <tr>
            <td width="263" height="8"></td>
              </tr>
		  <?PHP
		  $counter = get_counter();
		  ?>
          <tr>
            <td height="19" valign="top" class = 'text13px'>累計瀏覽人數：<?PHP echo $counter['all_total'];?></td>
              </tr>
          </table></td>
        </tr>
      <tr>
        <td height="27" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <!--DWLayoutTable-->
          <tr>
             <td width="263" height="4"></td>
              </tr>
          <tr>
            <td height="19" valign="top" class = 'text13px'>今日瀏覽人數：<?PHP echo $counter['today_total'];?></td>
              </tr>
            </table></td>
        </tr>
      <tr>
        <td height="27" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <!--DWLayoutTable-->
          <tr>
           <td class = 'text13px'>總計會員人數：<?PHP echo $counter['user_total'];?></td>
              </tr>
          
          </table></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="81" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr>
        <td width="263" height="81" valign="top"><a href="http://www.tsn.org.tw/" target="_blank"><img src="img/right_menu_07.jpg" width="262" height="81" border="0" /></a></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="81" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr>
        <td width="263" height="81" valign="top"><a href="http://www.nutrition.org.tw/" target="_blank"><img src="img/right_menu_08.jpg" width="262" height="81" border="0" /></a></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="81" valign="top">
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr>
        <td width="263" height="81" valign="top"><a href="http://www.endo-dm.org.tw/" target="_blank"><img src="img/right_menu_09.jpg" width="262" height="81" border="0" /></a></td>
      </tr>
    </table>   
	</td>
  </tr>
  
  	    <tr>
	    	<td><div class = 'title'>廣告區</div></td>	    		
	    </tr>
	    <tr>
	    	<td><div class = 'title2' style = 'padding-top:10px;padding-left:5px'>廣告一</div></td>
	    </tr>
	    <tr>
	    	<td><div class = 'title2' style = 'padding-top:10px;padding-left:5px'>廣告二</div></td>		    		
	    </tr>
  
	<?PHP
	if ( $USER['id'] != '' )
	{
		echo "<tr>\n";
		echo "   <td><div class = 'title'>飲料專區</div></td>\n";
	    echo "</tr>\n";
        echo "<tr>\n";
        echo "   <td><div style = 'padding-top:5px;padding-left:15px'><a href = 'https://spreadsheets.google.com/spreadsheet/viewform?formkey=dDBuRWtTcENuNFJ6eUhrLTNzaDQ1TUE6MQ' target = '_blank' title = '網路問卷--外食人口之健康飲食行為'>網路問卷--外食人口之健康飲食行為</a></div></td>\n";
        echo "</tr>\n";
	    echo "<tr>\n";
		echo "   <td><div class = 'title2' style = 'padding-top:10px;padding-left:5px'>減糖飲料攝取之妙招</div>\n";
		echo "   <div style = 'padding-top:5px;padding-left:15px'><a href = 'check_link.php?kind=1' target = '_blank' title = '妙招一:情緒轉換法'>妙招一:情緒轉換法</a></div>\n";
		echo "   <div style = 'padding-top:5px;padding-left:15px'><a href = 'check_link.php?kind=2' target = '_blank' title = '妙招二:同儕影響法'>妙招二:同儕影響法</a></div>\n";
		echo "   </td>\n";
	    echo "</tr>\n";
	}
	?>
</table>

<?php
function dishes()
{
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
						$dish = "<a href = '" . ROOT_URL . "/save_plate.php?percent=" . $logPlate[$key]['percent'] . "&meal=" . $logPlate[$key]['meal'] . "'>";
					}else
					{
						$dish = "<a href = '" . ROOT_URL . "/food_plate.php?percent=" . $logPlate[$key]['percent'] . "&meal=" . $logPlate[$key]['meal'] . "&rand=" . $key . "'>" ;
					}
				}
			}
			return $dish;
}
?>