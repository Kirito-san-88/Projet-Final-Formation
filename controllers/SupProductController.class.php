<?php

class SupProductController
{
    public function display()
    {
        if (isset($_SESSION['admin'])) {
            // Récuperation de l'id passé dans l'url
            $productId = $_GET['id'];

            if (isset($_POST["oui"])) {

                $productModel = new ProductModel();

                $productModel->supProduct($productId);
                header('location:admin_product');

            }

            $template = "admin/sup_product.phtml";
        }else{
            $template = "admin/admin.phtml";
        }
        include 'views/layout.phtml';
    }
}
