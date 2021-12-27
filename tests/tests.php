<?php

$testsFailed = false;
error_reporting(E_ALL);
set_error_handler(function($errno, $errstr, $errfile, $errline) {
    throw new RuntimeException("FAILED ON ERROR:$errno with '$errstr' at $errfile:$errline");
}, E_ALL);

include 'includes/tests-utils.inc.php';
include 'includes/bootstrap-tests.inc.php';
include 'includes/asserts.inc.php';

callSuite('testoftest/testoftest');

#### PLACE FOR CUSTOM callSuite(...)

####

if ($testsFailed) {
    exit(1);
}