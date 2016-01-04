<?php
require '../vendor/autoload.php';
use \Slim\Slim AS Slim;
Slim::registerAutoloader();

$AchieveCraftApp = new Slim(array(
    "debug" => true
));

$AchieveCraftApp->config("baseDir", "../");
$AchieveCraftApp->config(array(
    "achievementDefaults" => array(
        "background" => $AchieveCraftApp->config("baseDir") . "assets/images/achievementbg.png",
        "font" => $AchieveCraftApp->config("baseDir") . "assets/fonts/minecraftia.ttf"
    ),
    "iconDefaults" => array(
        "missing" => $AchieveCraftApp->config("baseDir") . "assets/images/missing.png"
    ),
    "cache" => array(
        "dir" => $AchieveCraftApp->config("baseDir") . "cache/"
    )
));

require_once $AchieveCraftApp->config("baseDir") . "backend/Achievement.class.php";
use \jdf2\AchieveCraft\Achievement as Achievement;
require_once $AchieveCraftApp->config("baseDir") . "backend/Icon.class.php";
use \jdf2\AchieveCraft\Icon as Icon;
require_once $AchieveCraftApp->config("baseDir") . "backend/CacheWrapper.class.php";
use \jdf2\AchieveCraft\CacheWrapper as CacheWrapper;

$AchieveCraftApp->get('/', function () use ($AchieveCraftApp) {
    echo "index";
});

$AchieveCraftApp->get('/i/:iconId/:topText(/:bottomText)(/.png)(/)', function ($iconId, $topText, $bottomText) use ($AchieveCraftApp) {
    if(substr($bottomText, -4) == ".png"){
        $bottomText = substr($bottomText, 0, -4);
    }


    $Icon = new Icon($iconId);
    $Icon->setMissingIcon($AchieveCraftApp->config("iconDefaults")['missing']);
    $IconCacheWrapper = new CacheWrapper($AchieveCraftApp->config("cache")['dir'], $Icon);

    $Achievement = new Achievement();
    $Achievement->setFont($AchieveCraftApp->config("achievementDefaults")['font'])->setBackground($AchieveCraftApp->config("achievementDefaults")['background']);
    $Achievement->setIcon($IconCacheWrapper->getImage(), $iconId)->setTopText($topText)->setBottomText($bottomText);

    $AchieveCraftApp->etag($Achievement->getCacheId());
    $AchieveCraftApp->expires('+1 week');
    $AchieveCraftApp->response->headers->set('Content-Type', 'Content-type: image/png');

    $AchievementCacheWrapper = new CacheWrapper($AchieveCraftApp->config("cache")['dir'], $Achievement);
    imagepng($AchievementCacheWrapper->getImage());
});

$AchieveCraftApp->run();