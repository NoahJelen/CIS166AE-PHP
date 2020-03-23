<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>No Soup for You!</title>
</head>
<body>
<h1>Mmm...soups</h1>
<?php

$soups = [
	'Monday' => 'Cabbage',
	'Tuesday' => 'Chicken Noodle',
	'Wednesday' => 'Ramen',
	'Thursday' => 'Clam Chowder',
	'Friday' => 'Mushroom'
	'Saturday' => 'Tomato'
	'Sunday' => 'Cream of Chicken'
];

// Print each key and value:
foreach ($soups as $day => $soup) {
	print "<p>$day: $soup</p>\n";
}

?>
</body>
</html>
