<?php
require_once('src/model/ConnectBdd.php');

class Certification {
    public $id;
    public $name;
    public $ref;
    public $link;
}

class CertificationRepository extends ConnectBdd{
    public function __construct(){
        parent::__construct();
    }

    public function getCertificationById($id):object
    {
        $Certification = new Certification;
        $req = $this->bdd->prepare("SELECT * FROM `certification` WHERE `certification_id` = ?");
        $req->execute([$id]);
        $data = $req->fetch(PDO::FETCH_ASSOC);

        $Certification->id = $data['certification_id'];
        $Certification->name = $data['certification_name'];
        $Certification->ref = $data['certification_ref'];
        $Certification->link = $data['certification_link'];

        return $Certification;
    }
}


?>