<?php

abstract class ModelManager
{
    protected $bdd;
    protected $errorCode;

    //constructeur --> connection à la bdd
    public function __construct()
    {
        try {
            $host = 'localhost';
            $base = 'vincentbas_projet-final';
            $user = 'root';
            $passwordDB = '';

            $this->bdd = new PDO("mysql:host=$host;dbname=$base;charset=utf8", $user, $passwordDB);
        } catch (Exception $e) {
            echo 'Problème de connexion à la BDD';
            echo $e->getMessage();
        }
    }

    //méthode qui va chercher UNE donnée en bdd
    protected function queryOne(string $query, array $params = [])
    {
        $query = $this->bdd->prepare($query);
        $query->execute($params);
        $this->errorCode = $query->errorInfo();
        $result = $query->fetch();
        return $result;
    }

    //méthode qui va chercher DES donnée en bdd
    protected function queryAll(string $query, array $params = []): array
    {
        $query = $this->bdd->prepare($query);
        $query->execute($params);
        $this->errorCode = $query->errorInfo();
        $results = $query->fetchAll();
        return $results;
    }

    public function getErrorCode()
    {
        return $this->errorCode;
    }
}
