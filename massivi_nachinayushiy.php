<?php
echo '<link rel="stylesheet" href="css.css"><h2>';
$data = [
	'category' => [
		'one' => [
			'priority' => '3',
			'views' => [
				'user_count' => 345,
				'bot_count' => 9392
			]
		],
		'two' => [
			'priority' => '1',
			'views' => [
				'user_count' => 123222,
				'bot_count' => 99
			]
		],
		'three' => [
			'priority' => '2',
			'views' => [
				'user_count' => 23,
				'bot_count' => 1
			]
		]
	]
];
$bots = [];
$counts = [];
foreach ($data['category'] as $i){
	$bots[] = $i['views']['bot_count'];
}
echo "МАКСИМУМ: " . max($bots);
echo "<br>";

echo "МИНИМУМ: " . min($bots);
echo "<br><br>";

foreach ($data['category'] as $i => $j){
	$counts[$i] = $j;
}

uasort($counts, function ($i, $j){
	return $i['priority'] - $j['priority'];
});

foreach ($counts as $i){
	echo "ПРАЙОРИТИ: " . $i['priority'] . "<br>";
	echo "ЮЗЕРЫ: " . $i['views']['user_count'] . "<br>";
	echo "БОТЫ: " . $i['views']['bot_count'] . "<br>";
	echo "<br>";
}
// var_dump($counts);
