<?php

namespace Modeles\Tables;

use \Connexion;
/**
*@table="probleme"
*/
class Probleme
{

    /**
     *@column(field="ID",type="int(11)",key="PRI",extra="auto_increment")
     */
    private $id;

    /**
     *@column(field="TECHNICIEN_ID",type="int(11)",key="MUL",extra="")
     */
    private $technicien_id;

    /**
     *@column(field="VEHICULE_ID",type="int(11)",key="MUL",extra="")
     */
    private $vehicule_id;

    /**
     *@column(field="DETAIL",type="text",key="",extra="")
     */
    private $detail;

    /**
     * Probleme constructor
     */
    public function __construct()
    {
        $this->tableName = "probleme";
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
    public function setTechnicien_id($value)
    {
        $this->technicien_id = $value;
        return true;
    }

    /**
     * @return mixed
     */
    public function getTechnicien_id()
    {
        return $this->technicien_id;
    }

    /**
     * @param $value
     * @return bool
     */
    public function setVehicule_id($value)
    {
        $this->vehicule_id = $value;
        return true;
    }

    /**
     * @return mixed
     */
    public function getVehicule_id()
    {
        return $this->vehicule_id;
    }

    /**
     * @param $value
     * @return bool
     */
    public function setDetail($value)
    {
        $this->detail = $value;
        return true;
    }

    /**
     * @return mixed
     */
    public function getDetail()
    {
        return $this->detail;
    }

    public function get()
    {
        return $this->getId();
    }

    /**
     * @Classe(name=TECHNICIEN,id=Technicien_id)
     */
    public function Technicien()
    {
        $t = new Technicien;
        $t->setId($this->getTechnicien_id());
        return $t->find();
    }


    /**
     * @Classe(name=VEHICULE,id=Vehicule_id)
     */
    public function Vehicule()
    {
        $t = new Vehicule;
        $t->setId($this->getVehicule_id());
        return $t->findAll();
    }

    public function Maintenance()
    {
        return $this->findByMaintenance();
    }

    public function findAllProblemeByVehicule()
    {
        $req = Connexion::getInstance()->prepare("select * from probleme where VEHICULE_ID = {$this->getVehicule_id()}");
        $req->execute();
        $res = $req->fetchAll(\PDO::FETCH_OBJ);
        $tab = [];
        $p = new Probleme();
        foreach ($res as $re) {
            $p->setId($re->ID);
            $p->setTechnicien_id($re->TECHNICIEN_ID);
            $p->setVehicule_id($re->VEHICULE_ID);
            $p->setDetail($re->DETAIL);
            $tab[] = $p;
        }

        return $tab;
    }

    public function findAll()
    {
        $req = Connexion::getInstance()->prepare('select * from probleme');
        $req->execute();
        $res = $req->fetchAll(\PDO::FETCH_OBJ);
        $tab = [];
        $p = new Probleme();
        foreach ($res as $re) {
            $p->setId($re->ID);
            $p->setTechnicien_id($re->TECHNICIEN_ID);
            $p->setVehicule_id($re->VEHICULE_ID);
            $p->setDetail($re->DETAIL);
            $tab[] = $p;
        }

        return $tab;
    }

    public function restFindAll()
    {
        $req = Connexion::getInstance()->prepare('select * from probleme');
        $req->execute();
        return $req->fetchAll(\PDO::FETCH_OBJ);
    }

    public function save()
    {
        if (empty($this->getId())) {
            if (empty($d = $this->search())) {
                $req = Connexion::getInstance()
                    ->prepare("insert into probleme values(NULL , {$this->getTechnicien_id()} , {$this->getVehicule_id()} , '{$this->getDetail()}')");
                $req->execute();
                return $this->search();
            } else {
                return $d;
            }
        } else {
            $req = Connexion::getInstance()
                ->prepare("update probleme 
                set TECHNICIEN_ID = {$this->getTechnicien_id()} , VEHICULE_ID = {$this->getVehicule_id()} , 
                    DETAIL  = '{$this->getDetail()}' where ID = {$this->getId()}");
            return $req->execute();
        }
    }

    public function remove()
    {
        $req = Connexion::getInstance()
            ->prepare("delete from probleme where ID = {$this->getId()}");
        return $req->execute();
    }

    public function search()
    {
        $req = Connexion::getInstance()
            ->prepare("select * from probleme where TECHNICIEN_ID = {$this->getTechnicien_id()} and VEHICULE_ID = {$this->getVehicule_id()}");
        $req->execute();
        $res = $req->fetch(\PDO::FETCH_OBJ);
        if (!empty($res)) {
            $this->setId($res->ID);
        }
        return $res;
    }

    public function find()
    {
        $req = Connexion::getInstance()
            ->prepare("select * from probleme where ID = {$this->getId()}");
        $req->execute();
        $res = $req->fetch(\PDO::FETCH_OBJ);
        $this->setTechnicien_id($res->TECHNICIEN_ID);
        $this->setVehicule_id($res->VEHICULE_ID);
        $this->setDetail($res->DETAIL);
        return $res;
    }

    public function findByMaintenance()
    {
        $req = Connexion::getInstance()
            ->prepare("select * from maintenance where PROBLEME_ID = {$this->getId()}");
        $req->execute();
        $res = $req->fetch(\PDO::FETCH_OBJ);
        return $res;
    }

    public function deepFind()
    {
        $req = Connexion::getInstance()
            ->prepare("select p.*, m.ID as MAINTENANCE_ID, m.DATE_DEBUT, m.DATE_FIN, m.SUJET, m.DESCRIPTION from probleme p LEFT JOIN maintenance m on p.ID = m.PROBLEME_ID where p.ID = {$this->getId()}");
        $req->execute();
        $res = $req->fetch(\PDO::FETCH_OBJ);
        return $res;
    }

}