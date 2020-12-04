<?php

/**
 * modelo del juegos
 */
class Image
{
    private $id;
    private $name;
    private $image;
    private $pdo;

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
            $strSql = 'SELECT * FROM images ';
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function consultGame()
    {
        try {
            $strSql='SELECT * from games';
            $query = $this->pdo->select($strSql);
            return $query;
            
        } catch (PDOException $e) {
            die($e->getMessage());
            
        }

    }
    public function newGame($data)
    {
        try {
            $data['status_id'] = 1;
            $this->pdo->insert('games', $data);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function editGame($data)
    {
        try {
            $strWhere = 'id=' . $data['id'];
            $this->pdo->update('games', $data, $strWhere);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function editStatus($data)
    {
        try{
            $strWhere='id='.$data['id'];
            $this->pdo->update('games',$data,$strWhere);
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
    public function getById($id)
    {
        try {
            $strSql = "SELECT * FROM games WHERE id=:id";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function validateGame($data)
    {
        try {
            $strSql = "SELECT g.* FROM games g WHERE g.name = '{$data['name']}'";
            
            
    
            $query = $this->pdo->select($strSql);

            if(isset($query[0]->id)) {
                $_SESSION['games'] = $query[0];
                return 'El juego ya existe';
            } else
                return true;
                
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
     

}
