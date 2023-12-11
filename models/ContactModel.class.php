<?php

class ContactModel extends ModelManager
{

    public function getProductForSubjectSelector()
    {
        //this->bdd
        $req = "SELECT name_product,id_product FROM product";
        $products = $this->queryAll($req);
        //var_dump($products);
        return $products;
    }

    public function AddMessage($email, $subject, $message)
    {
        //this->bdd
        $req = "INSERT INTO contact ( email, subject, message) VALUES (?,?,?)";
        $addMessage = $this->queryOne($req, [$email,  $subject, $message]);
        //var_dump($addMessage);
        return $addMessage;
    }

    public function getMessages()
    {
        //this->bdd
        $req = "SELECT id_contact,email,message,subject FROM contact";
        $getMessages = $this->queryAll($req);
        //var_dump($getMessages);
        return $getMessages;
    }

    public function supMessage($id)
    {
        //this->bdd
        $req = "DELETE  FROM contact WHERE id_contact =?";
        $supMessage = $this->queryOne($req, [$id]);
        return $supMessage;


    }

}