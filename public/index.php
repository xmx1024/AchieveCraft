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
    "pages" => array(
        "home" => $AchieveCraftApp->config("baseDir") . "pages/home.php"
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

require_once $AchieveCraftApp->config("baseDir") . "backend/AchieveCraft.class.php";
use \jdf2\AchieveCraft\AchieveCraft as AchieveCraft;
$AchieveCraft = new AchieveCraft($AchieveCraftApp);

$AchieveCraftApp->get('/', function () use ($AchieveCraftApp) {
    require_once $AchieveCraftApp->config("pages")['home'];
});

$AchieveCraftApp->get('/i/:iconId/:topText(/:bottomText)(/.png)(/)', function ($iconId, $topText, $bottomText) use ($AchieveCraftApp, $AchieveCraft) {
    if(substr($bottomText, -4) == ".png"){
        $bottomText = substr($bottomText, 0, -4);
    }


    $Icon = $AchieveCraft->Icon($iconId);
    $IconCacheWrapper = new CacheWrapper($AchieveCraftApp->config("cache")['dir'], $Icon);

    $Achievement = $AchieveCraft->Achievement();
    $Achievement->setIcon($IconCacheWrapper->getImage(), $iconId)->setTopText($topText)->setBottomText($bottomText);

    $AchieveCraftApp->etag($Achievement->getCacheId());
    $AchieveCraftApp->expires('+1 week');
    $AchieveCraftApp->response->headers->set('Content-Type', 'Content-type: image/png');

    $AchievementCacheWrapper = new CacheWrapper($AchieveCraftApp->config("cache")['dir'], $Achievement);
    imagepng($AchievementCacheWrapper->getImage());
});

$AchieveCraftApp->get('/get/icon/:iconId(/.png)(/)', function ($iconId) use ($AchieveCraftApp, $AchieveCraft) {
    if(substr($iconId, -4) == ".png"){
        $iconId = substr($iconId, 0, -4);
    }

    $Icon = $AchieveCraft->Icon($iconId);
    $IconCacheWrapper = new CacheWrapper($AchieveCraftApp->config("cache")['dir'], $Icon);

    $AchieveCraftApp->etag($Icon->getCacheId());
    $AchieveCraftApp->expires('+1 week');
    $AchieveCraftApp->response->headers->set('Content-Type', 'Content-type: image/png');
    imagepng($IconCacheWrapper->getImage());
});

$AchieveCraftApp->get('/get/group/:groupId(/)', function ($groupId) use ($AchieveCraftApp) {
    //Groups are created for resource packs and when multiple icons are uploaded at once.
});

$AchieveCraftApp->post('/new/icon', function ($groupId) use ($AchieveCraftApp) {
    //{group: false, icons[]: file}
    //{group: "Group Name", icons[]: [file, file]}
});

$AchieveCraftApp->run();