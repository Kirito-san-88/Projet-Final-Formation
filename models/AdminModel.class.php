<?php

class AdminModel extends ModelManager
{


    public function getConnectAdmin($email)
    {

        $req = "SELECT email,password,id_admin FROM admin WHERE email = ?";
        $admin = $this->queryOne($req, [$email]);

        return $admin;

    }

}
    
