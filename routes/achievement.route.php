<?php

$AchieveCraft->App()->get('/i/:iconId/:topText/:bottomText(/.png)(/)', function ($iconId, $topText, $bottomText) use ($AchieveCraft) {
    $cache = $AchieveCraft->App()->request->get("cache");
    if($cache == "false") $cache = false; else $cache = true;
    if(!$AchieveCraft->App()->config("allowCacheOption")) $cache = true;

    if (substr($bottomText, -4) == ".png") {
        $bottomText = substr($bottomText, 0, -4);
    }

    $Icon = $AchieveCraft->Icon($cache);
    $Icon->setIconId($iconId);

    $Achievement = $AchieveCraft->Achievement($cache);
    $Achievement->setIcon($Icon->getImage(), $iconId)->setTopText($topText)->setBottomText($bottomText);

    if($cache) {
        $AchieveCraft->App()->etag($Achievement->getCacheId());
        $AchieveCraft->App()->expires('+1 week');
    }
    $AchieveCraft->App()->response->headers->set('Content-Type', 'Content-type: image/png');

    imagepng($Achievement->getImage());
});