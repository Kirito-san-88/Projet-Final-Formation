<?php

class NewsController
{
    public function display()
    {


        $productModel = new ProductModel();
        $productImageModel = new ProductImageModel();
        $newProducts = $productModel->getNewProduct();


        $template = "news.phtml";
        include 'views/layout.phtml';
    }
}