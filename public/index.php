<?php
require '../vendor/autoload.php';
use \Slim\Slim AS Slim;

Slim::registerAutoloader();

$AchieveCraftApp = new Slim(array(
    "settings" => array(
        "determineRouteBeforeAppMiddleware" => true,
        "debug" => true
    )
));

$AchieveCraftApp->config("baseDir", "../");
$AchieveCraftApp->config(require_once $AchieveCraftApp->config("baseDir") . "config.php");


require_once $AchieveCraftApp->config("paths")['backend']['AchieveCraft'];
use jdf221\AchieveCraft\AchieveCraft;
$AchieveCraft = new AchieveCraft($AchieveCraftApp);

$routers = glob($AchieveCraft->App()->config("paths")['routes'] . '*.route.php');
foreach ($routers as $router) {
    require_once $router;
}

$AchieveCraftApp->run();

//TODO: Maybe move the Achievement and Icon class into it's own composer package. Then create it's own github repo and use the composer.json for loading it.