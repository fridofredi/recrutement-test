<?php

namespace Modeles\Tables;

/**
*@table="maintenance"
*/
class Maintenance
{

    /**
    *@column(field="ID",type="int(11)",key="PRI",extra="auto_increment")
    */
    private $id;
    
    /**
    *@column(field="DATE_DEBUT",type="date",key="",extra="")
    */
    private $date_debut;
    
    /**
    *@column(field="DATE_FIN",type="date",key="",extra="")
    */
    private $date_fin;
    
    /**
    *@column(field="SUJET",type="text",key="",extra="")
    */
    private $sujet;
    
    /**
    *@column(field="DESCRIPTION",type="text",key="",extra="")
    */
    private $description;
    
    /**
    *@column(field="PROBLEME_ID",type="int(11)",key="MUL",extra="")
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
        return $t->findAll();
    }
                

}
 ?>