<?php

/**
 * Modelo de Usuario
 */
class User
{
	private $id;
	private $name;
	private $last_name;
	private $nickname;
	private $level;
	private $email;
	private $password;
	private $id_status;
	private $id_rol;


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
			$strSql = "SELECT u.*,r.name as roles 	FROM users u INNER JOIN roles r INNER JOIN statuses s 
			ON r.id=u.id_rol and s.id=u.id_status ORDER BY u.id ASC";

			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function newUser($data)
	{
		try {
			$data['id_status'] = 1;
			$data['image_id'] = 1;
			$data['level'] = 1;
			$data['id_rol'] = 2;

			$this->pdo->insertU('users', $data);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	
	public function editUser($data)
	{
		try {
			$strWhere = 'id=' . $data['id'];
			$this->pdo->update('users', $data, $strWhere);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	public function deleteUser($data)
	{
		try {
			$strWhere = 'id = ' . $data['id'];
			$this->pdo->delete('users', $strWhere);
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

    public function getById($id)
    {
        try {
            $strSql = "SELECT u.name, u.last_name,u.nickname, u.email 
            FROM users u WHERE u.id=:id ";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function validateUser($data)
    {
        try {
            $strSql = "SELECT u.*, r.name as roles,u.id as id FROM users u INNER JOIN roles r on r.id=u.id_rol WHERE u.nickname = '{$data['nickname']}' or u.email = '{$data['email']}' AND u.id_status = 1";

            $query = $this->pdo->select($strSql);

            if(isset($query[0]->id)) {
                $_SESSION['users'] = $query[0];
                return 'Error al Registrarse. Email o nombre de usuario ya en uso';
            } else
            return true;
            
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}
