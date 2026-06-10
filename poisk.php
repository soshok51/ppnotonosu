<!DOCTYPE html>
<html>
	<head>
		<title>ПОИСК!!!</title>
		<link rel="stylesheet" href="css.css">
	</head>
	<body>
		<h1>sup</h1>
		<form method="get">
			<input name="captainprice" placeholder="Введите цену"><br><br>
			<input name="captainname" placeholder="Введите название"><br><br>
			<button type="submit">ЕПТЕГ</button>
		</form>
		<h2>
		<?php
		$data = [
			'category1' => [
				'price' => 60,
				'name' => "Греча"
			],
			'category2' => [
				'price' => 120,
				'name' => "Перловка"
			],
			'category3' => [
				'price' => 90,
				'name' => "Кетчуп"
			]
		];
		// Source - https://stackoverflow.com/a/3408761
		// Posted by NikiC, modified by community. See post 'Timeline' for change history
		// Retrieved 2026-06-10, License - CC BY-SA 2.5

		if (empty($_GET)) {
			die();
		}

		$captainprice = $_GET['captainprice'];
		$captainname = $_GET['captainname'];
		echo "<br>РЕЗУЛЬТАТЫ: <br><br>";
		foreach ($data as $i){
			if ($captainprice == $i['price'] || $captainname == $i['name']){
				echo "НАЗВАНИЕ: " . $i['name'] . "<br>ЦЕНА: " . $i['price'] . "<br><br>";
			}
		}
		?>
	</body>
</html>