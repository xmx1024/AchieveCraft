<?php

namespace jdf2\AchieveCraft;
class Icon
{

    private $image;
    private $iconId;

    private $missingIcon;

    public function __construct($iconId)
    {
        $this->iconId = $iconId;
    }

    public function getCacheId(){
        return md5("icon" . $this->iconId);
    }

    public function setMissingIcon($path){
        $this->missingIcon = $path;
    }

    public function getIcon()
    {
        $Mongo =  new \MongoClient();
        $AcheiveCraftDB = $Mongo->achievecraft;
        $foundIcon = $AcheiveCraftDB->customicons->findOne(array("id" => $this->iconId));

        if($foundIcon) {
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