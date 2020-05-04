<?php
    define('TITLE', 'Delete Record From Database');
    include('templates/header.html');
    $dbc = mysqli_connect('localhost', 'root', '', 'contact_info');
    if (isset($_GET['id'])) {

        $query = "SELECT * FROM contact_info WHERE id={$_GET['id']}";
        if ($result = mysqli_query($dbc, $query)) {

            $row = mysqli_fetch_array($result);

            print '<form action="delete_record.php" method="post">
            <p>Are you sure you want to delete this entry?</p>
            <div>' . $row['id'] . ' ' . $row['firstname'];

            print '</div><br><input type="hidden" name="id" value="' . $_GET['id'] . '">
            <p><input type="submit" name="submit" value="Delete entry"></p>
            </form>
            <p><a href="view_database.php">Return to Entries</a></p>';

        } else {
            print '<p class="error">Could not retrieve the entry because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
        }

    } elseif (isset($_POST['id']) && is_numeric($_POST['id']) && ($_POST['id'] > 0) ) {

        $query = "DELETE FROM contact_info WHERE id={$_POST['id']} LIMIT 1";
        $result = mysqli_query($dbc, $query);

        if (mysqli_affected_rows($dbc) == 1) {
            print "<p>The database entry has been deleted.</p>
            <p><a href=\"view_database.php\">Return to Entries</a></p>";
        } else {
            print '<p class="error">Could not delete the database entry because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
        }
    }
    include('templates/footer.html');
?>
