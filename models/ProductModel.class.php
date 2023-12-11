<?php

class ProductModel extends ModelManager
{
    public function getProduct()
    {
        //this->bdd
        $req = "SELECT id_product,description,name_product,prix FROM product  WHERE moderate = 1 LIMIT 2";
        $product = $this->queryAll($req);
        //var_dump($product);
        return $product;
    }

    public function getAppart()
    {
        //this->bdd
        $req = "SELECT product.id_product,name_product,img,alt_img,description,prix FROM product JOIN img ON product.id_product = img.id_product WHERE name_product LIKE 'ap%' AND product.moderate = 1 LIMIT 1";
        $productAppart = $this->queryOne($req);
        //var_dump($productAppart);
        return $productAppart;
    }

    public function getProductDetails(int $id)
    {
        //this->bdd
        $req = "SELECT img,name_product,prix,alt_img,description FROM product JOIN img ON product.id_product = img.id_product WHERE product.id_product = ?";
        $productId = $this->queryOne($req, [$id]);
        //var_dump($productId);
        return $productId;
    }

    public function getNewProduct()
    {
        //this->bdd
        $req = "SELECT id_product,description,name_product,prix FROM product  WHERE new_product = 1";
        $new = $this->queryAll($req);
        //var_dump($new);
        return $new;
    }

    public function getProductForAdmin()
    {
        $req = "SELECT id_product,name_product,prix FROM product ";
        $productAdmin = $this->queryAll($req);
        //var_dump($productAdmin);
        return $productAdmin;
    }

    public function getProductToModifyForAdmin(int $id)
    {
        $req = "SELECT name_product,prix,description,moderate,new_product FROM product WHERE id_product =?";
        $productAdmin = $this->queryOne($req, [$id]);
        //var_dump($productAdmin);
        return $productAdmin;
    }

    public function addProduct(string $name,int $price,string $description,bool $moderate,bool $new)
    {
        //this->bdd
        $req = "INSERT INTO product(name_product,prix,description,moderate,new_product) VALUES (?,?,?,?,?)";
        $addProduct = $this->queryOne($req, [$name, $price, $description, $moderate, $new]);
        //var_dump($addProduct);
        
        return $addProduct;
    }

    public function getLastProductId():int
    {
        //this->bdd
        $req = "SELECT LAST_INSERT_ID() AS last_id FROM product LIMIT 1";
        $lastIdProduct = $this->queryOne($req);
        return $lastIdProduct["last_id"];
    }

    public function modifyProduct(int $id,string $name,string $description,int $price, int $moderate, int $new_product)
    {
        //this->bdd
        $req = "UPDATE product  SET name_product = ?, description = ?, prix = ?,
                moderate = ?, new_product= ? WHERE id_product = ?";
        $modifyProduct = $this->queryOne($req, [$name, $description, $price, $moderate, $new_product, $id]);
        var_dump($this->errorCode);
        return $modifyProduct;
    }

    /**
     * @param $id
     * @param $moderate
     * @param $alt_img
     * @param $slider
     * @param $slider_auto
     * @return mixed
     */
    

    public function supProduct(int $id)
    {
        //this->bdd
        $req = "DELETE product, img FROM product LEFT JOIN img ON product.id_product = img.id_product WHERE product.id_product = ?";
        $supProduct = $this->queryOne($req, [$id]);
        return $supProduct;

    }

    public function getProductTitle(int $subject)
    {
        $req = "SELECT name_product FROM product WHERE id_product = ?";
        return $this->queryOne($req, [$subject])["name_product"];
    }


}
