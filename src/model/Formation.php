<?php
require_once('src/model/ConnectBdd.php');

class Formation
{
    public $id;
    public $name;
    public $description;
    public $duration;
    public $level;
    public $status;
}
class FormationRepository extends ConnectBdd
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getFormationById($id):object
    {
        $Formation = new Formation;
        $req = $this->bdd->prepare("SELECT * FROM `formation` WHERE `formation_id` = ?");
        $req->execute([$id]);
        $data = $req->fetch(PDO::FETCH_ASSOC);

        $Formation->id = $data['formation_id'];
        $Formation->name = $data['formation_name'];
        $Formation->description = $data['formation_description'];
        $Formation->duration = $data['formation_duration'];
        $Formation->level = $data['formation_level'];

        $Status = new Status;
        $statusRepo = new StatusRepository;
        $Status = $statusRepo->getStatusById($data['status_id']);
        $Formation->status = $Status;

        return $Formation;
    }

    public function getFormations()
    {
        $req = $this->bdd->prepare('SELECT * FROM formation');
        $req->execute();
        $datas = $req->fetchAll();
        $formations = [];
        
        foreach($datas as $formationBdd)
        {
            $article = new Article();
            $avatar = new AuthorRepository();
            $avatar = $avatar->getDataByAuthorId($articleBdd['id_user']);
            $article->id = $articleBdd['id_article'];
            $article->title = $articleBdd['title_article'];
            $article->image = $articleBdd['image_article'];
            $article->description = $articleBdd['description_article'];
            $article->author = $articleBdd['author_article'];
            $article->date = $articleBdd['date_article'];
            $article->id_author = $articleBdd['id_user'];
            $article->author_avatar = $avatar;
            $articles[] = $article;
        } 
        return $articles;
    }
}

