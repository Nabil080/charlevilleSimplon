<?php
require_once('src/model/ConnectBdd.php');

class Certification
{
    public $id;
    public $name;
    public $ref;
    public $link;
    public $description;

    public function __construct($id, $name, $ref, $link, $description)
    {
        $this->id = $id;
        $this->ref = $ref;
        $this->name = $name;
        $this->link = $link;
        $this->$description = $description;
    }
}

class CertificationRepository extends ConnectBdd
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll(): array
    {
        $req = $this->bdd->prepare("SELECT * FROM `certification` ORDER BY certification_name");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
    public function getCertificationByFormation($formation_id): array
    {
        $req = $this->bdd->prepare("SELECT * FROM `certification` AS ce INNER JOIN `formation_certification` AS fc ON ce.certification_id = fc.certification_id WHERE `formation_id` = ?");
        $req->execute([$formation_id]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        $certificationTable = array();
        foreach ($data as $certification) {
            $certificationTable[$certification['certification_id']] = [
                'name' => $certification['certification_name'],
                'ref' => $certification['certification_ref'],
                'link' => $certification['certification_link'],
                'description' => $certification['certification_description']
            ];
        }

        return $certificationTable;
    }
    public function addLink($formation_id, $id): void
    {
        $req = "INSERT INTO `formation_certification` SET formation_id = ?, certification_id = ?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$formation_id, $id]);
        $stmt->closeCursor();
    }
    public function deleteLink($formation_id): void
    {
        $req = "DELETE FROM `formation_certification` WHERE formation_id =?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$formation_id]);
        $stmt->closeCursor();
    }

    public function updateReference($id, $ref): void
    {
        $req = "UPDATE `certification` SET `certification_ref` = ? WHERE `certification_id` = ?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$ref, $id]);
        $stmt->closeCursor();
    }
    public function updateName($id, $name): void
    {
        $req = "UPDATE `certification` SET `certification_name` = ? WHERE `certification_id` = ?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$name, $id]);
        $stmt->closeCursor();
    }
    public function updateLink($id, $link): void
    {
        $req = "UPDATE `certification` SET `certification_link` = ? WHERE `certification_id` = ?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$link, $id]);
        $stmt->closeCursor();
    }
    public function updateDescription($id, $description): void
    {
        $req = "UPDATE `certification` SET `certification_description` = ? WHERE `certification_id` = ?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$description, $id]);
        $stmt->closeCursor();
    }
}