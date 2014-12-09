
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


        <p>Welcome to the clothing bazaar. Please fill out all the fields in the below form for our records.</p>

        <form class="pure-form pure-form-aligned" action="update.php" method="post">
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
                    <label for="gender">Gender</label>
                    <select id="gender" name = "gender">
                        <option value = "M">Male</option>
                        <option value = "F">Female</option>
                        <option value = "NA">NA</option>
                    </select>
                </div>

                <div class="pure-control-group">
                    <label for="email">Email Address</label>
                    <input id="email" name = "email" type="email" placeholder="Email Address">
                </div>

                <div class="pure-control-group">
                    <label for="hatSize" >Hat Size</label>
                    <select id="hatSize" name = "hatSize">
                        <option value = "S">S</option>
                        <option value = "M">M</option>
                        <option value = "L">L</option>
                    </select>
                </div>

                <div class="pure-control-group">
                    <label for="shirtSize" >Shirt Size</label>
                    <select id="shirtSize" name = "shirtSize">
                        <option value = "S">S</option>
                        <option value = "M">M</option>
                        <option value = "L">L</option>
                    </select>
                </div>

                <div class="pure-control-group">
                    <label for="pantSize" >Pant Size</label>
                    <select id="pantSize" name = "pantSize">
                        <option value = "S">S</option>
                        <option value = "M">M</option>
                        <option value = "L">L</option>
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
    $gender = filter_input(INPUT_POST, "gender");
    $email = filter_input(INPUT_POST, "email");

    $hatSize = filter_input(INPUT_POST, "hatSize");
    $pantSize = filter_input(INPUT_POST, "pantSize");
    $shirtSize = filter_input(INPUT_POST, "shirtSize");


    $sql= sprintf("INSERT INTO customer (fname, lname, gender, email, hatsize, shirtsize, pantsize)
                   VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s')", $fname, $lname, $gender, $email, $hatSize, $shirtSize, $pantSize);

    $result = $conn->query($sql);

    if(!$result)
    {
        echo("<h1>Something Went Wrong...</h1>");
        echo mysql_error();
    }
    else
    {
        echo("<h1>Your Information has Been Successfully Uploaded to the DB</h1>");
    }
}

require("footer.php");

?>