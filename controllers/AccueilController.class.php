<?php

class AccueilController
{
    public function display()
    {

        //Slider auto
        $newSlider = new ProductImageModel();
        $sliders = $newSlider->getSlider();

        //productImage
        $productImageModel = new ProductImageModel();

        //Product
        $productModel = new ProductModel();
        $products = $productModel->getProduct();

        // Product Appart
        $productAppart = $productModel->getAppart();


        $template = "accueil.phtml";
        include 'views/layout.phtml';
    }
}
