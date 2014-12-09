<?php


require ("header.php");


ECHO <<< TABLESTART
    <div class="jumbotron">
        <h1>Bazaar</h1>

    <table class="table" style="background-color: white">
        <tr>
            <th class="tg-031e">Product Name</th>
            <th class="tg-031e">Brand</th>
            <th class="tg-031e">Product Type</th>
            <th class="tg-031e">Number of Items in Stock</th>
            <th class="tg-031e">Suggested Gender</th>
            <th class="tg-031e">Weight for Shipping</th>
            <th class="tg-031e">Price</th>
            <th class="tg-031e">Size</th>
        </tr>
TABLESTART;

        $servername = "localhost";
        $username = "ethanwel_ejw";
        $password = "ejw1275$";
        $dbname = "ethanwel_trial";

        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

        $result = $conn->query("SELECT * FROM items");
        $fetch = $result->fetchAll();


        foreach ($fetch as $row)
        {
            echo("<tr>");
                echo("<td>" . $row['name'] . "</td>");
                echo("<td>" . $row['brand'] . "</td>");
                echo("<td>" . $row['type'] . "</td>");
                echo("<td>" . $row['quantity'] . "</td>");
                echo("<td>" . $row['gender'] . "</td>");
                echo("<td>" . $row['weight'] . "</td>");
                echo("<td>" . $row['price'] . "</td>");
                echo("<td>" . $row['size'] . "</td>");
            echo("</tr>");
        }
        echo("</table>");

        require ("footer.php");
    echo("</div>");
?>