<?php
class Tournament
{
    private $id;
    private $name;
    private $date;
    private $time_start;
    private $time_finish;
    private $modality;
    private $price;
    private $num_matches;
    private $num_keys;
    private $id_game;
    private $id_user;
    private $id_status;

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
            $strSql = 'SELECT t.*, g.name as juego, s.name as status,t.time_start as time_start, t.time_finish as time_finish  FROM tournaments t inner join games g on t.id_game=g.id inner join statuses s on s.id=t.id_status where id_game=1 ORDER BY t.id asc ';

            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function newTorunament($data)
    {
        try {
            $data['id_status'] = 4;
            $this->pdo->insert('tournaments', $data);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function editTournament($data)
    {
        try {
            $strWhere = 'id=' . $data['id'];
            $this->pdo->update('tournaments', $data, $strWhere);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function deleteTournament($data)
    {
        try {
            $strWhere = 'id=' . $data['id'];
            $this->pdo->delete('tournaments', $strWhere);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    
    public function getById($id)
    {
        try {
            $strSql = "SELECT t.*, u.nickname as admin, g.name as juego, s.name as status 
            FROM tournaments t 
            INNER JOIN statuses s on s.id=t.id_status
            INNER JOIN users u on u.id=t.id_user 
            INNER JOIN games g on g.id=t.id_game WHERE t.id_user=:id ";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function editById($id)
    {
        try {
            $strSql = "SELECT t.*, t.id_status as status FROM tournaments t where id=:id";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function getByIdUser($id)
    {
        try {
            $strSql = "SELECT t.*, u.nickname as admin, g.name as juego,s.name as status 
            FROM tournaments t 
            INNER JOIN users u on u.id=t.id_user 
            INNER JOIN games g on g.id=t.id_game 
            INNER JOIN tour_detail td on td.id_tournament=t.id 
            INNER JOIN statuses s on s.id=t.id_status
            where td.id_user=:id";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function getByIdTeam($id)
    {
        try {
            $strSql = "SELECT t.*, u.nickname as admin, g.name as juego,s.name as status 
            FROM tournaments t 
            INNER JOIN users u on u.id=t.id_user 
            INNER JOIN games g on g.id=t.id_game 
            INNER JOIN tour_detail td on td.id_tournament=t.id 
            INNER JOIN statuses s on s.id=t.id_status
            where td.id_team=:id";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    public function editStatus($data)
    {
        try{
            $strWhere='id='.$data['id'];
            $this->pdo->update('tournaments',$data,$strWhere);
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
    public function updateNumSpace($data)
    {
        try{
            $strWhere='id='.$data['id'];
            $this->pdo->update('tournaments',$data,$strWhere);
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
    public function consultTournaments()
    {
        try {
            $strSql='SELECT t.*,t.id_status as id_status, g.name as juego, s.name as status, u.name as admin FROM tournaments t 
            inner join games g on t.id_game=g.id 
            inner join statuses s on s.id=t.id_status 
            inner join users u on u.id=t.id_user 
            ORDER BY t.id asc';
            $query = $this->pdo->select($strSql);
            return $query;
            
        } catch (PDOException $e) {
            die($e->getMessage());   
        }
    }
    public function viewTid($id)
    {
        try {
            $strSql = "SELECT t.*, u.nickname as admin, g.name as juego,t.modality as modality FROM tournaments t 
            INNER JOIN users u on u.id=t.id_user 
            INNER JOIN games g on g.id=t.id_game WHERE t.id=:id ";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}


