<?php
function debug_to_console($data)
{
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>
    console.log('Debug Objects: " . $output . "');
</script>";
}


//<?php

//debug_to_console("Test");

//require_once("./config/helper.php");
//To use this you need to have acces to the helper.