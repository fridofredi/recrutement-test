<?php

namespace Modeles\Tables;

use \Connexion;
/**
*@table="maintenance"
*/
class Maintenance
{

    /**
     * @column(field="ID",type="int(11)",key="PRI",extra="auto_increment")
     */
    private $id;

    /**
     * @column(field="DATE_DEBUT",type="date",key="",extra="")
     */
    private $date_debut;

    /**
     * @column(field="DATE_FIN",type="date",key="",extra="")
     */
    private $date_fin;

    /**
     * @column(field="SUJET",type="text",key="",extra="")
     */
    private $sujet;

    /**
     * @column(field="DESCRIPTION",type="text",key="",extra="")
     */
    private $description;

    /**
     * @column(field="PROBLEME_ID",type="int(11)",key="MUL",extra="")
     */
    private $probleme_id;

    /**
     * Maintenance constructor
     */
    public function __construct()
    {
        $this->tableName = "maintenance";
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
    public function setDate_debut($value)
    {
        $this->date_debut = $value;
        return true;
    }

    /**
     * @return mixed
     */
    public function getDate_debut()
    {
        return $this->date_debut;
    }

    /**
     * @param $value
     * @return bool
     */
    public function setDate_fin($value)
    {
        $this->date_fin = $value;
        return true;
    }

    /**
     * @return mixed
     */
    public function getDate_fin()
    {
        return $this->date_fin;
    }

    /**
     * @param $value
     * @return bool
     */
    public function setSujet($value)
    {
        $this->sujet = $value;
        return true;
    }

    /**
     * @return mixed
     */
    public function getSujet()
    {
        return $this->sujet;
    }

    /**
     * @param $value
     * @return bool
     */
    public function setDescription($value)
    {
        $this->description = $value;
        return true;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param $value
     * @return bool
     */
    public function setProbleme_id($value)
    {
        $this->probleme_id = $value;
        return true;
    }

    /**
     * @return mixed
     */
    public function getProbleme_id()
    {
        return $this->probleme_id;
    }

    public function get()
    {
        return $this->getId();
    }

    /**
     * @Classe(name=PROBLEME,id=Probleme_id)
     */
    public function Probleme()
    {
        $t = new Probleme;
        $t->setId($this->getProbleme_id());
        return $t->find();
    }

    public function findAll()
    {
        $req = Connexion::getInstance()->prepare('select * from maintenance');
        $req->execute();
        $res = $req->fetchAll(\PDO::FETCH_OBJ);
        $tab = [];
        $m = new Maintenance();
        foreach ($res as $re) {
            $m->setId($re->ID);
            $m->setSujet($re->SUJET);
            $m->setDate_fin($re->DATE_FIN);
            $m->setDate_debut($re->DATE_DEBUT);
            $m->setDescription($re->DESCRIPTION);
            $m->setProbleme_id($re->PROBLEME_ID);
            $tab[] = $m;
        }

        return $tab;
    }

    public function getAllVehicleOnMaintenanceNow()
    {
        $req = Connexion::getInstance()
            ->prepare("
                select v.* , tv.*, m.DATE_FIN
                from vehicule v JOIN type_vehicule tv on v.TYPE_VEHICULE_ID = tv.ID 
                  LEFT JOIN probleme p on v.ID = p.VEHICULE_ID 
                  LEFT JOIN maintenance m on p.ID = m.PROBLEME_ID where m.DATE_FIN > NOW()");
        $req->execute();
        $res = $req->fetchAll(\PDO::FETCH_OBJ);
        return $res;
    }

    public function restFindAll()
    {
        $req = Connexion::getInstance()->prepare('select * from maintenance');
        $req->execute();
        return $req->fetchAll(\PDO::FETCH_OBJ);
    }

    public function save()
    {
        if (empty($d = $this->getId())) {
            $req = Connexion::getInstance()
                ->prepare("insert into maintenance 
                    values(NULL , '{$this->getDate_debut()}' , '{$this->getDate_fin()}' , 
                           '{$this->getSujet()}', '{$this->getDescription()}', {$this->getProbleme_id()})");
            $req->execute();
            return $this->search();
        } else {
            $req = Connexion::getInstance()
                ->prepare("update maintenance 
                set DATE_DEBUT= '{$this->getDate_debut()}' , DATE_FIN = '{$this->getDate_fin()}' , 
                    SUJET  = '{$this->getSujet()}', DESCRIPTION = '{$this->getDescription()}',
                    PROBLEME_ID = {$this->getProbleme_id()} where ID = {$this->getId()}");
            return $req->execute();
        }
    }


    public function search()
    {
        $req = Connexion::getInstance()
            ->prepare("select * from maintenance where DATE_DEBUT= '{$this->getDate_debut()}' and DATE_FIN = '{$this->getDate_fin()}'  and 
                    SUJET  = '{$this->getSujet()}' and DESCRIPTION = '{$this->getDescription()}' and
                    PROBLEME_ID = {$this->getProbleme_id()}");
        $req->execute();
        $res = $req->fetch(\PDO::FETCH_OBJ);
        if (!empty($res)) {
            $this->setId($res->ID);
        }
        return $res;
    }

    public function remove()
    {
        $req = Connexion::getInstance()
            ->prepare("delete from maintenance where ID = {$this->getId()}");
        return $req->execute();
    }

    public function find()
    {
        $req = Connexion::getInstance()
            ->prepare("select * from maintenance where ID = {$this->getId()}");
        $req->execute();
        $res = $req->fetch(\PDO::FETCH_OBJ);
        $this->setSujet($res->SUJET);
        $this->setDate_fin($res->DATE_FIN);
        $this->setDate_debut($res->DATE_DEBUT);
        $this->setDescription($res->DESCRIPTION);
        $this->setProbleme_id($res->PROBLEME_ID);
        return $res;
    }

    public function getPieces()
    {
        $req = Connexion::getInstance()
            ->prepare("select * from piece where MAINTENANCE_ID = {$this->getId()}");
        $req->execute();
        $res = $req->fetchAll(\PDO::FETCH_OBJ);
        return $res;
    }


}