<?php
require 'models/Team_detail.php';
require 'models/Team.php';
require 'models/User.php';
require 'models/gamer.php';


class Team_detailController
{
	private $model;
	private $teams;
	private $users;
	private $gamers;

	public function __construct()
	{
		try{
			$this->model = new Team_detail;
			$this->users = new User;
			$this->team = new Team;
			$this->gamer = new Gamer;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function index(){
		require 'views/layout.php';
		$team_details=$this->model->getById();
		$team=$this->team->consultTeams();
		require 'views/teams/myteam.php'; 
	}
	public function new(){

		if(isset($_REQUEST['id'])){
            $id=$_REQUEST['id'];
            $idu = $_REQUEST['idu'];
            $validateTeam =$this->model->validateTeam($idu);
            if ($validateTeam[0]->count == 0) {
            
            $teams=$this->team->getById($id);
           require 'views/layout.php';
           require 'views/teams/new_td.php'; 
            }else{
             $users = $this->team->getAll();
            
             $mensaje ="¡Usted ya pertenece a un equipo!";
             $error = ['errorMessage' => $mensaje];
             require 'views/layout.php';
             require 'views/teams/list.php';

            }

        }
	}
	public function getById()
	{ 

	if(isset($_REQUEST['id'])){
            $id=$_REQUEST['id'];

           $team=$this->model->getById($id);
		   $data=$this->model->getAll();

           require 'views/layout.php';
           require 'views/teams/myteam.php'; 
        }else{
            echo "Error, no se realizo.";
        }
    }

	public function edit()
    {
        if(isset($_REQUEST['id'])){
            $id=$_REQUEST['id'];

            $data=$this->model->getById($id);
            $users=$this->users->getAll();
            $games=$this->game->getAll();
            require 'views/layout.php';
            require 'views/tournament/edit.php';
        }else{
            echo "Error, no se realizo.";
        }
    }
    public function update()
    {
        if(isset($_POST)){
            $this->model->editTournament($_POST);
            header('Location: ?controller=tournament');
        }else{
            echo "Error, no se realizo";
        }
    }
	public function delete(){
		$this->model->deleteTeam_detail($_REQUEST);
		header('Location: ?controller=Tour_detail');
	}
	
	public function falses() 
	{
		require'view/teams/new_td.php';
	}
	
	public function save()
    {
        $validateTeam_detail = $this->model->validateTeam_detail($_POST);

        if($validateTeam_detail === true) {

        	$dataTeam=[
        		'nickname'  => $_POST['nickname'],
                'id_team'  => $_POST['id_team'],
                'id_user' => $_POST['id_user']
        	];

           $this->model->newTeam_detail($dataTeam);
           header('Location: ?controller=team');
        } else {
            header ('Location: ' . $_SERVER['HTTP_REFERER']);
            $error = ['errorMessage' => $validateTeam_detail];
           
       }


    }
	public function updateStatus(){
		$user = $this->model->getById($_REQUEST['id']);
		$data = [];

		if ($user[0]->id_status == 1) {
			$data = [
				'id' => $user[0]->id,
				'id_status' => 2];
		} elseif ($user[0]->id_status == 2) {
			$data = [
				'id' => $user[0]->id,
				'id_status' => 1];
		}
		$this->model->editStatus($data);
		header('Location: ?controller=user');
	}
	public function viewTeam()
	{
         if(isset($_REQUEST['id'])){
            $id=$_REQUEST['id'];

            $data=$this->model->viewTeam($id);
            $teams=$this->teams->getAll();
            require 'views/layout.php';
            require 'views/teams/new_td.php';
        }else{
            echo "Error, no se realizo.";
        }
    }

	
	
    
}