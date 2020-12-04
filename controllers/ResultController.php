<?php
require 'models/Result.php';
require 'models/User.php';


class ResultController
{
	private $model;
	private $users;

	public function __construct()
	{
		try{
			$this->model = new Result;
			$this->users = new User;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function index(){
		require 'views/layout.php';
		$results=$this->model->getAll();
		require 'views/result/list.php'; 
	}
	public function new(){
		require 'views/layout.php';
		$users=$this->users->getALL();
		require 'views/result/new.php';
	}
	public function edit()
    {
        if(isset($_REQUEST['id'])){
            $id=$_REQUEST['id'];

            $data=$this->model->getById($id);
            $users=$this->users->getAll();
            require 'views/layout.php';
            require 'views/result/edit.php';
        }else{
            echo "Error, no se realizo.";
        }
    }
    public function update()
    {
        if(isset($_POST)){
            $this->model->editResult($_POST);
            header('Location: ?controller=result');
        }else{
            echo "Error, no se realizo";
        }
    }
	public function delete(){
		$this->model->deleteResult($_REQUEST);
		header('Location: ?controller=result');
	}
	public function save()
	{
		$this->model->newResult($_REQUEST);
		header('Location: ?controller=result');

		
	}
}