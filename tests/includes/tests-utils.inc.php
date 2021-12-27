<?php

$globalStart = microtime(true);

function callSuite($name) {
    tEcho("[SUITE START] $name");
    include "$name.test.php";
    tEcho("[SUITE DONE ] $name");
}

function test($name, $runnable) {
    global $testsFailed;
    try {
        $runnable();
        tEcho("[  OK  ] $name");
    }
    catch(\Exception $e) {
        $testsFailed = true;
        tEcho("[FAILED] $name");
        echo $e->getMessage()."\n";
        echo $e->getTraceAsString()."\n";
    }
}

function tEcho($txt) {
    global $globalStart;
    $elapsed = substr("".(microtime(true) - $globalStart), 0, 8);

    echo "$elapsed::$txt\n";
}
