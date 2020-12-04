<?php

/**
 * modelo Login
 */
class Login
{
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new Database;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function validateUser($data)
    {
        try {
            $strSql = "SELECT u.*, r.name as roles,i.image as imagess, u.id as id  FROM users u 
            INNER JOIN roles r 
            on r.id=u.id_rol 
            INNER JOIN images i
            on i.id=u.image_id
            WHERE u.nickname = '{$data['nickname']}' 
            AND u.password = '{$data['password']}' 
            AND u.id_status = 1";
            
            
    
            $query = $this->pdo->select($strSql);

            if(isset($query[0]->id)) {
                $_SESSION['users'] = $query[0];
                return true;
            } else
                return 'Error al Iniciar Sesión. Verifique sus Credenciales';
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    
}
