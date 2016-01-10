<?php

$AchieveCraft->App()->get('/a/:size/:user', function ($size, $user) use($AchieveCraft){
    $AchieveCraft->App()->redirect('http://mc-heads.net/avatar/'. $user .'/'.$size);
});

$AchieveCraft->App()->get('/a/:user', function ($user) use($AchieveCraft){
    $AchieveCraft->App()->redirect('http://mc-heads.net/avatar/'. $user .'/64');
});


$AchieveCraft->App()->get('/3d/:size/:user', function ($size, $user) use($AchieveCraft){
    $AchieveCraft->App()->redirect('http://mc-heads.net/head/'. $user .'/'.$size);
});

$AchieveCraft->App()->get('/3d/:user', function ($user) use($AchieveCraft){
    $AchieveCraft->App()->redirect('http://mc-heads.net/head/'. $user .'/64');
});


$AchieveCraft->App()->get('/skin/:size/:user', function ($size, $user) use($AchieveCraft){
    $AchieveCraft->App()->redirect('http://mc-heads.net/player/'. $user .'/'.$size);
});

$AchieveCraft->App()->get('/skin/:user', function ($user) use($AchieveCraft){
    $AchieveCraft->App()->redirect('http://mc-heads.net/player/'. $user .'/64');
});


$AchieveCraft->App()->get('/combo/:size/:user', function ($size, $user) use($AchieveCraft){
    $AchieveCraft->App()->redirect('http://mc-heads.net/combo/'. $user .'/'.$size);
});

$AchieveCraft->App()->get('/combo/:user', function ($user) use($AchieveCraft){
    $AchieveCraft->App()->redirect('http://mc-heads.net/combo/'. $user .'/64');
});