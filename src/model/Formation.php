<?php
require_once('src/model/ConnectBdd.php');

class Formation
{
    public $formation_id;
    public $formation_name;
    public $formation_description;
    public $formation_duration;
    public $formation_level;
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
        $data = $req->fetch(PDO::FETCH_OBJ);

        $Formation->id = $data['formation_id'];
        $Formation->name = $data['formation_name'];
        $Formation->description = $data['formation_description'];
        $Formation->name = $data['formation_name'];
        $Formation->name = $data['formation_name'];
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

