<?php
class Match
{
    private $id;
    private $id_tournament;
    private $id_tour_detail_1;
    private $id_tour_detail_2;
    private $id_user;
    private $start;
    private $finish;
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
            $strSql = 'SELECT * FROM matches';
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function getIdTournamet($id)
    {
        try {
            $strSql = "SELECT m.*, s.name as id_status,m.id_playerWin as playerwin  FROM matches m 
            INNER JOIN statuses s 
            ON s.id=m.id_status
            WHERE m.id_tour_detail_1=:id";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function newMatch($data)
    {
        try {
            $data['id_status'] = 9;
            $this->pdo->insert('matches', $data);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
     public function getByIdMach($idM)
        {
            try {
                $strSql= "SELECT * FROM matches WHERE id_tour_detail_1=:idM";
                $array = ['id' => $id];
                $query = $this->pdo->select($strSql, $array);
                return $query;
            } catch (PDOException $e) {
                return $e->getMessage();
            }
        }
    public function deleteMatches($data)
    {
        try {
            $strWhere = 'id=' . $data['id'];
            $this->pdo->delete('matches', $strWhere);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    
    public function getById($numk)
    {
        try {
            $strSql = "SELECT p1.*,p1.id as idmatch ,p1.id_playerWin as playerwin,u.name, u.id, p.id_user, p.participante2 as participante2, s.name as status from users u 
                    INNER JOIN participante p ON u.id=p.id_user
                    INNER JOIN participante1 p1 ON p.id=p1.id
                    INNER JOIN statuses s ON p1.id_status = s.id  WHERE p1.num_key=:numk";
            $array = ['numk' => $numk];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function getStausId($id)
    {
        try {
            $strSql = "SELECT count(*) as count FROM matches WHERE id_tournament =:id and id_status !=8";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function validateMatch($id)
    {
        try {
            $strSql = "SELECT count(id_status) as count FROM matches
                       WHERE id_tournament=:id and id_status = 9 or id_status = 7";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function getById4($id)
    {
        try {
            $strSql = "SELECT p1.*,p1.id as idmatch ,p1.id_playerWin as playerwin,u.name, u.id, p.id_user, p.participante2 as participante2, s.name as status from users u 
                    INNER JOIN participante p ON u.id=p.id_user
                    INNER JOIN participante1 p1 ON p.id=p1.id
                    INNER JOIN statuses s ON p1.id_status = s.id";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function getByIdMatch($id)
    {
        try {
            $strSql = "SELECT * FROM matches WHERE id=:id";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    } 
    public function finishMatch($id)
    {
        try {
            $strSql = "SELECT p1.*,p1.id as idmatch ,u.name, u.id, p.id_user, p.participante2 as participante2, s.name as status, p1.id_playerWin as playerwin from users u 
                    INNER JOIN participante p ON u.id=p.id_user
                    INNER JOIN participante1 p1 ON p.id=p1.id
                    INNER JOIN statuses s ON p1.id_status = s.id WHERE p1.id=:id";
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
            $this->pdo->update('matches',$data,$strWhere);
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
    public function partsId($id)
    {
        try {
            $strSql = "SELECT m.*, s.name as status FROM matches m
            inner join statuses s on s.id=td.status_id
             WHERE id_tournament=:id";                                                                                  
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
     public function getCountMatch($id)
    {
        try {
            $strSql = "SELECT count(*) as count FROM matches WHERE id_tournament=:id";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    //match para 4 de final en ultimos 
    public function getByIdMatchDesc($id)
    {
        try {
            $strSql = "SELECT id, id_playerWin, id_tournament FROM matches WHERE id_tournament=:id ORDER BY id DESC LIMIT 2 ";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    } 
    //match para 4 de final en primeros 
    public function getByIdMatchAsc($id)
    {
        try {
            $strSql = "SELECT id, id_playerWin, id_tournament FROM matches WHERE id_tournament=:id ORDER BY id ASC LIMIT 2 ";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    } 


    ////////////////////////////////////////////////////
    //buscar si ya existe unas partidas
     public function getByExist16($id)
    {
        try {
            $strSql = "SELECT COUNT(*) as numC FROM matches WHERE num_key = 16 and id_tournament =:id";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    } 
    public function getByExist8($id)
    {
        try {
            $strSql = "SELECT COUNT(*) as numC FROM matches WHERE num_key = 8 and id_tournament =:id";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    } 
    public function getByExist4($id)
    {
        try {
            $strSql = "SELECT COUNT(*) as numC FROM matches WHERE num_key = 4 and id_tournament =:id";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    } 
    public function getByExist2($id)
    {
        try {
            $strSql = "SELECT COUNT(*) as numC FROM matches WHERE num_key = 2 and id_tournament =:id";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    } 
    public function uniqueStatusId9($id)
    {
        try {
            $strSql = "SELECT count(status_id) as count FROM maches
             WHERE id_tournament=:id and status_id = 6" ;
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function editMatch($data)
    {
        try {
            $strWhere = 'id=' . $data['id'];
            $this->pdo->update('matches', $data, $strWhere);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }







}