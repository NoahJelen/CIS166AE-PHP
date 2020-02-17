<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Your Feedback</title>
</head>
<body>
    <?php
        //displaying errors and reporting them can show hackers vulnerabilities in your code
        //hackers can use vulnerabilities caused by errors to break into systems
        ini_set('display_errors',1);
        $title = $_POST['title'];
        $name = $_POST['name'];
        $response = $_POST['response'];
        $comments = $_POST['comments'];

        print "<p>Thank you, $title $name, for your comments.</p>
        <p>You stated that you found this example to be '$response' and added:<br>$comments</p>";

    ?>
    </body>
</html>
