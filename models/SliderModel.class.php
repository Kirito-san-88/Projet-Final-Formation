<?php

class SliderModel extends ModelManager
{

    public function getSlider()
    {
        //this->bdd
        $req = "SELECT img,id_img,alt_img FROM img WHERE slider_auto = 1";
        $slider = $this->queryAll($req);
        //var_dump($slider);
        return $slider;
    }

}