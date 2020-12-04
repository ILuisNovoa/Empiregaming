<?php
require 'models/Tournament.php';
require 'models/User.php';
require 'models/Game.php';
require 'models/gamer.php';
require 'models/Tour_detail.php';
require 'models/Match.php';


class TournamentController
{
	private $model;
	private $users;
	private $games;
	private $gamers;
	private $tour_detail;
	private $matches;

	public function __construct()
	{
		try{
			$this->model = new Tournament;
			$this->user = new User;
			$this->game = new Game;
			$this->gamer = new gamer;
			$this->tour_detail = new Tour_detail;
			$this->match = new Match;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function index(){
		require 'views/layout.php';
		$users=$this->model->getAll();
		$tournaments=$this->model->consultTournaments();
		require 'views/tournament/list.php'; 
	}
	public function new(){
		require 'views/layout.php';
		$users=$this->model->getALL();
		$games=$this->game->getALL();
		require 'views/tournament/new.php';
	}
	public function edit()
	{
		if(isset($_REQUEST['id'])){
			$id=$_REQUEST['id'];

			$data=$this->model->editById($id);
			$Tournament=$this->model->getAll();
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
	public function finish()
	{
			$idT = $_REQUEST['id'];
			$status = $_REQUEST['s'];
			$id = $_REQUEST['p'];

			$updates = [
				'id' 		=> $idT,
				'id_status' => $status

			];
			$this->model->editTournament($updates);

			$tour_details = $this->tour_detail->getBylevel($id);
			
			$level = $tour_details[0]->level + 1;
			$idUser = $tour_details[0]->userid;

			$saveuser = [

				'id'=> $idUser,
				'level' =>$level,
			];

			$this->user->editUser($saveuser);

			header('Location: ?controller=result');
		
	}
	public function delete(){
		$this->model->deleteTournament($_REQUEST);
		header ('Location: ' . $_SERVER['HTTP_REFERER']);
		exit();
	}
	public function save()
	{
		$data = [
			'name' => $_POST['name'],
			'date' => $_POST['date'],
			'price' => $_POST['price'],
			'num_spaces' => $_POST['num_spaces'],
			'num_keys' => $_POST['num_spaces'],
			'modality' => $_POST['modality'],
			'id_game' => $_POST['id_game'],
			'id_user' => $_POST['id_user']
		];

		$this->model->newTorunament($data);
		header('Location: ?controller=tournament');

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
			public function getById()
			{ 

				if(isset($_REQUEST['id'])){
					$id=$_REQUEST['id'];

					$data=$this->model->getById($id);
					
					require 'views/layout.php';
					require 'views/tournament/mytournament.php';
				}else{
					echo "Error, no se realizo.";
				}

			}
			public function getByIdUser()
			{ 

				if(isset($_REQUEST['id'])){
					$id=$_REQUEST['id'];

					$data=$this->model->getByIdUser($id);
					
					require 'views/layout.php';
					require 'views/tournament/mytournamentUser.php';
				}else{
					echo "Error, no se realizo.";
				}

			}
			public function getByIdTeam()
			{ 

				if(isset($_REQUEST['id'])){
					$id=$_REQUEST['id'];

					$data=$this->model->getByIdTeam($id);
					
					require 'views/layout.php';
					require 'views/tournament/mytournamentUser.php';
				}else{
					echo "Error, no se realizo.";
				}

			}
			public function viewTournamentId()
			{ 
				if(isset($_REQUEST['id'])){
					$id=$_REQUEST['id'];

					$data=$this->model->viewTid($id);
					$matches=$this->match->getCountMatch($id);
					$tournament=$this->tour_detail->partsId($id);
					$games=$this->game->getAll();
					require 'views/layout.php';
					require 'views/tournament_detail/list.php';
				}else{
					echo "Error, no se realizo.";
				}

			}
			
        public function validateparts()
        { 
                if(isset($_REQUEST['id'])){
                    $id=$_REQUEST['id'];
                    $space = $_REQUEST['num_spaces'];
                    if ($space == 1) {

                    	$mensaje0 ='<p>No cumples con los jugadores necesarios para iniciar el torneo. falta '.$space.' jugador </p>';
                    	$error = ['errorMessage' => $mensaje0];
                    	$data=$this->model->viewTid($id);
                    	$matches=$this->match->getCountMatch($id);
						$tournament=$this->tour_detail->partsId($id);
						$games=$this->game->getAll();
   						require 'views/layout.php';
                    	require 'views/tournament_detail/list.php';
                    	
                    }elseif ($space <> 0) {
                    	$mensaje0 ='<p>No cumples con los jugadores necesarios para iniciar el torneo. faltan '.$space.' jugadores </p>';
                    	$error = ['errorMessage' => $mensaje0];
                    	$data=$this->model->viewTid($id);
                    	$matches=$this->match->getCountMatch($id);
						$tournament=$this->tour_detail->partsId($id);
						$games=$this->game->getAll();
   						require 'views/layout.php';
                    	require 'views/tournament_detail/list.php';
                    }else{

                    $status=$this->tour_detail->uniqueStatusId6($id);

                    foreach ($status as $statuss ) {
                    	$statuss->count;
                    }

                    if ($statuss->count > 0 ) {

                    	$data=$this->model->viewTid($id);
						$tournament=$this->tour_detail->partsId($id);
						$matches=$this->match->getCountMatch($id);
						$games=$this->game->getAll();

                        $mensaje = 'No se pude iniciar el torneo porque hay participantes que no estan inscritos';
                        $error = ['errorMessage' => $mensaje];
                        require 'views/layout.php';
                    	require 'views/tournament_detail/list.php';

                    }else{
                    	  header('Location: ?controller=match&method=new&id='.$id);
                    }


                    }

             }
        }


}