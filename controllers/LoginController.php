<?php
	
	require 'models/Login.php';
	require 'models/Team.php';
	require 'models/Team_detail.php';
	
	/**
	 * Clase Controlador Login
	 */
	class LoginController
	{		
		private $model;
		private $team;
		private $team_detail;

		public function __construct()
	    {
	        try{
	            $this->model = new Login;
	            $this->team  = new Team;
	            $this->team_detail = new Team_detail;
	        }catch(PDOException $e){
	            die($e->getMessage());
	        }
	    }

		public function index()
		{
			if(isset($_SESSION['users'])) 
				header('Location: ?controller=home');
			else 
				require 'views/login.php';
		}

		public function login()
		{
			$validateUser = $this->model->validateUser($_POST);


			
			if( $validateUser === true ) {

			$id = $_SESSION['users']->id;
			$idCap = $this->team->validateCapitan($id);	
			$_SESSION['capitan'] = $idCap;
			$idTeam = $this->team_detail->getIdTeam($id);

			$idT = $idTeam[0]->id_team;

				if ($idT == 'NULL') {

				$idT = 0;
					$_SESSION['id_team'] = $idT;
						header('Location: ?controller=home');
				}else{

					$_SESSION['id_team'] = $idT;
						header('Location: ?controller=home');

				}
	

				 }else {

				$error = ['errorMessage' => $validateUser, 'nickname' => $_POST['nickname']];
				require 'views/login.php';
			}
		}

		public function logout()
		{
			if(isset($_SESSION['users']))
				session_destroy();
			header('Location: ?controller=login');
		}

	}