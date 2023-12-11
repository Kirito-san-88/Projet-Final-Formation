<?php

class AddProductImageController
{
    public function displayAddImageProduct()
    {
        $productId = $_GET['id'];

        if (isset($_SESSION['admin'])) {
            if (isset($_POST['alt_img'], $_POST['id_product'])) {

                $alt = $_POST['alt_img'];

                $id_product = $_POST['id_product'];

                $auto = (int)isset($_POST['slider_auto']);
                $manual = (int)isset($_POST['slider_manuel']);
                $moderate = (int)isset($_POST['moderate']);

                $uploaddir = 'public/img/';

                $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

                $addProductImageModel = new ProductImageModel();
                $addProductImage = $addProductImageModel->addProductImage($alt, $auto, $manual, $moderate, $uploadfile, $productId);


                error_reporting(-1);
                if (!move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
                    echo "Attaque potentielle par téléchargement de fichiers.";
                }
            }
            $template = "admin/add_product_image.phtml";
        }else {
            header('location:admin');
        }

        include 'views/layout.phtml';
    }
}