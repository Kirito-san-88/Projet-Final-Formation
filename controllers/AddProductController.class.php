<?php

class AddProductController
{
    public function displayAddProduct()
    {

        if (isset($_SESSION['admin'])) {

            if (isset($_POST['name'], $_POST['price'], $_POST['description'], $_POST['new'], $_POST['moderate'], $_POST['alt_img'])) {

                $name = $_POST['name'];

                $price = $_POST['price'];

                $description = $_POST['description'];

                $new = $_POST['new'];

                $moderate = $_POST['moderate'];

                $alt = $_POST['alt_img'];

                $auto = (int)isset($_POST['slider_auto']);

                $manual = (int)isset($_POST['slider_manuel']);

                $moderate = (int)isset($_POST['moderate']);

                $uploaddir = 'public/img/';

                $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

                $addProductModel = new ProductModel();
                $addProductImageModel = new ProductImageModel();

                $addProduct = $addProductModel->addProduct($name, $price, $description, $moderate, $new);

                $error = $addProductModel->getErrorCode();

                var_dump($error);
                $lastIdProduct = $addProductModel->getLastProductId();

                $addProductImage = $addProductImageModel->addProductImage($alt, $auto, $manual, $moderate, $uploadfile, $lastIdProduct);


                //var_dump($addProduct);


                error_reporting(-1);
                if(!file_exists($_FILES['userfile']['tmp_name']) || !is_uploaded_file($_FILES['userfile']['tmp_name'])) {
                    echo 'Veuillez mettre une image';
                }else if (!move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
                    echo "Attaque potentielle par téléchargement de fichiers.";
                
                }

            }
            $template = "admin/add_product.phtml";
        }else {
            header('location:admin');
        }


        include 'views/layout.phtml';
    }
}