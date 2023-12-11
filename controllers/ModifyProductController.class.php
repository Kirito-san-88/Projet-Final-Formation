<?php

class ModifyProductController
{
    public function displayModifyProduct()
    {
        if (isset($_SESSION['admin'])) {
            // Récuperation de l'id passé dans l'url
            $productId = $_GET['id'];
            $productModel = new ProductModel();
            $productImageModel = new ProductImageModel();
            //var_dump($_POST);
            if (isset($_POST['name'], $_POST['price'], $_POST['description'])) {

                // MàJ Produit
                $name = htmlspecialchars($_POST['name']);
                $price = htmlspecialchars($_POST['price']);
                $description = htmlspecialchars($_POST['description']);
                $new_product = (int)isset($_POST['new_product']);
                $moderate = (int)isset($_POST['moderate']);
                $productModel->modifyProduct($productId, $name, $description, $price, $moderate, $new_product);

                $imgIds = array_map(function ($item) {
                    // Extrait les IDs d'image depuis les éléments.
                    return substr($item, strlen("alt_img_"));
                }, array_filter(array_keys($_POST), function ($key) {
                    // Conserve que les éléments de la forme alt_img_<1 chiffre ou plus>
                    return preg_match("/alt_img_\d+/", $key);
                }));

                // MàJ Images Produit
                foreach ($imgIds as $imgId) {

                    if (isset($_POST['suppr-' . $imgId])) {
                        $productImageModel->supProductImage($imgId);
                    } else {
                        $alt = htmlspecialchars($_POST['alt_img_' . $imgId]);
                        $auto = (int)isset($_POST['slider_auto_' . $imgId]);
                        $manual = (int)isset($_POST['slider_manuel_' . $imgId]);
                        $moderate = (int)isset($_POST['moderate_' . $imgId]);
                        $productImageModel->modifyProductImage($imgId, $moderate, $alt, $manual, $auto);
                    }
                
                }
                //header('location:admin_product');

            }

            $productsToModifyForAdmin = $productModel->getProductToModifyForAdmin($productId);
            $productImagesToModifyForAdmin = $productImageModel->getProductToModifyImageForAdmin($productId);

            var_dump($productsToModifyForAdmin);


            $template = "admin/modify_product.phtml";
        }else{
            $template = "admin/admin.phtml";
        }
        include 'views/layout.phtml';
    }
}
