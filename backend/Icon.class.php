<?php

namespace jdf221\AchieveCraft;
class Icon
{

    private $getIconFunction;

    private $image;
    private $iconId;

    private $missingIcon;

    public function __construct($getIconFunction)
    {
        $this->getIconFunction = $getIconFunction; //TODO: Might move this to it's own function to be more consistent with how Achievement.class.php works...
    }

    public function setIconId($iconId){
        $this->iconId = $iconId;
    }

    public function getCacheId(){
        return md5("icon" . $this->iconId);
    }

    public function setMissingIcon($path){
        $this->missingIcon = $path;
    }

    private function getIcon()
    {
        $getIconFunction = $this->getIconFunction;
        $foundIcon = $getIconFunction($this->iconId);

        if(!isset($foundIcon['error']) && !empty($foundIcon['base64'])){
            $icon = imagecreatefromstring(base64_decode($foundIcon['base64']));
        }
        else{
            $icon = imagecreatefrompng($this->missingIcon);
        }

        return $icon;
    }

    public function getImage()
    {
        if (!$this->image) {
            $this->image = $this->getIcon();
            imagesavealpha($this->image, true);
        }

        return $this->image;
    }

}