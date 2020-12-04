<?php

/**
 * Modelo de equipo
 */
class Team
{
	private $id;
	private $name;
	private $id_user;
	private $id_logo;
	private $slogan;
	private $description;
	private $password;
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
			$strSql = "SELECT t.*, u.nickname as Capitan,t.id_user as user FROM teams t INNER JOIN users u 
		ON u.id=t.id_user ORDER BY t.id ASC";

			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}



	public function newTeam($data)
    {

    	$caracteres='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    	$longpalabra=5;
    	for($pass='', $n=strlen($caracteres)-1; strlen($pass) < $longpalabra ; ) {
    		$x = rand(0,$n);
    		$pass.= $caracteres[$x];
    	}
    	//print 'Nuestra contraseña obtenida es: ' . $pass;
        try {
        	$data['id_status'] = 1;
        	$data['password'] = $pass;
        	$data['id_logo'] = 1;

            $this->pdo->insert('teams', $data);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
	
	public function editTeam($data)
	{
		try {
			$strWhere = 'id=' . $data['id'];
			$this->pdo->update('users', $data, $strWhere);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	public function deleteTeam($data)
	{
		try {
			$strWhere = 'id = ' . $data['id'];
			$this->pdo->delete('users', $strWhere);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	public function getById($id)
	{
		try {
			$strsql="SELECT  t.*, u.nickname as Capitan,count(t.name) as numReg, t.id_user as user FROM teams t INNER JOIN users u 
		ON u.id=t.id_user WHERE t.id= :id";
			$array =['id'=>$id];
			$query=$this->pdo->select($strsql,$array);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
    public function getbyTeam($idu)
    {
        try {
            $strsql="SELECT  t.*, u.nickname as Capitan, t.id_user as id_user,t.name as nameteam FROM teams t INNER JOIN users u 
                ON u.id=t.id_user WHERE t.id_user= :idu";
            $array =['idu'=>$idu];
            $query=$this->pdo->select($strsql,$array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

	public function editStatus($data)
    {
        try{
            $strWhere='id='.$data['id'];
            $this->pdo->update('users',$data,$strWhere);
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
    public function consultTeams()
    {
        try {
            $strSql='SELECT t.*, u.nickname as capitan, t.id_user as user FROM teams t inner join users u on t.id_user=u.id 
             ORDER BY t.id asc';
            $query = $this->pdo->select($strSql);
            return $query;
            
        } catch (PDOException $e) {
            die($e->getMessage());
            
        }
    }
    public function validatePSS($data)
    {
        try {
            $strSql="SELECT t.*, u.nickname as capitan FROM teams t inner join users u on t.id_user=u.id  WHERE t.password = '{$data['password']}'
             ORDER BY t.id asc";
            $query = $this->pdo->select($strSql);
            return $query;
            
        } catch (PDOException $e) {
            die($e->getMessage());
            
        }
    }
    public function validateCapitan($id)
    {
        try {
            $strSql="SELECT COUNT(id) as count, id FROM teams WHERE id_user=$id";

			$query = $this->pdo->select($strSql);
            return $query;

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function validateTeam($data)
    {
        try {
            $strSql = "SELECT t.* FROM teams t WHERE t.name = '{$data['name']}'";
            
            
    
            $query = $this->pdo->select($strSql);

            if(isset($query[0]->id)) {
                $_SESSION['teams'] = $query[0];
                return 'El nombre ya esta en uso';
            } else
                return true;
                
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
     public function getUltimoId()
		{
			try {
				$strSql= "SELECT MAX(id) as team FROM teams";
				$query= $this->pdo->select($strSql);
				return $query;
			} catch (PDOException $e) {
				return $e->getMessage();
			}
		}



}



