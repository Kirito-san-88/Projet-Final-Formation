<?php

class ContactController
{
    public function display()
    {
        $contactModel = new ContactModel();

        if (isset($_POST['email'], $_POST['subject'], $_POST['message'])) {
            $email = htmlspecialchars($_POST['email']);

            $subject = htmlspecialchars($_POST['subject']);
            $message = htmlspecialchars($_POST['message']);

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $contactModel->AddMessage($email, $subject, $message);
            } else {

                $error = "Email Invalide !";
            }
        }
        $products = $contactModel->getProductForSubjectSelector();
        $template = "contact.phtml";
        include 'views/layout.phtml';
    }

    public function displayJSON()
    {
        // Object "vide"
        $response = new stdClass();
        if (isset($_POST['email'], $_POST['subject'], $_POST['message'])) {
            $email = htmlspecialchars($_POST['email']);

            $subject = htmlspecialchars($_POST['subject']);
            $message = htmlspecialchars($_POST['message']);

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $contactModel = new ContactModel();
                $contactModel->AddMessage($email, $subject, $message);
                $response->message = "Le message a bien été envoyé.";
            } else {
                $response->message = "Email Invalide !";
            }
        } else {
            $response->message = "Données POST invalides.";
        }
        echo json_encode($response);
    }
}