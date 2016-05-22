<?php
ini_set('display_errors', 'On');
?>

<?php 
    echo "Hello World.  Aren't we bored of this greeting yet?"; 
    
    //messing with variables
    $something = 1;
    print ("<br>" . $something . "</br>");

afunctionthatdoesnotexist();
    $something = $something + 1;
    echo $something . "<br>";

    $test_array = array("one" => "foo", "blah" => "bar");
    print($test_array["one"] . "<br>");

    $test_array["blarg"] = "another thing";
    print("<br>" . $test_array["blarg"]);

?>
