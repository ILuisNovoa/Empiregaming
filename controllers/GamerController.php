<?php
require 'models/Gamer.php';
require 'models/User.php';
/**
 * 
 */
class GamerController
{
    private $model;
    private $users;


    public function __construct()
    {
        try{
            $this->model = new Gamer;
            $this->users = new User;
 
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
    public function index(){
        require 'views/layout.php';
        $users=$this->model->getAll();
        $gamers = $this->model->consultGamers();
        require 'views/gamers/list.php';
    }
    public function new()
    {
        require 'views/layout.php';
        $users = $this->users->getAll();
        require 'views/users/new.php';
    }
    public function update()
    {
        if(isset($_POST)){
            $this->model->editgamer($_POST);
            header('Location: ?controller=gamer');
        }else{
            echo "Error, no se realizo";
        }
    }

    public function delete()
    {
        $this->model->deletegamer($_REQUEST);
        header('Location: ?controller=gamer');
    }

    public function updateStatus()
    {
        $gamer = $this->model->getById($_REQUEST['id']);
        $data = [];

        if($gamer[0]->status_id == 1) { 
            $data = [
                'id' => $gamer[0]->id,
                'status_id' => 2
            ];
        } elseif($gamer[0]->status_id == 2) {
            $data = [
                'id' => $gamer[0]->id,
                'status_id' => 1
            ];
        }

        $this->model->editStatus($data);
        header('Location: ?controller=gamer');

    }


    public function viewProfile()
    {
         if(isset($_REQUEST['id'])){
            $id=$_REQUEST['id'];

            $data=$this->model->getById($id);
            $users=$this->users->getAll();
            require 'views/layout.php';
            require 'views/gamers/view.php';
        }else{
            echo "Error, no se realizo.";
        }
    }
   

}
