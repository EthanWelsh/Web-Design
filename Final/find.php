
<?php

require("header.php");

if (!filter_has_var(INPUT_POST, "first_name") || !filter_has_var(INPUT_POST, "last_name"))
{
    echo <<< USERFORM
    <html>
        <head>
            <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
        </head>


        <h1>Final Lab</h1>
        <h2>Ethan Welsh</h2>

        <p>
        Welcome to the clothing bazaar. Give us your first and last name and tell us what
        you're looking for and we'll find you items that match your size (provided that you
        already gave them to us on the update page).
        </p>

        <form class="pure-form pure-form-aligned" action="find.php" method="post">
            <fieldset>

                <div class="pure-control-group">
                    <label for="first_name">First Name</label>
                    <input type="text" id="first_name" name = "first_name" placeholder="First Name">
                </div>

                <div class="pure-control-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" id="last_name" name = "last_name" placeholder="Last Name">
                </div>

                <div class="pure-control-group">
                    <label for="type">Item Type</label>
                    <select id="type" name = "type">
                        <option value = "HAT">Hat</option>
                        <option value = "PANTS">Pants</option>
                        <option value = "SHIRT">Shirt</option>
                    </select>
                </div>


                <div class="pure-controls">
                    <button type="submit" class="pure-button pure-button-primary">Submit</button>
                </div>

            </fieldset>
        </form>
    </html>
USERFORM;
}
else
{
    require("dbconnect.php");

    $fname = filter_input(INPUT_POST, "first_name");
    $lname = filter_input(INPUT_POST, "last_name");
    $type = filter_input(INPUT_POST, "type");

    $sql = "SELECT * FROM customer WHERE fname='$fname' AND lname='$lname'";

    $result = $conn->query($sql);
    $fetch = $result->fetchAll();
    $row = $fetch[0];

    $hat = $row[3];
    $shirt = $row[4];
    $pants = $row[5];
    $gender = $row[6];

    if($type == "HAT") $size = $hat;
    elseif($type == "SHIRT") $size = $shirt;
    elseif($type == "PANTS") $size = $pants;


    //$sql = "SELECT * FROM 'items' WHERE 'type'='$type'
    //        AND(AND('gender'='$gender' OR 'gender'='MF') OR 'size'='$size')";

    $sql = "SELECT * FROM items WHERE type='$type'
            AND(gender='$gender' OR gender='MF')
            AND size='$size'";

    echo("<p>Here are some items that we think would match you well!</p>");

    $result = $conn->query($sql);
    $fetch = $result->fetchAll();

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
        </tr>
TABLESTART;

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
        echo("</tr>");
    }
    echo("</table>");
}

require("footer.php");

?>