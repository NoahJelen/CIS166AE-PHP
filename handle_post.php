<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Forum Posting</title>
</head>
<body>
<?php

$firstName =trim($_POST['first_name']);
$lastName = trim($_POST['last_name']);
//$posting = $_POST['posting'];
$posting = trim($_POST['posting']);
// Create a full name variable:
$name = $firstName . ' ' . $lastName;

// Print a message:
//print "<div>Thank you, $name, for your posting:
//<p>$posting</p></div>";
//$html_post =  htmlentities($_POST['posting']);
//$strip_post = strip_tags($_POST['posting']);

$words = str_word_count($posting);
$posting = str_ireplace("badword", "XXXXX", $posting);
$posting = substr($posting, 0, 50);

print "<div>Thank you, $name, for your posting:
<p>$posting...</p>
<p>($words words)</p></div>";

?>
</body>
</html>
