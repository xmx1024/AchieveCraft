<?php

namespace jdf221\AchieveCraft;
class Database
{

    private $Mongo;
    private $Database;

    private $Groups;
    private $Icons;

    public function __construct()
    {
        $this->Mongo = new \MongoClient();
        $this->Database = $this->Mongo->AchieveCraftLive;

        $this->Groups = $this->Database->Groups;
        $this->Icons = $this->Database->Icons;
    }

    private function getId($seed, $check = false)
    {
        if(!is_string($seed)){
            $seed = strval(rand(111111, 666666));
        }

        if (!$check) {
            $check = function () {
                return true;
            };
        }

        $id = substr(md5($seed), rand(1, 16), 2) . substr(shell_exec('date +%s%N'), -4, -1);
        if ($check($id)) {
            return $id;
        } else {
            $this->getId($seed, $check);
        }
    }

    private function cleanMongoArray($array){
        unset($array['_id']);

        return $array;
    }

    private function iteratorToArray($array){
        $return = array();
        foreach($array as $element){
            $return[] = $this->cleanMongoArray($element);
        }

        return $return;
    }


    public function getPublicGroups(){
        return $this->iteratorToArray($this->Groups->find(array("public" => true)));
    }

    public function getGroup($id){
        return $this->cleanMongoArray($this->Groups->findOne(array("id" => $id)));
    }

    public function getGroupIcons($id){
        return $this->iteratorToArray($this->Icons->find(array("groupId" => $id)));
    }

    public function getIcon($id){
        return $this->cleanMongoArray($this->Icons->findOne(array("id" => $id)));
    }


    public function newGroup($name){
        $id = $this->getId($name, function($possibleId){
            return $this->getGroup($possibleId);
        });

        $insert = $this->Groups->insert(array("public" => false, "name" => $name, "id" => $id));

        if(is_array($insert) && $insert['ok'] == 1){
            return $id;
        }
        else{
            return false;
        }
    }

    public function newIcon($base64, $groupId = "unlisted"){
        $id = $this->getId($base64, function($possibleId){
            return $this->getIcon($possibleId);
        });

        $insert = $this->Icons->insert(array("id" => $id, "groupId" => $groupId, "base64" => $base64));

        if(is_array($insert) && $insert['ok'] == 1){
            return $id;
        }
        else{
            return false;
        }
    }

}