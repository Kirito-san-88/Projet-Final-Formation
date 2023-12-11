<?php

class AddProductImageModel extends ModelManager
{


    public function AddProductImage($alt, $auto, $manual, $moderate, $img, $id_product)
    {
        //this->bdd
        $req = "INSERT INTO img(alt_img,slider_auto,slider,moderate,img,id_product) VALUES (?,?,?,?,?,?)";
        $addProductImage = $this->queryOne($req, [$alt, $auto, $manual, $moderate, $img, $id_product]);
        return $addProductImage;


    }

}