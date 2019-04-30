<?php

namespace Modeles\Tables;

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
        return $t->findAll();
    }
                
            
    /**
    * @Classe(name=GESTIONNAIRE,id=Gestionnaire_id)
    */
    public function Gestionnaire()
    {
        $t = new Gestionnaire;
        $t->setId($this->getGestionnaire_id());
        return $t->findAll();
    }
                

}
 ?>