<?php

if (
    !filter_has_var(INPUT_POST, "first_name") &&
    !filter_has_var(INPUT_POST, "last_name")) {

    echo <<< USERFORM


<html>
        <head>
            <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
        </head>

        <body>
            <h1>Lab 10</h1>
            <h2>Ethan Welsh</h2>
            <a href="index.php">Add Info to the DB</a>
            <a href="index2.php">See the Entire Table</a>



            <form class="pure-form pure-form-aligned" action="lookup.php" method="post">
                <fieldset>

                    <div class="pure-control-group">
                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name = "first_name" placeholder="First Name">
                    </div>

                    <div class="pure-control-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" name = "last_name" placeholder="Last Name">
                    </div>

                    <div class="pure-controls">
                        <button type="submit" class="pure-button pure-button-primary">Search</button>
                    </div>
                </fieldset>
            </form>
        </body>
</html>

USERFORM;
}
else
{
    echo("<h1>Lab 10</h1>");
    echo("<h2>Ethan Welsh</h2>");

    require("dbconnect.php");

    $fname = filter_input(INPUT_POST, "first_name");
    $lname = filter_input(INPUT_POST, "last_name");

    if($fname && $lname)
    {
        $sql = "SELECT * FROM employee WHERE first_name='$fname' and last_name='$lname'";
    }
    else if($fname)
    {
        $sql = "SELECT * FROM employee WHERE first_name='$fname'";
    }
    else if($lname)
    {
        $sql = "SELECT * FROM employee WHERE last_name='$lname'";
    }
    else
    {
        echo("ERROR");
    }



    echo <<< TABLE

 <a href="index.php">Add Info to the DB</a>
<a href="index2.php">See the Entire Table</a>

<style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;}
    .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
    .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
</style>
<table class="tg">
  <tr>
    <th class="tg-031e">First Name</th>
    <th class="tg-031e">Last Name</th>
    <th class="tg-031e">Address</th>
    <th class="tg-031e">City</th>
    <th class="tg-031e">State</th>
    <th class="tg-031e">Zip</th>
    <th class="tg-031e">Email</th>
    <th class="tg-031e">Home Phone</th>
    <th class="tg-031e">Cell Phone</th>
    <th class="tg-031e">Password</th>
  </tr>
TABLE;

    $result = $conn->query($sql);
    $fetch = $result->fetchAll();

    foreach ($fetch as $row)
    {
        echo("<tr>");
        echo("<td>" . $row['first_name'] . "</td>");
        echo("<td>" . $row['last_name'] . "</td>");
        echo("<td>" . $row['street_address_1'] . "</td>");
        echo("<td>" . $row['city'] . "</td>");
        echo("<td>" . $row['state'] . "</td>");
        echo("<td>" . $row['postal_code'] . "</td>");
        echo("<td>" . $row['email_address'] . "</td>");
        echo("<td>" . $row['home_phone'] . "</td>");
        echo("<td>" . $row['cell_phone'] . "</td>");
        echo("<td>" . $row['password'] . "</td>");
        echo("</tr>");
    }
    echo("</table>");




}


?>