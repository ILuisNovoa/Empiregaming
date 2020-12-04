<?php
	require 'models/Team.php';
	
	/**
	 * Clase Controlador de Inicio
	 */
	class HomeController
	{		
		private $team;

		public function __construct()
	    {
	        try{
	            $this->team = new Team;
	        }catch(PDOException $e){
	            die($e->getMessage());
	        }
	    }

		public function index()
		{
			require 'views/layout.php';
			require 'views/profile.php';		
		}
	}
	?>