<?php
require 'models/game.php';
require 'models/User.php';
/**
 * 
 */
class GameController
{
    private $model;
    private $users;


    public function __construct()
    {
        try{
            $this->model = new game;
            $this->users = new User;
 
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
    public function index(){
        require 'views/layout.php';
        $users=$this->model->getAll();
        $games = $this->model->consultGame();
        require 'views/game/list.php';
    }
    public function new()
    {
        require 'views/layout.php';
        $users = $this->users->getAll();
        require 'views/game/new.php';
    }
    public function save()
    {
        $validateGame = $this->model->validateGame($_POST);

        if($validateGame === true) {
           $this->model->newGame($_REQUEST);
           header('Location: ?controller=game');
        } else {
            $error = ['errorMessage' => $validateGame, 'name' => $_POST['name']];
            require 'views/layout.php';
            require 'views/game/new.php';
       }


    }
    public function edit()
    {
        if(isset($_REQUEST['id'])){
            $id=$_REQUEST['id'];

            $data=$this->model->getById($id);
            $users=$this->users->getAll();
            require 'views/layout.php';
            require 'views/game/edit.php';
        }else{
            echo "Error, no se realizo.";
        }
    }
    public function update()
    {
        if(isset($_POST)){
            $this->model->editGame($_POST);
            header('Location: ?controller=game');
        }else{
            echo "Error, no se realizo";
        }
    }

    public function delete()
    {
        $this->model->deletegame($_REQUEST);
        header('Location: ?controller=game');
    }

    public function updateStatus()
    {
        $movie = $this->model->getById($_REQUEST['id']);
        $data = [];

        if($movie[0]->status_id == 1) { 
            $data = [
                'id' => $movie[0]->id,
                'status_id' => 2
            ];
        } elseif($movie[0]->status_id == 2) {
            $data = [
                'id' => $movie[0]->id,
                'status_id' => 1
            ];
        }

        $this->model->editStatus($data);
        header('Location: ?controller=game');

    }
    public function getById()
    {
        require 'views/layout.php';
        $users = $this->users->getAll();
        require 'views/games/view.php';
    }
   

}
