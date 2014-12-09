<!DOCTYPE html >
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<h1>Ethan Welsh</h1>


<?php

$dayOfWeek=array("Monday","Tuesday","Wednesday","Thursday","Friday");
foreach ($dayOfWeek as $s)
{
    echo("$s<br>");
}

echo("<br>");
echo("<br>");
echo("<br>");

echo("<h2>Find out what day you were born!</h2>");

if (!filter_has_var(INPUT_POST, "day")||!filter_has_var(INPUT_POST, "month")||!filter_has_var(INPUT_POST, "day"))
{
print <<<HERE
    <form action = "" method = "post">
        Month:  <input type="text" name="month"><br>
        Day:    <input type="text" name="day"><br>
        Year:   <input type="text" name="year"><br>
                <input type = "submit" value = "Submit"/>
    </form>

HERE;
}
else
{
    $month = filter_input(INPUT_POST, "month");
    $day = filter_input(INPUT_POST, "day");
    $year = filter_input(INPUT_POST, "year");

    $m = intval($month);
    $y = intval($year);
    $d = intval($day);

    $offset = date("w", mktime(0, 0, 0, $m, 1, $y));
    $daysInMonth = date('t', mktime(0, 0, 0, $m, 1, $y));


    /*
     * Building Calander
     */

    $calArray = array();

    $i = 1;
    $isFirstWeek = True;

    for ($row = 0; $row < 5; $row++)
    {
        $col = 0;
        if($isFirstWeek)
        {
            $col = $offset;
            $isFirstWeek = false;
        }

        for (; $col < 7; $col++)
        {
            if($i > $daysInMonth)
            {
                $i = 1;
            }
            $calArray[$row][$col] = $i;
            $i++;
        }
    }

    /*
     * PRINTING
     */

echo <<< CAL
    <table>
    <tr>
        <th>Sunday</th>
        <th>Monday</th>
        <th>Tuesday</th>
        <th>Wednesday</th>
        <th>Thursday</th>
        <th>Friday</th>
        <th>Saturday</th>
    </tr>
CAL;

    $i = 1;

    for ($row = 0; $row < 5; $row++)
    {
        echo("<tr class='day'>");
        for ($col = 0; $col < 7; $col++)
        {
            $m = $calArray[$row][$col];

            if($m == $d)
            { // Highlight the day of their birthday
                echo("<td class='birthday'>$m</td>");
            }
            else
            {
                echo("<td>$m</td>");
            }
            $i++;
        }
        echo("</tr>");
    }
    echo("</table>");
}
?>


<p>-----------------------------------------------------------------------------------</p>
<h2>P2</h2>

<?php


if (!filter_has_var(INPUT_POST, "grades"))
{
    echo <<< GRADEFORM
    <h3>Calculate Your Average Grade</h3>
    <p>Enter your grades separated by a newline character.</p>
    <form action = "" method = "post">
        <textarea cols="40" rows="5" name="grades"></textarea>
        <input type = "submit" value = "Submit"/>
    </form>
GRADEFORM;
}
else
{
    $grades = filter_input(INPUT_POST, "grades");
    $g = split("\n", $grades);

    $sum = 0;

    foreach ($g as $individualGrade)
    {
        $intG = intval($individualGrade);
        $sum = $sum + $intG;
    }
    $average = $sum / count($g);
    echo("Total Points Scored = $sum <br>");
    echo("Average = $average <br>");
}
?>

<a href="mycode.txt">My Code</a>

</body>
</html>
