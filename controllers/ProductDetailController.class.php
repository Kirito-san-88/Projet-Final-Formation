<?php

class ProductDetailController
{
    public function display()
    {

        // Récuperation de l'id passé dans l'url
        $productId = $_GET['id'];


        // productID
        $productModel = new ProductModel();
        $productImageModel = new ProductImageModel();
        $product = $productModel->getProductDetails($productId);


        $template = "product.phtml";
        include 'views/layout.phtml';
    }
}
