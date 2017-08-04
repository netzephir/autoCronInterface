<?php
require_once $config->application->libraryDir."kint.php";

function dd($value)
{
    -d($value);
    die();
}
function sd($value)
{
    -s($value);
    die();
}