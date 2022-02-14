<?php

include "Parser.php";
libxml_use_internal_errors(true);

$parser = new Parser();



if($result = $parser->process('https://kun.uz/', 'a')){

    foreach($result as $item)
    {
        echo "<hr>", $item;
    }
}else{
    echo "Error occured";
}