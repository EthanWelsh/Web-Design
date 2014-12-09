<?php

ECHO <<< HEADER

<html>
    <head>
        <!-- CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="style.css"/>
    </head>

    <body>

    <!-------- inventory, enter customer information, calculate/display price, store information -->

    <div class="container">
        <div class="header">
            <ul class="nav nav-pills pull-right">
                <li>
                    <a href="/cs334/Final/index.php">Home</a>
                </li>
                <li>
                    <a href="/cs334/Final/update.php">Update Info</a>
                </li>
                <li>
                    <a href="/cs334/Final/prices.php">Item Prices</a>
                </li>
                <li>
                    <a href="/cs334/Final/add.php">Add Item</a>
                </li>
                <li>
                    <a href="/cs334/Final/find.php">Find Item</a>
                </li>
            </ul>
            <h3 class="text-muted">Clothing Bazaar</h3>
        </div> <!-- End Header -->
    </div>

HEADER;

require("dbconnect.php");


?>