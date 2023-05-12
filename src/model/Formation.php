<?php
require_once('src/model/ConnectBdd.php');

class Formation
{
    public $formation_id;
    public $formation_name;
    public $formation_description;
    public $formation_duration;
    public $formation_level;
    public $status_id;
    public $id_author;
    public $author_avatar;
}
class FormationsRepository extends ConnectBdd
{
    public function __construct()
    {
        parent::__construct();
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

