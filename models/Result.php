<?php
class Result
{
    private $id;
    private $id_match;
    private $winners;
    private $description;

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
            $strSql = 'SELECT m.id,td.id as idtd,td.participants as player,t.name as tournament,t.id as     
                       idt, t.num_keys as keyss  from matches m 
                       INNER JOIN tour_detail td ON m.Id_playerWin=td.id
                       INNER JOIN tournaments t ON t.id=td.id_tournament
                       WHERE  m.num_key=2';
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function newResult($data)
    {
        try {
            $this->pdo->insert('results', $data);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function editResult($data)
    {
        try {
            $strWhere = 'id=' . $data['id'];
            $this->pdo->update('results', $data, $strWhere);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function deleteResult($data)
    {
        try {
            $strWhere = 'id=' . $data['id'];
            $this->pdo->delete('results', $strWhere);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    
    public function getById($id)
    {
        try {
            $strSql = "SELECT * FROM results WHERE id=:id";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function consultResults()
    {
        try {
            $strSql='SELECT r.* 
            FROM results r ORDER BY r.id ASC';
            $query = $this->pdo->select($strSql);
            return $query;
            
        } catch (PDOException $e) {
            die($e->getMessage());
            
        }
    }
}


