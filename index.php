<?php
if (isset($_REQUEST['input'])) {
    $input = $_REQUEST['input'];
    try {
        echo calculator($input);
    }
    catch (ParseError $error) {
        echo "wrong input.";
    }
    catch (Error $error) {
        echo $error->getMessage();
    }
}

function calculator($input){
    $input = preg_replace("/[^a-z0-9+\-*\/]/", "", $input);
    $input02 = "NULL";
    if ($input != "")
        $input02 = @eval("return " . $input . ";");
    if ($input02 == null)
        throw new Error("error!");
    return $input02;
}

echo "<br><br><br><a  href='index.html'>click to return to calculator</a>";