<?php

require 'models/User.php';
require 'models/Team.php';
require 'models/Team_detail.php';
/**
 * 
 */
class TeamController
{

	private $model;
	private $users;
	private $team_detail;


	public function __construct()
	{
		try{ 
		$this->model = new Team;
		$this->users = new User;
		$this->team_detail = new Team_detail;
	}catch(PDOException $e){
            die($e->getMessage());

	}

	}

	public function index()
	{
		require 'views/layout.php';
		$users = $this->model->getAll();
		require 'views/teams/list.php';
	}

	public function new()
	{
		require 'views/layout.php';
		$users = $this->users->getAll();
		require 'views/teams/new.php';
	}
	public function save()
    {
        $validateTeam = $this->model->validateTeam($_POST);

        if($validateTeam === true) {

            $dataTeam=[
                'name'  => $_POST['name'],
                'description'  => $_POST['description'],
                'id_user' => $_POST['id_user']
            ];

            $this->model->newTeam($dataTeam);

            $id_team= $this->model->getUltimoId();
            $dataTeam_detail= [
                'nickname'          => $_POST['nickname'],
                'id_user'           => $_POST['id_user'],
                'id_team'           => $id_team[0]->team,
            ];
            $this->team_detail->newTeam_detail($dataTeam_detail);
            
            header('Location: ?controller=team');
        } else {
            $error = ['errorMessage' => $validateTeam, 'name' => $_POST['name'], 
            'description' => $_POST['description']];
            require 'views/layout.php';
            require 'views/teams/new.php';
       }


    }
	public function edit()
	{
		if (isset($_REQUEST['id'])) {
			$id = $_REQUEST['id'];
			$data = $this->model->getById($id);
			$statuses = $this->status->getAll();
			$roles = $this->role->getActiveRoles();
			require 'views/layout.php';
			require 'views/users/edit.php';
		} else {
			echo "Error, no se realizo";
		}
	}
	public function update()
	{
		if (isset($_POST)) {
			$this->model->editUser($_POST);
			header('Location: ?controller=user');
		} else {
			echo "Error, no se realizo";
		}
	}
	public function delete()
	{
		$this->model->deleteUser($_REQUEST);
		header('Location: ?controller=user');
	}

	 public function updateStatus()
    {
        $user = $this->model->getById($_REQUEST['id']);
        $data = [];

        if($user[0]->id_status == 1) { 
            $data = [
                'id' => $user[0]->id,
                'id_status' => 2
            ];
        } elseif($user[0]->id_status == 2) {
            $data = [
                'id' => $user[0]->id,
                'id_status' => 1
            ];
        }

        $this->model->editStatus($data);
        header('Location: ?controller=user');

    }
    public function viewTeamId()
    { 
    	if(isset($_REQUEST['id'])){
    		$id=$_REQUEST['id'];

    		$data=$this->team_detail->getById($id);
    		require 'views/layout.php';
    		require 'views/teams/myteam.php';
    	}else{
    		echo "Error, no se realizo.";
    	}

    } 
    public function viewMyTeamId()
    { 
    	if(isset($_REQUEST['id'])){
    		$id=$_REQUEST['id'];

    		$data=$this->model->getById($id);
    		$teamD=$this->team_detail->getUserId($id);
    		require 'views/layout.php';
    		require 'views/team_detail/list.php';
    	}else{
    		echo "Error, no se realizo.";
    	}

    }
   

	
}
