<?php

namespace Modeles\Tables;

use \Connexion;

/**
*@table="vehicule"
*/
class Vehicule
{

    /**
     *@column(field="ID",type="int(11)",key="PRI",extra="auto_increment")
     */
    private $id;

    /**
     *@column(field="TYPE_VEHICULE_ID",type="int(11)",key="MUL",extra="")
     */
    private $type_vehicule_id;

    /**
     *@column(field="DATE_ACHAT",type="date",key="",extra="")
     */
    private $date_achat;

    /**
     *@column(field="GESTIONNAIRE_ID",type="int(11)",key="MUL",extra="")
     */
    private $gestionnaire_id;

    /**
     * Vehicule constructor
     */
    public function __construct()
    {
        $this->tableName = "vehicule";
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
    public function setType_vehicule_id($value)
    {
        $this->type_vehicule_id = $value;
        return true;
    }

    /**
     * @return mixed
     */
    public function getType_vehicule_id()
    {
        return $this->type_vehicule_id;
    }

    /**
     * @param $value
     * @return bool
     */
    public function setDate_achat($value)
    {
        $this->date_achat = $value;
        return true;
    }

    /**
     * @return mixed
     */
    public function getDate_achat()
    {
        return $this->date_achat;
    }

    /**
     * @param $value
     * @return bool
     */
    public function setGestionnaire_id($value)
    {
        $this->gestionnaire_id = $value;
        return true;
    }

    /**
     * @return mixed
     */
    public function getGestionnaire_id()
    {
        return $this->gestionnaire_id;
    }

    public function get()
    {
        return $this->getId();
    }

    /**
     * @Classe(name=TYPE_VEHICULE,id=Type_vehicule_id)
     */
    public function Type_vehicule()
    {
        $t = new Type_vehicule;
        $t->setId($this->getType_vehicule_id());
        return $t->findAll()[0];
    }


    /**
     * @Classe(name=GESTIONNAIRE,id=Gestionnaire_id)
     */
    public function Gestionnaire()
    {
        $t = new Gestionnaire;
        $t->setId($this->getGestionnaire_id());
        return $t->find();
    }

    public function findAll()
    {
        $req = Connexion::getInstance()->prepare('select * from vehicule');
        $req->execute();
        $res = $req->fetchAll(\PDO::FETCH_OBJ);
        $tab = [];
        $v = new Vehicule();
        foreach ($res as $re) {
            $v->setId($re->ID);
            $v->setGestionnaire_id($re->GESTIONNAIRE_ID);
            $v->setType_vehicule_id($re->TYPE_VEHICULE_ID);
            $v->setDate_achat($re->DATE_ACHAT);
            $tab[] = $v;
        }

        return $tab;
    }


    public function restFindAll()
    {
        $req = Connexion::getInstance()->prepare('select * from vehicule');
        $req->execute();
        return $req->fetchAll(\PDO::FETCH_OBJ);
    }

    public function save()
    {
        if (empty($this->getId())) {
            $req = Connexion::getInstance()
                ->prepare("insert into vehicule 
                    values(NULL , {$this->getType_vehicule_id()} , '{$this->getDate_achat()}' , {$this->getGestionnaire_id()})");
            return $req->execute();
        } else {
            $req = Connexion::getInstance()
                ->prepare("update vehicule 
                set TYPE_VEHICULE_ID = {$this->getType_vehicule_id()} , DATE_ACHAT = '{$this->getDate_achat()}' , 
                    GESTIONNAIRE_ID  = {$this->getGestionnaire_id()} where ID = {$this->getId()}");
            return $req->execute();
        }
    }

    public function remove()
    {
        $req = Connexion::getInstance()
            ->prepare("delete from vehicule where ID = {$this->getId()}");
        return $req->execute();
    }

    public function find()
    {
        $req = Connexion::getInstance()
            ->prepare("select * from vehicule where ID = {$this->getId()}");
        $req->execute();
        $res = $req->fetch(\PDO::FETCH_OBJ);
        $this->setDate_achat($res->DATE_ACHAT);
        $this->setGestionnaire_id($res->GESTIONNAIRE_ID);
        $this->setType_vehicule_id($res->TYPE_VEHICULE_ID);
        return $res;
    }

}