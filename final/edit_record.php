<?php
    define('TITLE', 'Edit Database Record');
    include('templates/header.html');
    $dbc = mysqli_connect('localhost', 'root', '', 'contact_info');

    mysqli_set_charset($dbc, 'utf8');

    if (isset($_GET['id']) && is_numeric($_GET['id']) ) {

        $query = "SELECT * FROM contact_info WHERE id={$_GET['id']}";
        if ($r = mysqli_query($dbc, $query)) {

            $row = mysqli_fetch_array($r);

            print "<form action=\"edit_record.php\" method=\"post\">
            <p>First Name: <input type=\"text\" name=\"firstname\" value=\"{$row['firstname']}\" size=\"40\" maxsize=\"100\"></p>
            <p>Last Name: <input type=\"text\" name=\"lastname\" value=\"{$row['lastname']}\" size=\"40\" maxsize=\"100\"></p>
            <p>Email Address: <input type=\"text\" name=\"email\" value=\"{$row['email']}\" size=\"40\" maxsize=\"100\"></p>
            <p>Address: <input type=\"text\" name=\"address\" value=\"{$row['address']}\" size=\"40\" maxsize=\"100\"></p>
            <p>City: <input type=\"text\" name=\"city\" value=\"{$row['city']}\" size=\"40\" maxsize=\"100\"></p>
            <p>State: <input type=\"text\" name=\"state\" value=\"{$row['state']}\" size=\"40\" maxsize=\"100\"></p>
            <p>Phone Number: <input type=\"text\" name=\"phonenum\" value=\"{$row['phonenum']}\" size=\"40\" maxsize=\"100\"></p>
            <input type=\"hidden\" name=\"id\" value=\"{$_GET['id']}\">
            <input type=\"submit\" name=\"submit\" value=\"Update Entry\">
            </form>";

        }
        else {
            print '<p style="color: red;">Could not retrieve the blog entry because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
        }

    } 
    elseif (isset($_POST['id'])) {

        $query = "UPDATE contact_info SET 
        firstname = \"{$_POST['firstname']}\",
        lastname = \"{$_POST['lastname']}\",
        email = \"{$_POST['email']}\",
        address = \"{$_POST['address']}\",
        city = \"{$_POST['city']}\",
        state = \"{$_POST['state']}\",
        phonenum = \"{$_POST['phonenum']}\"
	
        WHERE id={$_POST['id']}";
        $r = mysqli_query($dbc, $query);

        if (mysqli_affected_rows($dbc) == 1) {
            print "<p>The database entry has been updated.</p>
            <p><a href=\"view_database.php\">Return to Entries</a></p>";
        }
        else {
            print '<p style="color: red;">Could not update the entry because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
        }

    }

    mysqli_close($dbc);
    include('templates/footer.html');
?> 
