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

        // Create connection
        $conn = new mysqli($servername, $db_username, $password, $dbname);
        $conn->set_charset("utf8");
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT vorname, nachname, position, staerke FROM spieler";
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
                <th scope="col">Stärke</th>
                <th scope="col">Draft</th>
            </tr>
            </thead>
            <tbody>
        <?php

        // output data of each row
        while($row = $result->fetch_assoc()) {
        $vorname = $row['vorname'];
        $nachname = $row['nachname'];
        $position = $row['position'];
        $staerke = $row['staerke'];

        ?>
            <tr>
                <th scope="row"><?php echo($vorname); ?></th>
                <td><?php echo($nachname); ?></td>
                <td><?php echo($position); ?></td>
                <td><?php echo($staerke); ?></td>
                <td><?php echo("Pick"); ?></td>
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