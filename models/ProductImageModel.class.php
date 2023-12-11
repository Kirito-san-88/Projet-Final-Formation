<?php

class ProductImageModel extends ModelManager
{

    public function getSlider()
    {
        //this->bdd
        $req = "SELECT img,id_img,alt_img FROM img WHERE slider_auto = 1";
        $slider = $this->queryAll($req);
        //var_dump($slider);
        return $slider;
    }
    
    public function getProductImages(int $id)
    {
        //this->bdd
        $req = "SELECT img,alt_img FROM img JOIN product ON product.id_product = img.id_product WHERE  product.id_product = ?";
        $productImage = $this->queryAll($req, [$id]);
        //var_dump($productImage);
        return $productImage;
    }
    
     public function getProductImageForSlider(int $id)
    {
        //this->bdd
        $req = "SELECT img,alt_img FROM img JOIN product ON product.id_product = img.id_product WHERE slider = 1 AND product.id_product = ?";
        $productImage = $this->queryAll($req, [$id]);
        //var_dump($productImage);
        return $productImage;
    }
    
    public function getNewProductImages(int $id)
    {
        //this->bdd
        $req = "SELECT img,alt_img FROM img JOIN product ON product.id_product = img.id_product WHERE  product.id_product = ?";
        $newProductImage = $this->queryAll($req, [$id]);
        //var_dump($newProductImage);
        return $newProductImage;
    }
    
    public function getProductImageForAdmin(int $id)
    {
        //this->bdd
        $req = "SELECT img,alt_img FROM img  WHERE id_product = ?";
        $productImage = $this->queryAll($req, [$id]);
        //var_dump($productImage);
        return $productImage;
    }
    
    public function getProductToModifyImageForAdmin(int $id)
    {
        //this->bdd
        $req = "SELECT id_img,img,alt_img,slider,slider_auto,img.moderate,new_product FROM img JOIN product ON product.id_product = img.id_product WHERE product.id_product= ?";
        $productImage = $this->queryAll($req, [$id]);
        //var_dump($productImage);
        return $productImage;
    }
    
    public function addProductImage($alt, $auto, $manual, $moderate, $img, $id_product)
    {
        //this->bdd
        $req = "INSERT INTO img(alt_img,slider_auto,slider,moderate,img,id_product) VALUES (?,?,?,?,?,?)";
        $addProductImage = $this->queryOne($req, [$alt, $auto, $manual, $moderate, $img, $id_product]);
        return $addProductImage;


    }
    
    public function modifyProductImage(int $id,int $moderate,string $alt_img, int $slider, int $slider_auto)
    {
        //this->bdd
        $req = "UPDATE img SET moderate = ?, alt_img = ?, slider = ?, slider_auto = ? WHERE id_img = ?";
        $modifyProductImage = $this->queryOne($req, [$moderate, $alt_img, $slider, $slider_auto, $id]);
        return $modifyProductImage;
    }
    
    public function supProductImage(int $id)
    {
        //this->bdd
        $req = "DELETE img FROM img WHERE id_img = ?";
        $supProductImage = $this->queryOne($req, [$id]);
        return $supProductImage;


    }

    public function getNumberImg(int $id)
    {
        //this->bdd
        $req = "SELECT count(*) AS cnt FROM img WHERE id_product =?";
        $nbImg = $this->queryOne($req, [$id]);
        return $nbImg["cnt"];


    }

}