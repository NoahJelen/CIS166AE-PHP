<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Registration</title>
	<style type="text/css" media="screen">
        .error { color:red; }
    </style>
</head>
<body>
<h1>Registration Results</h1>
<?php 

    $okay = true;
    //empty() checks for an empty variable
    //isset() check if a variable has a value
    //is_numeric() checks if a variable is a number
    if (empty($_POST['email'])) {
        print '<p class="error"> Please enter your email.</p>';
        $okay=false;
    }
    
    if (empty($_POST['password'])) {
        print '<p class="error"> Please enter a password</p>';
        $okay=false;
    }

    
    if (is_numeric($_POST['year'])){
        $age = 2016 - $_POST['year'];
    }
    else {
        print '<p class="error"> Please enter birth year as 4 digits!</p>';
    }
    if ($_POST['password'] != $_POST['confirm']) {
        print '<p class="error"> Passwords don\'t match!</p>';
        $okay=false;
    }
    if ($_POST['year']>=2016) {
        print '<p class="error"> Are you from the future or is your birth year wrong?</p>';
        $okay = false;
    }
    
    switch ($_POST['color1']){
        case 'red':
            $color_type='primary';
            break;
        case 'yellow':
            $color_type='primary';
            break;
        case 'blue'):
            $color_type='primary';
            break;
        case 'green':
            $color_type='secondary';
            break;
        default:
            print '<p class="error"> Please pick a color!</p>';
            $okay=false;
    }
    
    if ($okay) {
        print '<p>You have been successfully registered /s.</p>';
        print '<p>You will be $age years this year</p>';
    }
?>
</body>
</html>
