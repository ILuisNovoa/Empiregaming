<?php
class Tour_detail
{
    private $id;
    private $participants;
    private $email;
    private $status_id;
    private $id_tournament;

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
            $strSql = 'SELECT td.*, t.name as torneo,s.name as status 
            FROM tour_detail td 
            inner join tournaments t on t.id=td.id_tournament 
            inner join statuses s on s.id=td.status_id 
            ORDER BY t.id asc';

            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function newTour_detail($data)
    {
        try {

            $data['status_id'] = 6;
            $this->pdo->insert('tour_detail', $data);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getByIdTournament($id)
    {
        try {
            $strSql = "SELECT * FROM tournaments  WHERE id=:id";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function getIdplayerwin($pwin)
    {
        try {
            $strSql = "SELECT td.nickname as playerwin FROM tour_detail  WHERE id=:pwin";
            $array = ['pwin' => $pwin];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    
    public function getById($id)
    {
        try {
            $strSql = "SELECT * FROM tour_detail  WHERE id=:id";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function getBylevel($id)
    {
        try {
            $strSql = "SELECT td.id ,u.id as userid, u.nickname, u.level as level  FROM tour_detail td 
                        INNER JOIN users u ON  u.id=td.id_user
                        WHERE td.id =:id
                        ";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
   
    public function get8DescAll($id)
    {
        try {
            $strSql = "SELECT * FROM tour_detail WHERE id_tournament=4 ORDER by id DESC limit 4";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function get8AscAll($id)
    {
        try {
            $strSql = "SELECT * FROM tour_detail WHERE id_tournament=4 ORDER by id asc limit 4";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function deleteTour_detail($data)
    {
        try{
            $strWhere='id='.$data['id'];
            $this->pdo->delete('tour_detail',$strWhere);
        }catch(PDOException $e){
            die($e->getMessage());
        }

    }

     public function validateTour_detail($data)
    {
        try {
            $strSql = "SELECT * FROM tour_detail WHERE participants = '{$data['participants']}' 
            and email = '{$data['Email']}' and id_tournament = '{$data['id_tournament']}'";
            
            $query = $this->pdo->select($strSql);

            if(isset($query[0]->id)) {
                $_SESSION['tour_detail'] = $query[0];
                return '<p>USTED YA APLICO PARA ESTE TORNEO </p>';
            } else
                return true;
                
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function validateNumTD($data)
    {
        try {
            $strSql = "SELECT COUNT(td.id) as count, t.name as nombretorneo, t.id_status as estadotorneo from tour_detail td 
                INNER JOIN tournaments t ON t.id=td.id_tournament 
                WHERE td.participants = '{$data['participants']}' 
                and email = '{$data['Email']}' and t.id_status != 3" ;

            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function partsId($id)
    {
        try {
            $strSql = "SELECT td.*, s.name as status FROM tour_detail td
            inner join statuses s on s.id=td.status_id
             WHERE id_tournament=:id";
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
            $this->pdo->update('tour_detail',$data,$strWhere);
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
      public function uniqueStatusId6($id)
    {
        try {
            $strSql = "SELECT count(status_id) as count FROM tour_detail
             WHERE id_tournament=:id and status_id = 6" ;
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
     public function getByIdMatchDesc($id)
    {
        try {
            $strSql = "SELECT id,  id_tournament FROM tour_detail WHERE id_tournament=:id ORDER BY id DESC LIMIT 4 ";
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
            $strSql = "SELECT id, id_tournament FROM tour_detail WHERE id_tournament=:id ORDER BY id ASC LIMIT 4 ";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    } 

}


