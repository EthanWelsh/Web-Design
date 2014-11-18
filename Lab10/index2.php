<?php



ECHO <<< TABLE



<h1>Lab 10</h1>
<h2>Ethan Welsh</h2>
<a href="lookup.php">Look Up Your Info in the DB!</a>
<a href="index.php">Add Info to the DB</a>

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

$servername = "localhost";
$username = "ethanwel_ejw";
$password = "ejw1275$";
$dbname = "ethanwel_trial";

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$result = $conn->query("SELECT * FROM employee");
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

TABLE;