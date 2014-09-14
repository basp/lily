<?php

require 'style.php';

class Expectation {
    function __construct($value) {
        $this->value = $value;
    }

    public function toBeTrue() {
        $this->toBe(true);
    }

    public function toBeFalse() {
        $this->toBe(false);
    }

    public function toBe($something) {
        if($this->value != $something) {
            throw new Exception("$this->value is not $something");
        }
    }
}

class ExpectationFailException extends Exception {
    public function __construct($message, $feature, $code = 0, Exception $previous = null) {
        $this->feature = $feature;
        parent::__construct($message, $code, $previous);
    }

    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}

function describe($thing, $specs) {
    global $RED, $RESET_ALL;
    try {
        echo("$thing\r\n");
        $specs();
    }
    catch (ExpectationFailException $e) {
        die("$RED$e->feature, {$e->getMessage()}$RESET_ALL\r\n");
    }
}

function it($feature, $spec) {
    global $GREEN, $RESET_ALL;
    try {
        $spec();
        echo "$GREEN$feature $RESET_ALL\r\n";
    }
    catch (Exception $e) {
        throw new ExpectationFailException(
            $e->getMessage(),
            $feature,
            $e->getCode(),
            $e->getPrevious());
    }
}

function expect($value) {
    return new Expectation($value);
}