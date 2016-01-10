<?php

$AchieveCraft->App()->get('/a(vatar)/:size/:user', function ($size, $user) use($AchieveCraft){
    $AchieveCraft->App()->redirect('http://mc-heads.net/avatar/'. $user .'/'.$size.'?from=achievecraft');
})->name('Flat Avatar');

$AchieveCraft->App()->get('/a(vatar)/:user', function ($user) use($AchieveCraft){
    $AchieveCraft->App()->redirect('http://mc-heads.net/avatar/'. $user .'/64'.'?from=achievecraft');
})->name('Flat Avatar');


$AchieveCraft->App()->get('/3d/:size/:user', function ($size, $user) use($AchieveCraft){
    $AchieveCraft->App()->redirect('http://mc-heads.net/head/'. $user .'/'.$size.'?from=achievecraft');
})->name('3D Avatar');

$AchieveCraft->App()->get('/3d/:user', function ($user) use($AchieveCraft){
    $AchieveCraft->App()->redirect('http://mc-heads.net/head/'. $user .'/64'.'?from=achievecraft');
})->name('3D Avatar');


$AchieveCraft->App()->get('/skin/:size/:user', function ($size, $user) use($AchieveCraft){
    $AchieveCraft->App()->redirect('http://mc-heads.net/player/'. $user .'/'.$size.'?from=achievecraft');
})->name('Skin');

$AchieveCraft->App()->get('/skin/:user', function ($user) use($AchieveCraft){
    $AchieveCraft->App()->redirect('http://mc-heads.net/player/'. $user .'/64'.'?from=achievecraft');
})->name('Skin');


$AchieveCraft->App()->get('/combo/:size/:user', function ($size, $user) use($AchieveCraft){
    $AchieveCraft->App()->redirect('http://mc-heads.net/combo/'. $user .'/'.$size.'?from=achievecraft');
})->name('Combo Avatar');

$AchieveCraft->App()->get('/combo/:user', function ($user) use($AchieveCraft){
    $AchieveCraft->App()->redirect('http://mc-heads.net/combo/'. $user .'/64'.'?from=achievecraft');
})->name('Combo Avatar');