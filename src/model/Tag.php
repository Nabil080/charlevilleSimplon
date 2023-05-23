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

        $Tag->id = $data['Tag_id'];
        $Tag->name = $data['Tag_name'];

        return $Tag;
    }
}


?>