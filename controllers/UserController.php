<?php

require 'models/User.php';
require 'models/Status.php';
require 'models/Role.php';
require 'models/Image.php';

/**
 * 
 */
class UserController
{

	private $model;
	private $status;
	private $roles;
	private $images;

	public function __construct()
	{
		$this->model = new User;
		$this->status = new Status;
		$this->role = new Role;
		$this->image = new Image;
	}

	public function index()
	{
		require 'views/layout.php';
		$users = $this->model->getAll();
		require 'views/profile.php';
	}

	public function new()
	{
		$roles = $this->role->getAll();
		require 'views/user/new.php';
	}
	public function save()
	{
		$this->model->newUser($_REQUEST);
		header('Location: ?controller=login');
	}
	public function edit()
	{
		if (isset($_REQUEST['id'])) {
			$id = $_REQUEST['id'];
			$data = $this->model->getById($id);
			$images = $this->image->getAll();

			require 'views/layout.php';
			require 'views/gamers/edit.php';
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
	public function getById()
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
	public function register()
	{
		$validateUser = $this->model->validateUser($_POST);

		$email = $_POST['email'];
		$password = $_POST['password'];
		$nickname = $_POST['nickname'];

		

		if($validateUser === true) {
			$this->model->newUser($_REQUEST);
		
			header('Location: ?controller=correo&method=email&ps='.$password.'&nk='.$nickname.'&em='.$email);
		} else {

			$error = ['errorMessage' => $validateUser, 'name' => $_POST['name'],
			'nickname' => $_POST['nickname'], 'last_name' => $_POST['last_name'], 'email' => $_POST['email']];

			require 'views/user/new.php';
		}
	}
}
