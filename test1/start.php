<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="/view/styles.css">
		<title>Pizza</title>
	</head>
	<body>

<?php

use classes\Chek;

spl_autoload_register();

if (!isset($_GET['pizza'],$_GET['diametr'],$_GET['sous'])) { 
	
	echo '<form action="" method="GET">
	
	<select name="pizza">
		<option value="1" selected >пепперрони</option>
		<option value="2" >деревенская</option>
		<option value="3" >гавайская</option>
		<option value="4" >грибная</option></select>
		
	<select name="diametr">
		<option value="1" selected >21см</option>
		<option value="2" >26см</option>
		<option value="3" >31см</option>
		<option value="4" >45см</option></select>

	<select name="sous">
		<option value="1" selected >сырный</option>
		<option value="2" >кисло-сладкий</option>
		<option value="3" >чесночный</option>
		<option value="4" >барбекю</option></select>
		
		<input type="submit">
	</form>' ;
	} else 
		{$p= $_GET['pizza'];
		$d= $_GET['diametr'];
		$s= $_GET['sous'];
		
		if (is_numeric($p) and is_numeric($d) and is_numeric($s)) {
			echo "<img src=\"/img/$p.jpg\" ><br>";
			$v=new Chek;
			$v->get($p,$s,$d)->res();}}
?>

			</body>
</html>

