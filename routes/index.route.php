<?php

$AchieveCraft->App()->get('/', function () use($AchieveCraft){
    $AchieveCraft->App()->expires('+1 day');

    require_once $AchieveCraft->App()->config("paths")['pages']['index'];
})->name('index');