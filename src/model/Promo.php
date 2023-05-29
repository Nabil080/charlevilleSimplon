<?php
require_once('src/model/ConnectBdd.php');
require_once('src/model/User.php');
require_once('src/model/Status.php');



class Promo {
    public int $id;
    public string $name;
    public $start;
    public $end;
    public  $status;
    public $year;
    public $status_id;
    public $formation_id;



    public function __construct (int $id, $name, $start, $end, $year,$formation_id, $status_id) 
    {
        $this->id = $id;
        $this->start = $start;
        $this->name = $name;
        $this->end = $end;
        $this->year = $year;
        $this->formation_id = $formation_id;

        $statusRepo = new StatusRepository;
        $Status = $statusRepo->getStatusById($status_id);
        $this->status = $Status;
    }
}

class PromoRepository extends ConnectBdd{
    public function __construct(){
        parent::__construct();
    }

    public function getPromoById(int $id):object
    {
        $promoRepository = new PromoRepository;
        $req = $this->bdd->prepare("SELECT * FROM `promo` WHERE `promo_id` = ?");
        $req->execute([$id]);
        $data = $req->fetch(PDO::FETCH_ASSOC);


        $Promo = new Promo(
        $data['promo_id'], 
        $data['promo_name'], 
        $promoRepository->formateDate($data['promo_start']),
        $promoRepository->formateDate($data['promo_end']),
        $data['promo_year'],
        $data['formation_id'],
        $data['status_id']
        );

        return $Promo;
    }

    public function getPromos(): array
    {
        
        $promoRepository = new PromoRepository;
        $req = $this->bdd->prepare("SELECT * FROM `promo`");
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $promos = [];

        foreach ($datas as $data) 
        {
            $Promo = new Promo(
                $data['promo_id'], 
                $data['promo_name'], 
                $promoRepository->formateDate($data['promo_start']),
                $promoRepository->formateDate($data['promo_end']),
                $data['promo_year'],
                $data['formation_id'],
                $data['status_id']
                );

            array_push($promos, $Promo);

        }


        return $promos;
    }

    public function formateDate($date):string
    {
        $mois = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];
        $explode  = substr($date, '5', '2');
        $date = date('d-m-Y', strtotime($date));
        $findMois = $mois[($explode * 1) - 1];
        $date = str_replace($explode, $findMois, $date);
        $date = str_replace("-", " ", $date);
        return $date;
    }

    public function getAllApprenants($id):array 
    {
        $req = $this->bdd->prepare("SELECT user_id FROM promo_user WHERE promo_id = ?");
        $req->execute([$id]);
        $datas = $req->fetchAll(PDO::FETCH_COLUMN);
        $UsersRepository = new UsersRepository;
        $users = [];
        
        foreach ($datas as $data) {
            $user = $UsersRepository->getUserById($data);
            array_push($users, $user);
        }
        return $users;
    }

    public function getAllFormateurs($id):array 
    {
        $req = $this->bdd->prepare("SELECT user_id FROM promo_user 
        WHERE promo_id = ?");
        $req->execute([$id]);
        $datas = $req->fetchAll(PDO::FETCH_COLUMN);
        $UsersRepository = new UsersRepository;
        $users = [];
        
        foreach ($datas as $data) {
            $user = $UsersRepository->getUserById($data);
            if ($user->role->name == "Formateur") {
                array_push($users, $user);
            }
        }
        return $users;
    }

    public function getPromoProjects($id):array
    {
        $req = $this->bdd->prepare("SELECT project_id FROM project 
        WHERE promo_id = ?");
        $req->execute([$id]);
        $datas = $req->fetchAll(PDO::FETCH_COLUMN);
        $ProjectRepository = new ProjectRepository;
        $projects = [];
        
        foreach ($datas as $data) {
            $project = $ProjectRepository->getProjectById($data);
            array_push($projects, $project);
            }
        return $projects;
    }

    public function getPromoStart($id) {
        $req = $this->bdd->prepare("SELECT `promo_start` FROM `promo` WHERE `formation_id` = ?");
        $req->execute([$id]);
        $data = $req->fetch(PDO::FETCH_COLUMN);
        return $data;
    }
    
}


?>