<?php
    define('TITLE', 'View Database Record');
    include('templates/header.html');
    
    $dbc = mysqli_connect('localhost', 'root', '', 'contact_info');

    $query = $query = "SELECT * FROM contact_info WHERE id={$_GET['id']}";;

    if ($result = mysqli_query($dbc, $query)) {

        $row = mysqli_fetch_array($result);
        print "<p>First Name:{$row['firstname']}</p>
        <p>Last Name:{$row['lastname']}</p>
        <p>Address:{$row['address']}</p>
        <p>City:{$row['city']}</p>
        <p>State:{$row['state']}</p>
        <p>Phone Number:{$row['phonenum']}</p>
        <p>Email:{$row['email']}</p>
        <p><a href= \"view_database.php\">View all entries</a>";
    }
    else {
        print '<p style="color: red;">Could not retrieve the data because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
    }

    mysqli_close($dbc);
    include('templates/footer.html');
?>
