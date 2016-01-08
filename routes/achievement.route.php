<?php

$AchieveCraft->App()->get('/i/:iconId/:topText(/:bottomText)(/.png)(/)', function ($iconId, $topText, $bottomText) use ($AchieveCraft) {
    if (substr($bottomText, -4) == ".png") {
        $bottomText = substr($bottomText, 0, -4);
    }


    $Icon = $AchieveCraft->Icon();
    $Icon->setIconId($iconId);

    $Achievement = $AchieveCraft->Achievement();
    $Achievement->setIcon($Icon->getImage(), $iconId)->setTopText($topText)->setBottomText($bottomText);

    $AchieveCraft->App()->etag($Achievement->getCacheId());
    $AchieveCraft->App()->expires('+1 week');
    $AchieveCraft->App()->response->headers->set('Content-Type', 'Content-type: image/png');

    imagepng($Achievement->getImage());
});