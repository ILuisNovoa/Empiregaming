<?php
require 'models/Match.php';
require 'models/Tour_detail.php';
require 'models/Tournament.php';


class MatchController
{
	private $model;
	private $tour_detail;
	private $tournamets;

	public function __construct()
	{
		try{
			$this->model = new Match;
			$this->tour_detail = new Tour_detail;
			$this->tournamet = new Tournament;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function index()
	{ 
		if(isset($_REQUEST['id'])){
			$id=$_REQUEST['id'];

			$tournamets=$this->tournamet->editById($id);
			$data=$this->tour_detail->getParAll($id);
			$tour_details=$this->tour_detail->getInparAll($id);
			$maches=$this->model->getIdTournamet($id);
			$machesId=$this->model->getIdTournamet($id);
			require 'views/layout.php';
			require 'views/match/view.php';
		}else{
			echo "Error, no se realizo.";
		}
	}
	public function maches()
	{ 
		if(isset($_REQUEST['id'])){
			$id=$_REQUEST['id'];
			$numk= $_REQUEST['numk'];
		

			$tournamets=$this->tournamet->editById($id);
			$maches=$this->model->getById($numk);

			$finishT=$this->model->getStausId($id);
			$existe16=$this->model->getByExist16($id);
			$existe8=$this->model->getByExist8($id);
			$existe4=$this->model->getByExist4($id);
			$existe2=$this->model->getByExist2($id);
			require 'views/layout.php';
			require 'views/match/view.php';
		}else{
			echo "Error, no se realizo.";
		}
	}
	public function macheskey4()
	{ 
		if(isset($_REQUEST['id'])){
			$id=$_REQUEST['id'];

			$tournamets=$this->tournamet->editById($id);
			$data=$this->model->getByIdMatchDesc($id);
			$maches=$this->model->getByIdMatchAsc($id);
			require 'views/layout.php';
			require 'views/match/falses/false4.php';
		}else{
			echo "Error, no se realizo.";
		}
	}
	public function macheskey0()
	{ 
		if(isset($_REQUEST['id'])){
			$id=$_REQUEST['id'];

			$tournamets=$this->tournamet->editById($id);
			$data=$this->model->getByIdMatchDesc($id);
			$maches=$this->model->getByIdMatchAsc($id);
			require 'views/layout.php';
			require 'views/match/falses/false2.php';
		}else{
			echo "Error, no se realizo.";
		}
	}
	public function macheskey2()
	{ 
		if(isset($_REQUEST['id'])){
			$id=$_REQUEST['id'];

			$tournamets=$this->tournamet->editById($id);
			$data=$this->model->getByIdMatchDesc($id);
			$maches=$this->model->getByIdMatchAsc($id);
			require 'views/layout.php';
			require 'views/match/falses/false2.php';
		}else{
			echo "Error, no se realizo.";
		}
	}
	public function finishMatch()
	{ 
		if(isset($_REQUEST['id'])){
			$id=$_REQUEST['id'];
			$idT=$_REQUEST['idT'];

			$maches=$this->model->finishMatch($id);
			$tournaments=$this->tournamet->editById($idT);
			require 'views/layout.php';
			require 'views/match/finish.php';
		}else{
			echo "Error, no se realizo.";
		}
	}


	public function new()
	{ 
		if(isset($_REQUEST['id'])){
			$id=$_REQUEST['id'];

			$tournamets=$this->tournamet->editById($id);
			$data=$this->tour_detail->getByIdMatchDesc($id);
			$tour_details=$this->tour_detail->getByIdMatchAsc($id);
			$maches=$this->model->getIdTournamet($id);
			$machesId=$this->model->getIdTournamet($id);
			require 'views/layout.php';
			require 'views/match/fals.php';
		}else{
			echo "Error, no se realizo.";
		}

	}
	 public function update()
    {
        if(isset($_POST)){

        	$idT= $_REQUEST['id_tournament'];
        	$numk= $_REQUEST['num_key'];
            $this->model->editMatch($_POST);
             header('Location: ?controller=match&method=maches&id='.$idT.'&numk='.$numk);
        }else{
            echo "Error, no se realizo";
        }
    }	

	public function save()
    {
    	$idT= $_REQUEST['id_tournament'];
    	$key= $_REQUEST['num_key'];


    	$id0= $_REQUEST['id_tour_detail_1'];
    	$id1= $_REQUEST['one'];
    	$id2= $_REQUEST['dos'];
    	$id3= $_REQUEST['tres'];

    	$id00 = $_REQUEST['id_tour_detail_2'];
    	$id11 = $_REQUEST['ones'];
    	$id22 = $_REQUEST['doss'];
    	$id33 = $_REQUEST['tress'];
    	

    	$arra1 = [

    		'id_tour_detail_1' => $id0,
    		'id_tour_detail_2' => $id00,
    		'id_tournament'    => $idT,
    		'num_key'		   => $key
    	];
        $this->model->newMatch($arra1);

    	$arra2 = [

    		'id_tour_detail_1' => $id1,
    		'id_tour_detail_2' => $id11,
    		'id_tournament'    => $idT,
    		'num_key'		   => $key
    	];
        $this->model->newMatch($arra2);

    	$arra3 = [

    		'id_tour_detail_1' => $id2,
    		'id_tour_detail_2' => $id22,
    		'id_tournament'    => $idT,
    		'num_key'		   => $key
    	];
        $this->model->newMatch($arra3);

    	$arra4 = [
    		'id_tour_detail_1' => $id3,
    		'id_tour_detail_2' => $id33,
    		'id_tournament'    => $idT,
    		'num_key'		   => $key
    	];
        $this->model->newMatch($arra4);

        header('Location: ?controller=match&method=maches&id='.$idT.'&numk='.$key);
    }

    public function save4()
    {
    	$idT= $_REQUEST['id_tournament'];
    	$numk = 4;

    	$id0= $_REQUEST['id_tour_detail_1'];
    	$id1= $_REQUEST['one'];

    	$id00 = $_REQUEST['id_tour_detail_2'];
    	$id11 = $_REQUEST['ones'];
    	 var_dump($id0);

    	$arra1 = [

    		'id_tour_detail_1' => $id0,
    		'id_tour_detail_2' => $id00,
    		'id_tournament'    => $idT,
    		'num_key'		   => $numk
    	];
        $this->model->newMatch($arra1);

    	$arra2 = [

    		'id_tour_detail_1' => $id1,
    		'id_tour_detail_2' => $id11,
    		'id_tournament'    => $idT,
    		'num_key'		   => $numk
    	];
        $this->model->newMatch($arra2);

        header('Location: ?controller=match&method=maches&id='.$idT.'&numk='.$numk);
    }
    public function save2()
    {
    	$idT= $_REQUEST['id_tournament'];
    	$numk = 2;

    	$id0= $_REQUEST['id_tour_detail_1'];

    	$id00 = $_REQUEST['id_tour_detail_2'];
    	 var_dump($id0);

    	$arra1 = [

    		'id_tour_detail_1' => $id0,
    		'id_tour_detail_2' => $id00,
    		'id_tournament'    => $idT,
    		'num_key'		   => $numk
    	];
        $this->model->newMatch($arra1);

        header('Location: ?controller=match&method=maches&id='.$idT.'&numk='.$numk);
    }
	
	public function updateStatus(){

		$date = $_REQUEST['start'];
		$user = $this->model->getByIdMatch($_REQUEST['id']);
		$data = [];

		if ($user[0]->id_status == 9) {
			$data = [
				'id'        => $user[0]->id,
				'id_status' => 7,
				'start'  	=> $_REQUEST['start']

			];
			} elseif ($user[0]->id_status == 7) {
				$data = [
					'id' 			=> $user[0]->id,
					'id_status' 	=> 8,
					'finish'  		=> $_REQUEST['finish'],
					'id_playerWin'	=> $_REQUEST['id_playerWin']
			];
				}
				$this->model->editStatus($data);

				header ('Location: ' . $_SERVER['HTTP_REFERER']);
				echo "error";
			}


	public function validateMatch()
        { 
                if(isset($_REQUEST['id'])){
                    $id=$_REQUEST['id'];
                    $key = $_REQUEST['key'];
                    $numk = $_REQUEST['numk'];

                    $matches = $this->model->validateMatch($id);

                    foreach ($matches as $match) {
                    	$match->count;
                    }


                    if ($match->count > 0 ) {

						$tournamets=$this->tournamet->editById($id);
						$maches=$this->model->getById($numk);
						$finishT=$this->model->getStausId($id);

						$existe16=$this->model->getByExist16($id);
						$existe8=$this->model->getByExist8($id);
						$existe4=$this->model->getByExist4($id);
						$existe2=$this->model->getByExist2($id);
						$mensaje = '¡No se pude pasar a la siguiente fase! hay partidas por iniciar o finalizar';
                        $error = ['errorMessage' => $mensaje];
						require 'views/layout.php';
						require 'views/match/view.php';			

                    }else{
                    	  header('Location: ?controller=match&method=macheskey'.$key.'&id='.$id);
                    	
                    }


                    }

             }
       



}