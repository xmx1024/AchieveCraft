<?php

return array(
    "index" => "http://dev.achievecraft.net/",

    "allowCacheOption" => false,

    "defaults" => array(
        "achievement" => array(
            "background" => $AchieveCraftApp->config("baseDir") . "assets/images/achievementbg.png",
            "font" => $AchieveCraftApp->config("baseDir") . "assets/fonts/minecraftia.ttf"
        ),
        "icon" => array(
            "missing" => $AchieveCraftApp->config("baseDir") . "assets/images/missing.png",
            "32x32" => $AchieveCraftApp->config("baseDir") . "assets/images/32x32.png"
        ),
        "group" => array(
            "name" => "Unnamed Icon Group"
        )
    ),
    "paths" => array(
        "backend" => array(
            "AchieveCraft" => $AchieveCraftApp->config("baseDir") . "backend/AchieveCraft.class.php",
            "Database" => $AchieveCraftApp->config("baseDir") . "backend/Database.class.php",
            "Achievement" => $AchieveCraftApp->config("baseDir") . "backend/Achievement.class.php",
            "Icon" => $AchieveCraftApp->config("baseDir") . "backend/Icon.class.php",
            "CacheWrapper" => $AchieveCraftApp->config("baseDir") . "backend/CacheWrapper.class.php"
        ),
        "pages" => array(
            "index" => $AchieveCraftApp->config("baseDir") . "pages/index.php"
        ),
        "routes" => $AchieveCraftApp->config("baseDir") . "routes/",
        "cache" => $AchieveCraftApp->config("baseDir") . "cache/"
    ),
    "errors" => array(
        "1" => "Unknown error",
        "2" => "Unknown database error",
        "3" => "No resource was found"
    )
);