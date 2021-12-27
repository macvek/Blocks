<?php

function assertTrue($whatever, $msg="") {
    if (True !== $whatever) {
        throw new \RuntimeException("Failed with $msg");
    }
}

function assertFalse($whatever, $msg="") {
    if (False !== $whatever) {
        throw new \RuntimeException("Failed with $msg");
    }
}

function assertEquals($a, $b, $msg="") {
    if ($a !== $b) {
        throw new \RuntimeException("Failed with $a !== $b; $msg");
    }
}