<?php
class Team_detail
{
    private $id;
    private $nickname;
    private $role;
    private $id_user;
    private $id_team;

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
            $strSql = 'SELECT td.* FROM team_detail td';

            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function newTeam_detail($data)
    {
        try {

            $data['role'] = 'jugador';
            $this->pdo->insert('team_detail', $data);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function getById($id)
    {
        try {
            $strSql ="SELECT td.*, t.name as name, count(t.name) as numReg,t.id_user from team_detail td 
            INNER JOIN teams t 
            on t.id=td.id_team
            WHERE td.id_user=:id";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function getIdTeam($id)
    {
        try {
            $strSql="SELECT id_team FROM team_detail WHERE id_user=$id";

            $query = $this->pdo->select($strSql);
            return $query;

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
     public function getUserId($id)
    {
        try {
            $strSql = "SELECT * FROM team_detail  WHERE id_team=:id";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function deleteTeam_detail($data)
    {
        try{
            $strWhere='id='.$data['id'];
            $this->pdo->delete('teams',$strWhere);
        }catch(PDOException $e){
            die($e->getMessage());
        }

    }

     public function validateTeam_detail($data)
    {
        try {
            $strSql = "SELECT t.* FROM teams t WHERE t.id = '{$data['id_team']}' 
            and t.password = '{$data['password']}'";

            $query = $this->pdo->select($strSql);

            if(isset($query[0]->id)) {
                $_SESSION['tour_detail'] = $query[0];
                return true;
            } else
                return 'Contraseña incorrecta';
                
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function validateTeam($idu)
    {
        try {
            $strSql = "SELECT count(id) as count from team_detail WHERE id_user=$idu";

            $query = $this->pdo->select($strSql);

            return $query;
                
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    
}


