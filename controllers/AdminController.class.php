<?php

class AdminController
{
    public function displayLogin()
    {

        if (!empty($_POST) && $_POST['email'] != '' && $_POST['password'] != '') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $error = $this->verifyIdentity($email, $password);
            if ($error == "") {
                // faire la redirection vers la page d'accueil
                header('location:admin_product');
            }
        }
        $template = "admin/admin.phtml";
        include 'views/layout.phtml';
    }

    public function displayProduct()
    {
        if (isset($_SESSION['admin'])) {
            $productModel = new ProductModel();
            $productImageModel = new ProductImageModel();

            $productsForAdmin = $productModel->getProductForAdmin();

            $template = "admin/admin_product.phtml";
        }else {
            header('location:admin');
        }

        include 'views/layout.phtml';
    }

    public function displayMessage()
    {
        if (isset($_SESSION['admin'])) {
// message
            $contactMessage = new ContactModel();
            $productModel = new ProductModel();
            $contacts = $contactMessage->getMessages();

            $contacts = array_map(function ($contact) use ($productModel) {
                if ($contact['subject'] == -1) {
                    $contact['subject'] = "Problème Technique";
                } else if ($contact['subject'] == -2) {
                    $contact['subject'] = "Autre";
                } else {
                    $contact['subject'] = $productModel->getProductTitle($contact['subject']);
                }
                return $contact;
            }, $contacts);

            $template = "admin/message_to_admin.phtml";
        }else {
            header('location:admin');
        }
        include 'views/layout.phtml';
    }


    public function deconnect()
    {
        session_destroy();


        //retour vers la page souhaitée
        header('location:accueil');
    }

    public function verifyIdentity(string $email, string $password): string
    {
        $ConnectAdminModel = new AdminModel();
        $ConnectAdmin = $ConnectAdminModel->getConnectAdmin($email);

        $error = "";

        if ($ConnectAdmin == FALSE) {
            $error = "Vous n'avez pas saisi les bons identifiants";
        } else {
            // password verify , si le mdp est bon ont cree une session si non ont met un message d'erreur
            if (password_verify($password, $ConnectAdmin['password'])) {
                //connection de l'admin 
                $_SESSION['admin'] = $ConnectAdmin['id_admin'];
            } else {
                $error = "Vous n'avez pas saisi le bon mot de passe";
            }
        }
        return $error;
    }
}