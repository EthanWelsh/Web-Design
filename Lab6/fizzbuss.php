<?php

echo "<h1>Ethan Welsh</h1>";
echo "<h2>Lab 6</h2>";



echo "<body>";

//echo "<table>";

for($i = 1; $i < 10; $i++)
{
    //echo "<tr>";
    if(($i % 3 == 0) && ($i % 5 == 0))
    {
        echo "FizzBuss</br>";
    }
    else if($i % 3 == 0)
    {
        echo "Fizz</br>";
    }
    else if( $i % 5 == 0)
    {
        echo "Buzz</br>";
    }
    else
    {
        echo $i;
        echo "</br>";
    }

}


echo "<a href = 'fizzbuss.txt'>My Code</a>";

echo "</body>";


?>