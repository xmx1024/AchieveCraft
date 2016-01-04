<?php

namespace jdf2\AchieveCraft;
class CacheWrapper{

    private $cacheDir;
    private $Image;

    private $image;

    public function __construct($cacheDir, $Image)
    {
        $this->cacheDir = $cacheDir;
        $this->Image = $Image;
    }

    public function getImage(){
        if(!$this->image) {
            $cacheFile = $this->cacheDir . $this->Image->getCacheId() . ".png";

            if ($this->cacheDir && file_exists($cacheFile)) {
                $this->image = imagecreatefromstring(file_get_contents($cacheFile));
            } else {
                $this->image = $this->Image->getImage();
                if ($this->cacheDir) {
                    imagepng($this->image, $cacheFile);
                }
            }
        }

        return $this->image;
    }

}