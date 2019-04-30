<?php

namespace Modeles\Tables;

use \Connexion;
/**
*@table="type_vehicule"
*/
class Type_vehicule
{

    /**
    *@column(field="ID",type="int(11)",key="PRI",extra="auto_increment")
    */
    private $id;
    
    /**
    *@column(field="TYPE",type="varchar(50)",key="",extra="")
    */
    private $type;
    
    /**
     * Type_vehicule constructor
     */
    public function __construct()
    {
        $this->tableName = "type_vehicule";
    }

    /**
     * @param $value
     * @return bool
     */
    public function setId($value)
    {
        $this->id = $value;
        return true;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $value
     * @return bool
     */
    public function setType($value)
    {
        $this->type = $value;
        return true;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    public function get()
    {
        return $this->getId();
    }


    public function findAll()
    {
        $req = Connexion::getInstance()->prepare('select * from type_vehicule');
        $req->execute();
        return $req->fetchAll(\PDO::FETCH_OBJ);
    }

    public function save()
    {
        if (empty($this->getId())) {
            $req = Connexion::getInstance()
                ->prepare("insert into type_vehicule 
                    values(NULL , '{$this->getType()}')");
            return $req->execute();
        } else {
            $req = Connexion::getInstance()
                ->prepare("update type_vehicule 
                set type = '{$this->getType()}' where id = {$this->getId()}");
            return $req->execute();
        }
    }

    public function remove()
    {
        $req = Connexion::getInstance()
            ->prepare("delete from type_vehicule where id = {$this->getId()}");
        return $req->execute();
    }

    public function find()
    {
        $req = Connexion::getInstance()
            ->prepare("select * from type_vehicule where id = {$this->getId()}");
        $req->execute();
        $res = $req->fetch(\PDO::FETCH_OBJ);
        $this->setType($res->TYPE);
        return $res;
    }


}