<?php

namespace jdf2\AchieveCraft;
class Achievement
{

    private $iconImage; //Should be a GD resource
    private $iconId;
    private $topText;
    private $bottomText;
    private $font;
    private $background;

    private $image;

    public function setIcon($iconImage, $iconId = "missing")
    {
        $this->iconImage = $iconImage;
        imagesavealpha($this->iconImage, true);

        $this->iconId = $iconId;

        return $this;
    }

    public function setTopText($topText)
    {
        $this->topText = $topText;

        return $this;
    }

    public function setBottomText($bottomText)
    {
        $this->bottomText = $bottomText;

        return $this;
    }

    public function setFont($fontFile)
    {
        $this->font = $fontFile;

        return $this;
    }

    public function setBackground($backgroundFile)
    {
        $this->background = $backgroundFile;

        return $this;
    }


    public function getCacheId(){
        return md5("achievement" . $this->background . $this->font . $this->bottomText . $this->topText . $this->iconId);
    }


    private function makeImage()
    {
        $achievement = imagecreatefrompng($this->background);
        imagesavealpha($achievement, true);

        imagecopyresampled($achievement, $this->iconImage, 16, 16, 0, 0, 32, 32, 32, 32);

        imagefttext($achievement, 12, 0, 60, 28, imagecolorallocate($achievement, 255, 255, 0), $this->font, $this->topText);
        imagefttext($achievement, 12, 0, 60, 50, imagecolorallocate($achievement, 255, 255, 255), $this->font, $this->bottomText);

        return $achievement;
    }

    public function getImage()
    {
        if (!$this->image) {
            $this->image = $this->makeImage();
        }

        return $this->image;
    }

}