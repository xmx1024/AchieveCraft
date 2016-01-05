<?php

namespace jdf2\AchieveCraft;
class AchieveCraft
{

    private $AchieveCraftApp;

    public function __construct($AchieveCraftApp)
    {
        $this->AchieveCraftApp = $AchieveCraftApp;
    }

    public function Icon($iconId){
        $Icon = new Icon($iconId);
        $Icon->setMissingIcon($this->AchieveCraftApp->config("iconDefaults")['missing']);

        $IconCacheWrapper = new CacheWrapper($this->AchieveCraftApp->config("cache")['dir'], $Icon);

        return $IconCacheWrapper;
    }

    public function Achievement(){
        $Achievement = new Achievement();
        $Achievement->setFont($this->AchieveCraftApp->config("achievementDefaults")['font'])->setBackground($this->AchieveCraftApp->config("achievementDefaults")['background']);

        $AchievementCacheWrapper = new CacheWrapper($this->AchieveCraftApp->config("cache")['dir'], $Achievement);

        return $AchievementCacheWrapper;
    }

}