<?php

$num = filter_input(INPUT_POST, "num");
$guess = filter_input(INPUT_POST, "guess");
$total = 0;

echo <<<END
    <h1> ETHAN WELSH</h1>
    <p>You rolled $num dice and you're guessing that the total will be $guess \n</p>

END;

for($i = 0; $i < $num; $i++)
{
    $random_roll = rand(0, 6);

    switch($random_roll)
    {
        case 1:
            echo("<img src='img/1.png' style='width:76px;height:57px'></br>");
            break;
        case 2:
            echo("<img src='img/2.png' style='width:76px;height:57px'></br>");
            break;
        case 3:
            echo("<img src='img/3.png' style='width:76px;height:57px'></br>");
            break;
        case 4:
            echo("<img src='img/4.png' style='width:76px;height:57px'></br>");
            break;
        case 5:
            echo("<img src='img/5.png' style='width:76px;height:57px'></br>");
            break;
        case 6:
            echo("<img src='img/6.png' style='width:76px;height:57px'></br>");
            break;
    }

    $total = $total + $random_roll;
}

echo("<p>And the total is... $total !</p>");

if($guess > $total)
{
    echo("<p>I'm sorry, your answer was too high! You lose.</p>");
}
else if($guess < $total)
{
    echo("<p>I'm sorry, your answer was too low! You lose.</p>");
}
else if($guess == $total)
{
    echo("<p>You got it! You win!</p>");
}


echo("<a href = 'file.txt'>My Code</a>");

?>