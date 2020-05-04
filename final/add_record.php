<?php
    define('TITLE', 'Add Record to Database');
    include('templates/header.html');
    print "<form action=\"add_record.php\" method=\"post\">
    <p>First Name: <input type=\"text\" name=\"firstname\" size=\"40\" maxsize=\"100\"></p>
	<p>Last Name: <input type=\"text\" name=\"lastname\" size=\"40\" maxsize=\"100\"></p>
	<p>Email Address: <input type=\"text\" name=\"email\" size=\"40\" maxsize=\"100\"></p>
	<p>Address: <input type=\"text\" name=\"address\" size=\"40\" maxsize=\"100\"></p>
	<p>City: <input type=\"text\" name=\"city\" size=\"40\" maxsize=\"100\"></p>
	<p>State: <input type=\"text\" name=\"state\" size=\"40\" maxsize=\"100\"></p>
	<p>Phone Number: <input type=\"text\" name=\"phonenum\" size=\"40\" maxsize=\"100\"></p>
	<input type=\"submit\" name=\"submit\" value=\"Submit Data\">
    </form>
    <a href=\"view_database.php\">View Database</a>";
    if(isset($_POST['submit'])) {
        //get form data
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            //$emailErr = "Invalid Email Address!";
            echo "<font color=\"red\">Invalid Email!</font>";
            exit();
        }
        $address = $_POST["address"];
        $city = $_POST["city"];
        $state = $_POST["state"];
        $phonenum = $_POST["phonenum"];
    
        //transfer data to mysql database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname= "contact_info";
        $conn = mysqli_connect($servername, $username, $password,"contact_info");
    
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    
        $sql = "INSERT INTO contact_info (id, firstname, lastname, email, address, city, state, phonenum) VALUES (default, '$firstname','$lastname','$email','$address','$city','$state','$phonenum')";
        if(mysqli_query($conn, $sql)){
            echo "Record added to database successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. ";
        }
        mysqli_close($conn);
    }
    include('templates/footer.html');
?>
