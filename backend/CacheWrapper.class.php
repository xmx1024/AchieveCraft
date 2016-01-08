<?php

namespace jdf221\AchieveCraft;
class CacheWrapper{

    private $cacheDir;
    private $Image;

    private $image;

    public function __construct($cacheDir, $Image)
    {
        $this->cacheDir = $cacheDir;
        $this->Image = $Image;
    }

    public function __call($method, $args) {
        switch(count($args)){ //call_user_func_array is slow so if we can lets not use it (In PHP 5 not sure about 7)
            case 0:
                $return = call_user_func(array($this->Image, $method));
                break;
            case 1:
                $return = call_user_func(array($this->Image, $method), $args[0]);
                break;
            case 2:
                $return = call_user_func(array($this->Image, $method), $args[0], $args[1]);
                break;
            default:
                $return = call_user_func_array(array($this->Image, $method), $args);
                break;
        }

        return $return;
    }

    public function getImage(){
        if(!$this->image) {
            $cacheFile = $this->cacheDir . $this->Image->getCacheId() . ".png";

            if ($this->cacheDir && file_exists($cacheFile)) {
                $this->image = imagecreatefromstring(file_get_contents($cacheFile));
                imagesavealpha($this->image, true);
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