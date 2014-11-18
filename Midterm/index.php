<html>
<body>
<h>MIDTERM</h>
<h2>The days in each months displayed in alphabetical order:</h2>
<h3>Ethan Welsh</h3>

<table>

<?php

$months = array(
    "January" => 31,
    "February" => 28,
    "March" => 31,
    "April"  => 30,
    "May" => 31,
    "June"  => 30,
    "July" => 31,
    "August"  => 31,
    "September" => 30,
    "October"  => 31,
    "November" => 30,
    "December"  => 31
);

ksort($months);

foreach ($months as $key => $value)
{
    echo("<tr>");
    echo ("<td>$key</td><td>$value</td>");
    echo("<tr>");
}

?>

</table>

<a href="mycode.txt">My Code!</a>

</body>
</html>