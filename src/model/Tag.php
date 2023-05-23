<?php
require_once('src/model/ConnectBdd.php');

class Tag {
    public $id;
    public $name;
}

class TagRepository extends ConnectBdd{
    public function __construct(){
        parent::__construct();
    }

    public function getTagById($id):object
    {
        $Tag = new Tag;
        $req = $this->bdd->prepare("SELECT * FROM `tag` WHERE `tag_id` = ?");
        $req->execute([$id]);
        $data = $req->fetch(PDO::FETCH_ASSOC);
        $Tag->id = $data['tag_id'];
        $Tag->name = $data['tag_name'];

        return $Tag;
    }

    public function getUserTags($id):array
    {
        $tags = [];
        $req = $this->bdd->prepare("SELECT tag_id FROM user_tag WHERE user_id = ?");
        $req->execute([$id]);
        $datas = $req->fetchAll(PDO::FETCH_COLUMN);

        foreach($datas as $data){
            $tag = $this->getTagById($data);
            array_push($tags, $tag);
        }

        return $tags;
    }
}


?>