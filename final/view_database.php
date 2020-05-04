<?php
    define('TITLE', 'View Database Records');
    include('templates/header.html');
    $dbc = mysqli_connect('localhost', 'root', '', 'contact_info');

    $query = 'SELECT * FROM contact_info ORDER BY id DESC';

    if ($r = mysqli_query($dbc, $query)) {

        while ($row = mysqli_fetch_array($r)) {
            print "<p>{$row['id']} {$row['firstname']}
            <a href=\"edit_record.php?id={$row['id']}\">Edit</a>
            <a href=\"delete_record.php?id={$row['id']}\">Delete</a>
            <a href=\"view_record.php?id={$row['id']}\">View</a></p><hr>\n";
        }
        print "<p><a href= \"add_record.php\">Add New Record</a></p>";

    }

    else {
        print '<p style="color: red;">Could not retrieve the data because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
    }

    print "<p>Listing of files in /opt/lampp/htdocs/ (Will not work on Windows!)</p>";
    $files = var_dump(list_dir('/opt/lampp/htdocs/'));;
    print $files;

    mysqli_close($dbc);

    function list_dir($dir, &$results = array()) {
        $files = scandir($dir);

        foreach ($files as $key => $value) {
            $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
            if (!is_dir($path)) {
                $results[] = $path;
            }
            else if ($value != "." && $value != "..") {
                list_dir($path, $results);
                $results[] = $path;
            }
        }

        return $results;
    }
    include('templates/footer.html');
?>
