<?php

class SupMessageController
{
    public function display()
    {
        if (isset($_SESSION['admin'])) {
            // Récuperation de l'id passé dans l'url
            $messageId = $_GET['id'];

            if (isset($_POST["oui"])) {

                $ContactModel = new ContactModel();

                $ContactModel->supMessage($messageId);
                header('location:message_to_admin');

            }

            $template = "admin/sup_message.phtml";
        }else{
            $template = "admin/admin.phtml";
        }
        include 'views/layout.phtml';
    }
}