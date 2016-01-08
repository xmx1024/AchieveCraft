<?php

namespace jdf221\AchieveCraft;
class AchieveCraft{

    private $App;
    private $Database;

    public function __construct($App)
    {
        $this->App = $App;

        require_once $App->config("paths")['backend']['Database'];
        $this->Database = new Database();

    }

    public function App(){
        return $this->App;
    }

    public function Database(){
        return $this->Database;
    }

    private function error($code){
        return array("code" => $code, "message" => $this->App()->config("errors")[$code]);
    }


    public function Achievement()
    {
        require_once $this->App()->config("paths")['backend']['Achievement'];
        require_once $this->App()->config("paths")['backend']['CacheWrapper'];

        $Achievement = new Achievement();
        $Achievement->setFont($this->App()->config("defaults")['achievement']['font'])->setBackground($this->App()->config("defaults")['achievement']['background']);

        $AchievementCacheWrapper = new CacheWrapper($this->App()->config("paths")['cache'], $Achievement);

        return $AchievementCacheWrapper;
    }

    public function Icon(){
        require_once $this->App()->config("paths")['backend']['Icon'];
        require_once $this->App()->config("paths")['backend']['CacheWrapper'];

        $Icon = new Icon(function($iconId){
            return $this->getIcon($iconId);
        });
        $Icon->setMissingIcon($this->App()->config("defaults")['icon']['missing']);

        $IconCacheWrapper = new CacheWrapper($this->App()->config("paths")['cache'], $Icon);

        return $IconCacheWrapper;
    }


    public function getPublicGroups(){
        $return = array("error" => $this->error("uker")); //Unknown error
        $groups = $this->Database()->getPublicGroups();

        if(empty($groups)){
            $return = array("error" => $this->error("nor")); //No resource was found
        }
        else if(is_array($groups)){
            $return = $groups;
        }

        return $return;
    }

    public function getGroup($id){
        $return = array("error" => $this->error("uker")); //Unknown error
        $group = $this->Database()->getGroup($id);

        if(!$group){
            $return = array("error" => $this->error("nor")); //No resource was found
        }
        else if(is_array($group)){
            $group['icons'] = $this->Database()->getGroupIcons($id);
            $return = $group;
        }

        return $return;
    }

    public function getIcon($id){
        $return = array("error" => $this->error("uker")); //Unknown error
        $icon = $this->Database()->getIcon($id);

        if(!$icon){
            $return = array("error" => $this->error("nor")); //No resource was found
        }
        else if(is_array($icon)){
            $return = $icon;
        }

        return $return;
    }

}