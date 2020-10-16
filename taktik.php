<?php
class taktik {
private $tw;
private $lv;
private $iv1;
private $iv2;
private $rv;
private $zm1;
private $zm2;
private $lf;
private $rf;
private $zom;
private $st;

function pushTaktik() {

}

function getPlayers() {
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "myDB";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, firstname, lastname FROM MyGuests";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
}

}
?>

<form action="" method="post">
    <select name="tw">
        <option value=""></option>
    </select>
    <select name="lv">
        <option value=""></option>
    </select>
    <select name="iv1">
        <option value=""></option>
    </select>
    <select name="iv2">
        <option value=""></option>
    </select>
    <select name="rv>
        <option value=""></option>
    </select>
    <select name="zm1">
        <option value=""></option>
    </select>
    <select name="zm2">
        <option value=""></option>
    </select>
    <select name="lf">
        <option value=""></option>
    </select>
    <select name="rf">
        <option value=""></option>
    </select>
    <select name="zom">
        <option value=""></option>
    </select>
    <select name="st">
        <option value=""></option>
    </select>
</form>
