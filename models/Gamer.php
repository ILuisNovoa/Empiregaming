<?php

/**
 * modelo de juagdores
 */
class Gamer
{
    private $id;
    private $name;
    private $nickname;
    private $level;
    private $email;


    public function __construct()
    {
        try {
            $this->pdo = new Database;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function getAll()
    {
        try {
            $strSql = 'SELECT u.* 
            FROM users u WHERE id_rol=2  ORDER BY u.id ASC';
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function consultGamers()
    {
        try {
            $strSql='SELECT u.* 
            FROM users u WHERE id_rol=2 ORDER BY u.id ASC';
            $query = $this->pdo->select($strSql);
            return $query;
            
        } catch (PDOException $e) {
            die($e->getMessage());
            
        }

    }
     public function getById($id)
    {
        try {
            $strSql = "SELECT u.name  , u.last_name  ,u.nickname , u.email,u.level 
            FROM users u WHERE u.id= :id"  ;
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }



}

