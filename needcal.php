<link href="css/style.css" rel="stylesheet" type="text/css" />
<?PHP
echo "<div class = 'text13px'>\n";

if ($USER['userid'] != '')
{
	if ( $_GET['meal'] != '' && $_GET['percent'] != '')
	{
		echo "<div class = 'title'>本餐所需</div>\n";
		echo "<div style = 'padding-top:5px;padding-left:10px' class = 'text13px'>\n";
		$per_cal = round($USER['need_cal'] * (1 / $_GET['percent']) ); 
		$per = ( $_GET['percent'] == 1 )? '1' : '1/' . $_GET['percent'];
		echo '餐別：' . $MEALTYPE[$_GET['meal']] . "<br>";
		echo '佔一天份量：' . $per . '份<br>';
		echo '本餐所需熱量：' . $per_cal . '<br>';
		$mealcal = get_meal_count_cal($per_cal, session_id(), $_GET['meal']);
		if ($mealcal < 0)
		{
			$color = "color = '#FF0000'";
		}
		echo '本餐攝取限制：<font id = "mealcal" name = "mealcal" ' . $color . '>' . $mealcal . '</font><br></div>';
	}
	echo "<div class = 'title'>一日所需</div>\n";
	echo "<div style = 'padding-left:10px;padding-top:5px;'>\n";
	$good_w = explode('.' , $USER['good_w']);
	$good_w2 = explode('.' , $USER['good_w2']);
	echo '理想體重為：' . $good_w[0] . ' ~ ' . $good_w2[0] . 'kg<br>';
	$needCal = get_count_cal($USER['need_cal'], session_id());
	if ($needCal < 0)
	{
		$colors = "color = '#FF0000'";
	}
	echo '一日所需熱量：' . $USER['need_cal'] . "</font><br>";
	echo '剩餘可攝取熱量：<font id = "needcal" name = "needcal" ' . $colors . '>' . $needCal . "</font><br></div>";

}else if ( $USER['session_id'] != '' ){
	
	echo "<div class = 'title'>一日所需</div>\n";
	echo "<div style = 'padding-top:10px' class = 'text13px'>\n";
	$good_w = explode('.' , $USER['good_w']);
	$good_w2 = explode('.' , $USER['good_w2']);
	if ( $_GET['meal'] != '' && $_GET['percent'] != '')
	{
		$per_cal = round($USER['need_cal'] * (1 / $_GET['percent']) ); 
		$per = ( $_GET['percent'] == 1 )? '1' : '1/' . $_GET['percent'];
		echo '餐別：' . $MEALTYPE[$_GET['meal']] . "<br>";
		echo '佔一天份量：' . $per . '份<br>';
		echo '本餐所需熱量：' . $per_cal . '<br>';
	}
	echo '理想體重為：' . $good_w[0] . ' ~ ' . $good_w2[0] . 'kg<br>';
	$needCal = get_count_cal($USER['need_cal'], session_id());
	if ($needCal < 0)
	{
		$color = "color = '#FF0000'";
	}
	echo '一日所需熱量：' . $USER['need_cal'] . "</font></div>";
}
echo "</div>\n";

?>