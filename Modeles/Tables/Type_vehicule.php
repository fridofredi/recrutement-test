<?php

namespace Modeles\Tables;

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

}
 ?>