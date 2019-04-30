<?php

namespace Modeles\Tables;

/**
*@table="intervenir"
*/
class Intervenir
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
    *@column(field="MAINTENANCE_ID",type="int(11)",key="MUL",extra="")
    */
    private $maintenance_id;
    
    /**
     * Intervenir constructor
     */
    public function __construct()
    {
        $this->tableName = "intervenir";
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
    * @Classe(name=TECHNICIEN,id=Technicien_id)
    */
    public function Technicien()
    {
        $t = new Technicien;
        $t->setId($this->getTechnicien_id());
        return $t->findAll();
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