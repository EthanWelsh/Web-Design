<?php

echo ("<html>");

echo("<title>Quote of the Day</title>");

echo("<head><link href='style.css' rel='stylesheet' type='text/css'></head>");

echo("<body>");

echo("<a href='mycode.txt'>PHP Code</a>");



echo("<p>Quotes...</p>");


$myfile = fopen("tips.txt", "r") or die("Unable to open file!");

while(! feof($myfile))
{
    echo ("<div class = 'quote'>");

    echo fgets($myfile);

    echo ("</div>");
    echo("<br/>");
}

fclose($myfile);

echo ("</body>");
echo ("</html>");



?>