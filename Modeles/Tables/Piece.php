<?php

namespace Modeles\Tables;

use \Connexion;

/**
*@table="piece"
*/
class Piece
{

    /**
     *@column(field="ID",type="int(11)",key="PRI",extra="auto_increment")
     */
    private $id;

    /**
     *@column(field="PIECE",type="text",key="",extra="")
     */
    private $piece;

    /**
     *@column(field="MAINTENANCE_ID",type="int(11)",key="MUL",extra="")
     */
    private $maintenance_id;

    /**
     * Piece constructor
     */
    public function __construct()
    {
        $this->tableName = "piece";
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
    public function setPiece($value)
    {
        $this->piece = $value;
        return true;
    }

    /**
     * @return mixed
     */
    public function getPiece()
    {
        return $this->piece;
    }

    /**
     * @param $value
     * @return bool
     */
    public function setMaintenance_id($value)
    {
        $this->maintenance_id = $value;
        return true;
    }

    /**
     * @return mixed
     */
    public function getMaintenance_id()
    {
        return $this->maintenance_id;
    }

    public function get()
    {
        return $this->getId();
    }

    /**
     * @Classe(name=MAINTENANCE,id=Maintenance_id)
     */
    public function Maintenance()
    {
        $t = new Maintenance;
        $t->setId($this->getMaintenance_id());
        return $t->findAll();
    }

    public function findAll()
    {
        $req = Connexion::getInstance()->prepare('select * from piece');
        $req->execute();
        $res = $req->fetchAll(\PDO::FETCH_OBJ);
        $tab = [];
        $p = new Piece();
        foreach ($res as $re) {
            $p->setId($re->ID);
            $p->setPiece($re->PIECE);
            $p->setMaintenance_id($re->MAINTENANCE_ID);
            $tab[] = $p;
        }

        return $tab;
    }

    public function save()
    {
        if (empty($this->getId())) {
            $req = Connexion::getInstance()
                ->prepare("insert into piece 
                    values(NULL , '{$this->getPiece()}' , {$this->getMaintenance_id()})");
            return $req->execute();
        } else {
            $req = Connexion::getInstance()
                ->prepare("update piece 
                set piece = '{$this->getPiece()}' , maintenance_id = {$this->getMaintenance_id()}
                    where id = {$this->getId()}");
            return $req->execute();
        }
    }

    public function remove()
    {
        $req = Connexion::getInstance()
            ->prepare("delete from piece where id = {$this->getId()}");
        return $req->execute();
    }

    public function find()
    {
        $req = Connexion::getInstance()
            ->prepare("select * from piece where id = {$this->getId()}");
        $req->execute();
        $res = $req->fetch(\PDO::FETCH_OBJ);
        $this->setMaintenance_id($res->MAINTENANCE_ID);
        $this->setPiece($res->PIECE);
        return $res;
    }


}