<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Thanks!</title>
</head>
<body>
<?php
$name = $_GET['name'];
$email = $_GET['email'];

print "<p>Thank you, $name. We will contact you at $email.</p>";

?>
</body>
</html>
