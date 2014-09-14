<?php

function _esc($n) {
    $ESC = chr(27);
    return $ESC . "[{$n}m";
}

$RESET_ALL  = _esc(0);
$BRIGHT     = _esc(1);
$DIM        = _esc(2);
$NORMAL     = _esc(2);

$BLACK      = _esc(30);
$RED        = _esc(31);
$GREEN      = _esc(32);
$YELLOW     = _esc(33);
$BLUE       = _esc(34);
$MAGENTA    = _esc(35);
$CYAN       = _esc(36);
$WHITE      = _esc(37);
$RESET      = _esc(39);

$BG_BLACK   = _esc(40);
$BG_RED     = _esc(41);
$BG_GREEN   = _esc(42);
$BG_YELLOW  = _esc(43);
$BG_BLUE    = _esc(44);
$BG_MAGENTA = _esc(45);
$BG_CYAN    = _esc(46);
$BG_WHITE   = _esc(47);
$BG_RESET   = _esc(49);