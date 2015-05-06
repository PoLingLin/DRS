
<?PHP
include_once 'config.php';
header_print(true);   //載入header檔
?>

<body>
	<?PHP include_once ROOT_PATH . '/menubar.php';?></td>
	<div class="container">	
	<div class="row">
		<div class="col-md-3 visible-lg visible-md"><?PHP include_once ROOT_PATH . "/leftmenu.php";?>
		</div>
		<div class="col-md-6">
		<a href="food.php?class=food1"><img src="img/index_staples.jpg" width="100%"  border="0"></a>
		<a href="food.php?class=food6"><img src="img/index_bs_staples.jpg" width="100%" border="0"></a>
		<a href="food.php?class=food4"><img src="img/index_vegetables.jpg" width="100%"  border="0"></a>
		<a href = 'food.php?class=food7&class2=<?PHP echo rawurlencode('飲料');?>'"><img src="img/index_drink.jpg" width="100%" border="0"></a>
		<h5>均衡飲食 是健康的基礎</h5>
		</div>
		
		<div class="col-md-3 visible-lg visible-md"><?PHP include_once "right_menu.php";?></div>
		<?PHP include_once ROOT_PATH . "/footer.php";?>
		
    </div> <!-- /container -->
