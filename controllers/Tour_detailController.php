<?php
require 'models/Tour_detail.php';
require 'models/Tournament.php';
require 'models/User.php';
require 'models/gamer.php';
require 'models/team.php';


class Tour_detailController
{
	private $model;
	private $tournament;
	private $users;
	private $gamers;
    private $team;

	public function __construct()
	{
		try{
			$this->model = new Tour_detail;
			$this->user = new User;
			$this->tournament = new Tournament;
			$this->gamer = new gamer;
            $this->team = new Team;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function index(){
		require 'views/layout.php';
		$Tour_details=$this->model->getById();
		$tournaments=$this->model->consultTournaments();
		require 'views/tournament/mytournament.php'; 
	}
	public function new(){
		if(isset($_REQUEST['id'])){
            $id=$_REQUEST['id'];

            $data=$this->model->getByIdTournament($id);
            require 'views/layout.php';
            require 'views/tournament_detail/new.php';
        }else{
            echo "Error, no se realizo.";
        }
    }
    public function newGroup(){
        if(isset($_REQUEST['id'])){
            $id=$_REQUEST['id'];
            $tm=$_REQUEST['tm'];
            $idu=$_REQUEST['idu'];

            if ($tm !=1) {
                $mensaje ="<p>Solo el lider de un equipo puede aplicar a este torneo </p>";
                $error = ['errorMessage' => $mensaje];
                $tournaments=$this->tournament->consultTournaments();
                require 'views/layout.php';
                require 'views/tournament/list.php';
            }else {
             $data=$this->model->getByIdTournament($id);
             $teamTD=$this->team->getbyTeam($idu);
             require 'views/layout.php';
             require 'views/tournament_detail/newGroup.php';
                
            }

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

            $id=[
                'id'         => $_REQUEST['id_tournament'],
                'num_spaces' => $_REQUEST['num_spaces']
            ];
      $this->model->deleteTour_detail($_REQUEST);
      $this->tournament->updateNumSpace($id);
      header ('Location: ' . $_SERVER['HTTP_REFERER']);
      exit();
  }


  public function save()
  {
    $validateNumTD = $this->model->validateNumTD($_POST);
    if ($validateNumTD[0]->count <5 ) {

        $validateTour_detail = $this->model->validateTour_detail($_POST);

            if($validateTour_detail === true) {

                     $id = $_POST['num'];
                     if ($id > 0) {

                         $numSpace = [
                            'id'         => $_POST['id_tournament'],
                            'num_spaces' => $_POST['num_spaces']
                        ];
                        $this->tournament->updateNumSpace($numSpace);
                        $newuser = [
                            'id_tournament' => $_POST['id_tournament'],
                            'Email'         => $_POST['Email'],
                            'id_user'       => $_POST['id_user'],
                            'id_team'       => $_POST['id_team'],
                            'participants'  => $_POST['participants']
                        ];
                        $this->model->newTour_detail($newuser); 

                        header('Location: ?controller=tournament');
                    }else{
                        $mensaje ="ya no hay cupos";
                        $error = ['errorMessage' => $mensaje];
                        $tournaments=$this->tournament->consultTournaments();
                          require 'views/layout.php';
                          require 'views/tournament/list.php';
                    }

        } else {
            $error = ['errorMessage' => $validateTour_detail];
             $tournaments=$this->tournament->consultTournaments();
            require 'views/layout.php';
            require 'views/tournament/list.php';

        }
    }else{  

            $errorNumTournament = "<p> Usted ya aplico a la maxima cantidad de torneos en espera(5) </p>";
            $error = ['errorMessage' => $errorNumTournament];
            $tournaments=$this->tournament->consultTournaments();
            require 'views/layout.php';
            require 'views/tournament/list.php';
        }
       


    
}






public function updateStatus()
{
    $movie = $this->model->getById($_REQUEST['id']);
    $data = [];

    if($movie[0]->status_id == 6) { 
        $data = [
            'id' => $movie[0]->id,
            'status_id' => 5
        ];
    } elseif($movie[0]->status_id == 5) {
        $data = [
            'id' => $movie[0]->id,
            'status_id' => 6
        ];
    }

    $this->model->editStatus($data);
    header ('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();

}
public function getById()
{ 

	if(isset($_REQUEST['id'])){
        $id=$_REQUEST['id'];

        $data=$this->model->getById($id);
        $participants=$this->model->getAll();

        require 'views/layout.php';
        require 'views/tournament/mytournament.php'; 
    }else{
        echo "Error, no se realizo.";
    }
}
public function addUser()
{ 

	if(isset($_REQUEST['id'])){
        $id=$_REQUEST['id'];

        $data=$this->model->getById($id);
        $tournament=$this->model->getAll();
        $users=$this->user->getAll();
        require 'views/layout.php';
        require 'views/tournament/mytournament.php'; 
    }else{
        echo "Error, no se realizo.";
    }
}




}