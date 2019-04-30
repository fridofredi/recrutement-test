<?php

namespace Modeles\Tables;

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
        return $t->findAll();
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
                

}
 ?>