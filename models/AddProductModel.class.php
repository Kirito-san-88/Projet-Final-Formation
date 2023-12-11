<?php

class AddProductModel extends ModelManager
{


    public function AddProduct($name, $price, $description, $moderate, $new)
    {
        //this->bdd
        $req = "INSERT INTO product(name_product,prix,description,moderate,new_product) VALUES (?,?,?,?,?)";
        $addProduct = $this->queryOne($req, [$name, $price, $description, $moderate, $new]);
        //var_dump($addProduct->errorInfo());
        //$addProduct = $this -> queryOne($req,[$name,$price,$description,$moderate,$new]);
        return $addProduct;


    }

}
