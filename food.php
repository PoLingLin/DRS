<?PHP
include "config.php";

header_print(true);   //載入header檔

?>

<style type="text/css">
<!--
.style2 {font-size: 11pt}
.style3 {color: #000000}
.style5 {font-size: 10pt}
.style6 {font-size: 10pt; color: #000000; }
.style8 {font-size: 10pt}
.style10 {font-size: 10px}
-->
</style>

<table border = '1' cellpadding = '0' cellspacing = '0' width = '760' class = 'header_table'>
<tr>
	<td><?PHP include_once ROOT_PATH . '/menubar.php';?></td>
</tr>
<tr>
	<td valign = 'top'>
	<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%' valign = 'top'>
	<tr>
		<td>
		<div class = 'fast_link'>
        <?PHP
		$nowL = array('首頁' => 'index.php', '認識食物' => 'food.php');
		echo show_path_url($nowL);
		?>
        
		<?PHP /*
		$nowL['首頁'] = 'index.php';
		$nowL['認識食物'] = '';
		if ( trim($_GET['class']) != '' ) { $nowL[$FOODTYPE[$_GET['class']]] = ''; }
		echo show_path_url($nowL);*/
		?>
		</div>
		</td>
	</tr>
	<tr>
		<td valign = 'top'>
		<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%' valign = 'top'>
		  <!--DWLayoutTable-->
		<tr>
			<td width="122" height="79" valign = 'top' class = 'leftmenu'>
			  <?PHP include_once ROOT_PATH . "/leftmenu2.php"; ?>			</td>
			<td width="500" valign = 'top'>
			      <table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
			        <tr>
			          <td>
			            <table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
			                <tr>
			                  <td><div class = 'title3'><img src="img/knowfood.jpg" ></div></td>
					        <td align = 'right'><!--DWLayoutEmptyCell-->&nbsp;</td>
				        </tr>
		            </table>			
					</tr>
					<form action = 'food.php?class=<?PHP echo $_GET['class'];?>&class2=<?PHP echo $_GET['class2'];?>' method = 'post' id = 'sort_form' name = 'sort_form'>
					<tr>
						<td><div style = 'padding-left:20px'>
						排序依據：
						<select id = 'orderby' name = 'orderby'>
							<option value = 'ch_name' <?PHP if ($_POST['orderby'] == 'ch_name' || $_GET['orderby'] == 'ch_name') echo 'selected';?>>食物名稱</option>
							<option value = 'kg' <?PHP if ($_POST['orderby'] == 'kg' || $_GET['orderby'] == 'kg') echo 'selected';?>>重量</option>
							<option value = 'ch_k' <?PHP if ($_POST['orderby'] == 'ch_k' || $_GET['orderby'] == 'ch_k') echo 'selected';?>>卡洛里</option>
							<option value = 'ch_cholesterol' <?PHP if ($_POST['orderby'] == 'ch_cholesterol' || $_GET['orderby'] == 'ch_cholesterol') echo 'selected';?>>膽固醇</option>
							<option value = 'ch_fat' <?PHP if ($_POST['orderby'] == 'ch_fat' || $_GET['orderby'] == 'ch_fat') echo 'selected';?>>脂肪</option>
							<option value = 'ch_e' <?PHP if ($_POST['orderby'] == 'ch_e' || $_GET['orderby'] == 'ch_e') echo 'selected';?>>蛋白質</option>
							<option value = 'ch_carbohydrate' <?PHP if ($_POST['orderby'] == 'ch_carbohydrate' || $_GET['orderby'] == 'ch_carbohydrate') echo 'selected';?>>醣類</option>
							<option value = 'ch_potassium' <?PHP if ($_POST['orderby'] == 'ch_potassium' || $_GET['orderby'] == 'ch_potassium') echo 'selected';?>>鉀</option>
							<option value = 'ch_sodium' <?PHP if ($_POST['orderby'] == 'ch_sodium' || $_GET['orderby'] == 'ch_sodium') echo 'selected';?>>鈉</option>
							<option value = 'ch_calcium' <?PHP if ($_POST['orderby'] == 'ch_calcium' || $_GET['orderby'] == 'ch_calcium') echo 'selected';?>>鈣</option>
							<option value = 'ch_phosphorous' <?PHP if ($_POST['orderby'] == 'ch_phosphorous' || $_GET['orderby'] == 'ch_phosphorous') echo 'selected';?>>磷</option>
							<option value = 'ch_mg' <?PHP if ($_POST['orderby'] == 'ch_mg' || $_GET['orderby'] == 'ch_mg') echo 'selected';?>>鎂</option>
							<option value = 'ch_iron' <?PHP if ($_POST['orderby'] == 'ch_iron' || $_GET['orderby'] == 'ch_iron') echo 'selected';?>>鐵</option>
							<option value = 'ch_zinc' <?PHP if ($_POST['orderby'] == 'ch_zinc' || $_GET['orderby'] == 'ch_zinc') echo 'selected';?>>鋅</option>
						</select>
						<select id = 'sort' name = 'sort'>
							<option value = 'ASC' <?PHP if ($_POST['sort'] == 'ASC' || $_GET['sort'] == 'ASC') echo 'selected';?>>由低到高</option>
							<option value = 'DESC' <?PHP if ($_POST['sort'] == 'DESC' || $_GET['sort'] == 'DESC') echo 'selected';?>>由高到低</option>
						</select>
						<input type = 'submit' id = 'order_sort' name = 'order_sort' value = '排序'>
						</div>
						</td>
					</tr>
					</form>
			        <tr>
			          <td>
			            <table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
			              <tr>
			                <?PHP
				$start_num = (!$_GET['page'])? '0' : $_GET['page'] * PAGE_NUM; //SQL開始筆數
				$page = ($_GET['page'])? $_GET['page'] : 0;                    //設定目前頁數
				$i = 1;

				$orderby    = ( trim($_POST['orderby']) != '' )? $_POST['orderby'] : $_GET['orderby'];
				$sort       = ( trim($_POST['sort']) != '' )? $_POST['sort'] : $_GET['sort'];
				$order_name = ( trim($orderby) != '' )? $orderby : 'ch_name';           //設定排序欄位
				$sort       = ( trim($sort) != '' )? $sort : 'ASC';                     //設定排序規則
				$ORDER_BY   = ' ORDER BY ' . $order_name . ' ' . $sort;

				if ( trim($_POST['keyword']) != '' || $_GET['type'] == 'search')
				{
					$key = ( trim($_POST['keyword']) != '' )? trim($_POST['keyword']) : trim(rawurldecode($_GET['keyword']));  //查詢關鍵字
					$food_total = countSQL('choose_food', 'ch_id', "WHERE ch_name LIKE '%" . $key . "%'");   //計算該類別的食物總數
					$total_page = ceil($food_total / PAGE_NUM);                    //計算總共頁數
					$sql = "SELECT * FROM choose_food WHERE ch_name LIKE '%" . $key . "%' " . $ORDER_BY . " LIMIT " . $start_num . "," . PAGE_NUM;
					
				}else{
					
					$sqlwhe = " WHERE ";
					$sqlwhe .= ($_GET['class'])? "ch_kind = '" . $_GET['class'] . "'" : "ch_kind = 'food1'";
					$sqlwhe .= ( trim($_GET['class2']) != '')? " AND ch_kind2 = '" . rawurldecode($_GET['class2']) . "'" : '';
					$food_total = countSQL('choose_food', 'ch_id', $sqlwhe);   //計算該類別的食物總數
					$total_page = ceil($food_total / PAGE_NUM);                    //計算總共頁數
					$sql = "SELECT * FROM choose_food " . $sqlwhe . $ORDER_BY . " LIMIT " . $start_num . "," . PAGE_NUM;
				}
				$result = mysql_query($sql);
				while ( $row = mysql_fetch_array($result) )
				{
					echo "<td width = '33%' align = 'left' valign = 'top'><div style = 'padding-left:20px''padding-top:10px'>\n";
					echo "<table border = '0' cellpadding = '2' cellspacing = '1' width = '100%'>\n";
					echo "<tr>\n";
					echo "	<td valign = 'top' align = 'left' width = '200'><a href = 'javascript:view_food(" . $row['ch_id'] . ",1)'><img src = '" . IMG_URL . "/" . $row['ch_image'] . "' width = '200' height = '200' border = '0'></a><br>\n";
					echo "  <font style = 'color:#3937FF'>" . $row['ch_name'] . "</font> " . check_type_1($row['ch_k'], 651, 650, 501, 500) . "\n";
					echo "	<div>" . $row['ch_k'] . "卡</div></td>\n";
					echo "</td>\n";
					echo "</tr>\n";
					echo "</table>\n";
					echo "</div></td>\n";	
					if ( $i % 2 == 0)
					{
						echo "</tr><tr>\n";
					}
					$i++;
				}
				?>
                      </table>				</td>
			        </tr>
		          </table>			      <div style = 'padding-top:5px;padding-bottom:5px'>
			        <table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
			          <tr>
			            <td align = 'center' class = 'text13px'>
		                <?PHP
				if ( $food_total > PAGE_NUM )   //判斷資料庫中的資料是否大於每頁顯示數量
				{
					$href = ( trim($_POST['keyword'] != '') || $_GET['type'] == 'search' )? "type=search&keyword=" . rawurlencode(trim($key)) : "class=" . $_GET['class'] . "&class2=" . rawurlencode(trim($_GET['class2'])) . "&orderby=" . $orderby . "&sort=" . $sort;
					echo "<a href = '" . ROOT_URL . "/food.php?" . $href . "'>第一頁</a>";
					if ($page > 0)
					{
						$up = $page - 1;
						echo "<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/food.php?" . $href . "&page=" . $up . "&orderby=" . $orderby . "&sort=" . $sort . "'>上一頁</a></span>";
					}
					if ($page < ($total_page - 1))
					{
						$next = $page + 1;
						echo "<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/food.php?" . $href . "&page=" . $next . "&orderby=" . $orderby . "&sort=" . $sort . "'>下一頁</a></span>";
					}
					echo "<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/food.php?" . $href . "&page=" . ($total_page - 1) . "&orderby=" . $orderby . "&sort=" . $sort . "'>最後一頁</a></span>";
				}
				?>				</td>
			        </tr>
		            </table>
                </div></td>
			<td valign = 'top' class = 'rightmenu'><?PHP include_once 'right_menu.php';?></td>
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
	</td>
</tr>
</table>
</body>
</html>
