<!-- Just Copy and paste it!   --!>

<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Starter Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/starter-template/">

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/Template/starter-template.css" rel="stylesheet">
</head>

<body>
<main role="main" class="container">

    <div class="starter-template">
        <?php
        $servername = "rdbms.strato.de";
        $db_username = "U4318898";
        $password = "M1i5r2o1;Data";
        $dbname = "DB4318898";

        $choosen_picks = 0;
        $t_id_user = 1;


        /* Abfrage Anzahl der Picks */
        $conn = new mysqli($servername, $db_username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT pl_id FROM players WHERE t_id = '$t_id_user'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {
                $choosen_picks++;
            }
        } else {
            echo "0 results";
        }
        $conn->close();


        // Query of playerDB
        $conn = new mysqli($servername, $db_username, $password, $dbname);
        $conn->set_charset("utf8");
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT first_name, last_name, position, strength, t_id FROM players";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        ?>
        <h3>Pick <?php echo($choosen_picks);?>/25</h3>
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">Vorname</th>
                <th scope="col">Nachname</th>
                <th scope="col">Position</th>
                <th scope="col">Team</th>
                <th scope="col">Stärke</th>
                <th scope="col">Draft</th>
            </tr>
            </thead>
            <tbody>
        <?php


        // output data of each row
        while($row = $result->fetch_assoc()) {
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $position = $row['position'];
        $strength = $row['strength'];
        $player_team = $row['t_id'];
        $player_team_txt = "Vereinslos";

            //Query of Teamname from the player
            $conn2 = new mysqli($servername, $db_username, $password, $dbname);

            if ($conn2->connect_error) {
                die("Connection failed: " . $conn2->connect_error);
            }

            $sql2 = "SELECT team_name FROM teams WHERE t_id = '$player_team'";
            $result2 = $conn2->query($sql2);

            if ($result2->num_rows > 0) {


                while($row = $result2->fetch_assoc()) {
                    $player_team_txt = $row['team_name'];
                }
            } else {  }
            $conn2->close();

        ?>
            <tr>
                <td><?php echo($first_name); ?></td>
                <td><?php echo($last_name); ?></td>
                <td><?php echo($position); ?></td>
                <td><?php echo($player_team_txt); ?></td>
                <td><?php echo($strength); ?></td>
                <td <?php if($player_team == NULL) { echo("style=\"color: #00FF00\""); } else { echo("style=\"color: #FF0000\""); } ?>><?php echo("Pick"); ?></td>
            </tr>
        <?php

        }
        ?>
            </tbody>
        </table>
        <?php

        } else {
        echo "0 results";
        }
        $conn->close();
        ?>
    </div>

</main><!-- /.container -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="/js/vendor/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>