<?php

$AchieveCraft->App()->get('/api/get/icon/:iconId(/)', function ($iconId) use($AchieveCraft){
    if (substr($iconId, -4) == ".png") {
        $iconId = substr($iconId, 0, -4);
    }


    $Icon = $AchieveCraft->Icon();
    $Icon->setIconId($iconId);

    $AchieveCraft->App()->etag($Icon->getCacheId());
    $AchieveCraft->App()->expires('+1 week');
    $AchieveCraft->App()->response->headers->set('Content-Type', 'Content-type: image/png');

    imagepng($Icon->getImage());
});

$AchieveCraft->App()->post('/api/new/icon(/)', function () use($AchieveCraft){

});