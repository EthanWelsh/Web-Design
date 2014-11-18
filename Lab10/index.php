<?php


if (
!filter_has_var(INPUT_POST, "first_name") ||
!filter_has_var(INPUT_POST, "last_name"))
{
    echo <<< USERFORM
    <html>
        <head>
            <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
        </head>


        <h1>Lab 10</h1>
        <h2>Ethan Welsh</h2>

        <a href="lookup.php">Look Up Your Info in the DB!</a>
        <a href="index2.php">See the Entire Table</a>
        <a href="code.txt">MY CODE</a>


        <form class="pure-form pure-form-aligned" action="index.php" method="post">
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
                    <label for="steet_address_1">Address</label>
                    <input type="text" name = "street_address_1" id= "street_address_1" placeholder="123 Street Ln">
                </div>

                <div class="pure-control-group">
                    <label for="steet_address_2">Address 2</label>
                    <input type="text" name = "street_address_2" id = "steet_address_2" placeholder="P.O. Box 309">
                </div>

                <div class="pure-control-group">
                    <label for="city">City</label>
                    <input type="text" name = "city" id = "city" placeholder="City">
                </div>

                <div class="pure-control-group">
                    <label for="state">State</label>
                    <input type="text" name = "state" id = "state" placeholder="State">
                </div>

                <div class="pure-control-group">
                    <label for="postal_code">Zip Code</label>
                    <input type="text" name = "postal_code" id = "postal_code" placeholder="Zip Code">
                </div>

                <div class="pure-control-group">
                    <label for="country">Country</label>
                    <input type="text" name = "country" id = "country" placeholder="Country">
                </div>

                <div class="pure-control-group">
                    <label for="email">Email Address</label>
                    <input id="email" name = "email" type="email" placeholder="Email Address">
                </div>

                <div class="pure-control-group">
                    <label for="home_phone">Home Phone</label>
                    <input type="text" name = "home_phone" id = "home_phone" placeholder="123-456-7890">
                </div>

                <div class="pure-control-group">
                    <label for="cell_phone">Cell Phone</label>
                    <input type="text" name = "cell_phone" id = "cell_phone" placeholder="123-456-7890">
                </div>

                <div class="pure-control-group">
                    <label for="facebook_url">Facebook URL</label>
                    <input type="text" name = "facebook_url" id = "facebook_url" placeholder="https://www.facebook.com/Your.Username">
                </div>

                <div class="pure-control-group">
                    <label for="password">Password</label>
                    <input id="password" name = "password" type="password" placeholder="Password">
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
    $addr = filter_input(INPUT_POST, "street_address_1");
    $city = filter_input(INPUT_POST, "city");
    $state = filter_input(INPUT_POST, "state");
    $zip = filter_input(INPUT_POST, "postal_code");
    $country = filter_input(INPUT_POST, "country");
    $email = filter_input(INPUT_POST, "email");
    $home = filter_input(INPUT_POST, "home_phone");
    $cell = filter_input(INPUT_POST, "cell_phone");
    $pwd = filter_input(INPUT_POST, "password");

    $sql = "INSERT INTO employee (first_name, last_name, street_address_1, street_address_2, city, state, postal_code, country, email_address, home_phone, facebook_page_url, cell_phone, password)
            VALUES ('$fname', '$lname', '$addr', 'z', '$city', '$state', '$zip', '$country', '$email', '$home', 'url.com', '$cell', '$pwd')";
    $conn->query($sql);

    echo("<h1>Your Information has Been Successfully Uploaded to the DB</h1>");
    echo("<h1>Lab 10</h1>");
    echo("<h2>Ethan Welsh</h2>");
    echo("<a href='lookup.php'>Look Up Your Info in the DB!</a>");
    echo("<a href='index2.php'>See the Entire Table</a>");



}

/*
 *
 * Error: INSERT INTO employee (last_name, first_name, street_address_1, street_address_2, city,     state, postal_code, country, email_address,  home_phone,   facebook_page_url, cell_phone,   password)
 * VALUES (                     Eric,      Ostroff,    123 Maine St,     'z',              Portland, ME,    54687,       US,      eric@gmail.com, 489-652-5462, 'url.com',         233-456-1234, ick)
 */



//$sql = "SELECT * FROM employee";
//$result = $conn->query($sql);
//$fetch = $result->fetchAll();

//foreach ($fetch as $row)
//{
//    echo $row['first_name'] . ' ' .  $row['last_name'] . "<br />";
//}


?>