<?php

$AchieveCraft->App()->get('/a/:size/:user', function ($size, $user) use($AchieveCraft){
    $AchieveCraft->App()->redirect('https://crafatar.com/avatars/'. $user .'?size='+$size+'&overlay=true');
});

$AchieveCraft->App()->get('/a/:user', function ($user) use($AchieveCraft){
    $AchieveCraft->App()->redirect('https://crafatar.com/avatars/'. $user .'?size=64&overlay=true');
});


$AchieveCraft->App()->get('/3d/:size/:user', function ($size, $user) use($AchieveCraft){
    $AchieveCraft->App()->redirect('https://crafatar.com/head/'. $user .'?size='+$size+'&overlay=true');
});

$AchieveCraft->App()->get('/3d/:user', function ($user) use($AchieveCraft){
    $AchieveCraft->App()->redirect('https://crafatar.com/head/'. $user .'?size=64&overlay=true');
});


$AchieveCraft->App()->get('/skin/:size/:user', function ($size, $user) use($AchieveCraft){
    $AchieveCraft->App()->redirect('https://crafatar.com/body/'. $user .'?size='+$size+'&overlay=true');
});

$AchieveCraft->App()->get('/skin/:user', function ($user) use($AchieveCraft){
    $AchieveCraft->App()->redirect('https://crafatar.com/body/'. $user .'?size=64&overlay=true');
});


$AchieveCraft->App()->get('/combo/:size/:user', function ($size, $user) use($AchieveCraft){
    $AchieveCraft->App()->redirect('https://crafatar.com/avatars/'. $user .'?size='+$size+'&overlay=true');
});

$AchieveCraft->App()->get('/combo/:user', function ($user) use($AchieveCraft){
    $AchieveCraft->App()->redirect('https://crafatar.com/avatars/'. $user .'?size=64&overlay=true');
});