<?php
require_once('src/model/ConnectBdd.php');

class Promo {
    public $id;
    public $name;
    public $start;
    public $end;
    public $status;
    public $formation;
}

class PromoRepository extends ConnectBdd{
    public function __construct(){
        parent::__construct();
    }

    public function getPromoById($id):object
    {
        $Promo = new Promo;
        $req = $this->bdd->prepare("SELECT * FROM `promo` WHERE `promo_id` = ?");
        $req->execute([$id]);
        $data = $req->fetch(PDO::FETCH_ASSOC);

        $Promo->id = $data['promo_id'];
        $Promo->start = $data['promo_start'];
        $Promo->end = $data['promo_end'];
        $Promo->name = $data['promo_name'];

        $Status = new Status;
        $statusRepo = new StatusRepository;
        $Status = $statusRepo->getStatusById($data['status_id']);
        $Promo->status = $Status;

        $Formation = new Formation;
        $formationRepo = new FormationRepository;
        $Formation = $formationRepo->getFormationById($data['formation_id']);
        $Promo->formation = $Formation;

        return $Promo;
    }

    public function getPromoByUserID($id)
    {
        $req = $this->bdd->prepare("SELECT * FROM `promo_candidate` WHERE `user_id` = ?");
        $req->execute([$id]);
        $data = $req->fetch(PDO::FETCH_ASSOC);

        if (empty($data))
        {
            $req = $this->bdd->prepare("SELECT * FROM `promo_refused` WHERE `user_id` = ?");
            $req->execute([$id]);
            $data = $req->fetch(PDO::FETCH_ASSOC);

            if (empty($data))
            {
                $req = $this->bdd->prepare("SELECT * FROM `promo_user` WHERE `user_id` = ?");
                $req->execute([$id]);
                $data = $req->fetch(PDO::FETCH_ASSOC);

                if (empty($data))
                {
                    return "Cet utilisateur n'appartient à aucune promotion en cours ou ayant existé.";
                }
                else
                {
                $Promo_datas = $this->getPromoById($data['user_id']);
                return $Promo_datas;
                }
            }
            else
            {
            $Promo_datas = $this->getPromoById($data['user_id']);
            return $Promo_datas;
            }
        }
        else
        {
        $Promo_datas = $this->getPromoById($data['user_id']);
        return $Promo_datas;
        }
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

}