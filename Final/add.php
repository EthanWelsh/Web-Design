<?php

require("header.php");

if (
    !filter_has_var(INPUT_POST, "name")
    || !filter_has_var(INPUT_POST, "weight")
    || !filter_has_var(INPUT_POST, "price")
    || !filter_has_var(INPUT_POST, "quantity")
    || !filter_has_var(INPUT_POST, "brand")
    || !filter_has_var(INPUT_POST, "type")
    || !filter_has_var(INPUT_POST, "gender")
)
{
    echo <<< USERFORM
    <html>
        <head>
            <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
        </head>


        <h1>Final Lab</h1>
        <h2>Ethan Welsh</h2>

        <div class="jumbotron">
        <p>Welcome to the clothing bazaar. Please fill out all the fields in the below form for our records.</p>

        <form class="pure-form pure-form-aligned" action="add.php" method="post">
            <fieldset>

                <div class="pure-control-group">
                    <label for="name">Item Name</label>
                    <input type="text" id="name" name = "name" placeholder="Item Name">
                </div>

                <div class="pure-control-group">
                    <label for="weight">Item Weight</label>
                    <input type="text" id="weight" name = "weight" placeholder="Item Weight">
                </div>

                <div class="pure-control-group">
                    <label for="price">Item Price</label>
                    <input type="text" id="price" name = "price" placeholder="0.00">
                </div>

                <div class="pure-control-group">
                    <label for="quantity">Quantity</label>
                    <input type="text" id="quantity" name = "quantity">
                </div>

                <div class="pure-control-group">
                    <label for="brand">Brand</label>
                    <input type="text" id="brand" name = "brand">
                </div>

                <div class="pure-control-group">
                    <label for="type">Item Type</label>
                    <select id="type" name = "type">
                        <option value = "HAT">Hat</option>
                        <option value = "PANTS">Pants</option>
                        <option value = "SHIRT">Shirt</option>
                    </select>
                </div>

                <div class="pure-control-group">
                    <label for="gender">Gender</label>
                    <select id="gender" name = "gender">
                        <option value = "M">Male</option>
                        <option value = "F">Female</option>
                        <option value = "MF">Unisex</option>
                    </select>
                </div>

                <div class="pure-control-group">
                    <label for="size">Size</label>
                    <select id="size" name = "size">
                        <option value = "S">Small</option>
                        <option value = "M">Medium</option>
                        <option value = "L">Large</option>
                    </select>
                </div>

                <div class="pure-controls">
                    <button type="submit" class="pure-button pure-button-primary">Submit</button>
                </div>

            </fieldset>
        </form>
        </div>
    </html>
USERFORM;
}
else
{
    require("dbconnect.php");

    $name = filter_input(INPUT_POST, "name");
    $weight = filter_input(INPUT_POST, "weight");
    $price = filter_input(INPUT_POST, "price");
    $quantity = filter_input(INPUT_POST, "quantity");
    $brand = filter_input(INPUT_POST, "brand");
    $type = filter_input(INPUT_POST, "type");
    $gender = filter_input(INPUT_POST, "gender");
    $size = filter_input(INPUT_POST, "size");

    $sql= sprintf("INSERT INTO items (name, weight, price, quantity, brand, type, gender, size)
                   VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')", $name, $weight, $price, $quantity, $brand, $type, $gender, $size);

    $result = $conn->query($sql);

    if(!$result)
    {
        echo("<h1>Something Went Wrong...</h1>");
        echo mysql_error();
    }
    else
    {
        echo("<div class='jumbotron'>");
        echo("<h1>Your Item has Been Successfully Uploaded to the DB</h1>");
        echo("</div>");
    }
}


require("footer.php");

?>