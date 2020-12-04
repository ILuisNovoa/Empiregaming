<?php 
require 'models/First.php';

class FirstController
	{		
		private $model;

		public function __construct()
	    {
	        try{
	            $this->model = new First;
	        }catch(PDOException $e){
	            die($e->getMessage());
	        }
	    }
	    public function index()
		{

				require 'views/first.php';
		}
	}