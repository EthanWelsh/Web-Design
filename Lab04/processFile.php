<?php


$prof = filter_input(INPUT_POST, "prof");
$noun = filter_input(INPUT_POST, "noun");
$verb = filter_input(INPUT_POST, "prof");
$noun2 = filter_input(INPUT_POST, "noun2");
$letter = filter_input(INPUT_POST, "letter");
$place = filter_input(INPUT_POST, "place");
$person = filter_input(INPUT_POST, "person");


echo <<<END
    <html>
    <h1>Here is your Ryhme!</h1>
    <body>

    Pat a cake, Pat a cake, $prof s $noun
    $verb me a $noun2 as fast as you can;
    Pat it and prick it and mark it with a $letter ,
    And put it in the $place for $person and me.

    </body>
    </html>

END;


?>