<?php

namespace Modeles\Tables;

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
                

}
 ?>