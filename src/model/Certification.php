<?php
require_once('src/model/ConnectBdd.php');

class Certification
{
    public $id;
    public $name;
    public $ref;
    public $link;
}

class CertificationRepository extends ConnectBdd
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getCertificationByFormation($formation_id): array
    {
        $req = $this->bdd->prepare("SELECT * FROM `certification` AS ce INNER JOIN `formation_certification` AS fc ON ce.certification_id = fc.certification_id WHERE `formation_id` = ?");
        $req->execute([$formation_id]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
}

?>