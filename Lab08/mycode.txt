<!DOCTYPE html >
<head><link rel="stylesheet" type="text/css" href="style.css"></head>

<h1>Lab 8</h1>
<h2>Ethan Welsh</h2>

<?php


if (!filter_has_var(INPUT_POST, "fname")    || !filter_has_var(INPUT_POST, "mname")
|| !filter_has_var(INPUT_POST, "lname")     || !filter_has_var(INPUT_POST, "addr")
|| !filter_has_var(INPUT_POST, "school")    || !filter_has_var(INPUT_POST, "pnum")
|| !filter_has_var(INPUT_POST, "email")     || !filter_has_var(INPUT_POST, "major")
|| !filter_has_var(INPUT_POST, "comment"))
{

echo <<< BOOKFORM
    <h3>Make an Entry in our Guestbook!</h3>
    <form action = "" method = "post">
        First Name:     <input type="text" name="fname"><br>
        Middle Name:    <input type="text" name="mname"><br>
        Last Name:      <input type="text" name="lname"><br>
        Address:        <input type="text" name="addr"><br>
        School:         <input type="text" name="school"><br>
        Phone Number:   <input type="text" name="pnum"><br>
        Email:          <input type="text" name="email"><br>
        Major:          <input type="text" name="major"><br>
        <textarea cols="40" rows="5" name="comment"></textarea>
        <input type = "submit" value = "Submit"/>
    </form>
BOOKFORM;

} else {
    $fname = filter_input(INPUT_POST, "fname");
    $mname = filter_input(INPUT_POST, "mname");
    $lname = filter_input(INPUT_POST, "lname");
    $addr = filter_input(INPUT_POST, "addr");
    $school = filter_input(INPUT_POST, "school");
    $pnum = filter_input(INPUT_POST, "pnum");
    $email = filter_input(INPUT_POST, "email");
    $major = filter_input(INPUT_POST, "major");
    $comment = filter_input(INPUT_POST, "comment");

    $xmwriter = new XMLWriter();
    $xmwriter->openMemory();
    $xmwriter->setIndent(true);

    if(!file_exists('example.xml'))
    {
        $xmwriter->startDocument('1.0','UTF-8');
    }
        $xmwriter->startElement('User');
            $xmwriter->writeElement('fname', $fname);
            $xmwriter->writeElement('mname', $mname);
            $xmwriter->writeElement('lname', $lname);
            $xmwriter->writeElement('addr', $addr);
            $xmwriter->writeElement('school', $school);
            $xmwriter->writeElement('pnum', $pnum);
            $xmwriter->writeElement('email', $email);
            $xmwriter->writeElement('major', $major);
            $xmwriter->writeElement('comment', $comment);
        $xmwriter->endElement();
    $xmwriter->endDocument();

    $data =  $xmwriter->outputMemory(TRUE);
    file_put_contents('example.xml', $data, FILE_APPEND);
}
?>

<a href="mycode.txt">My Code</a>
<a href="example.xml">My Output</a>

</body>
</html>
