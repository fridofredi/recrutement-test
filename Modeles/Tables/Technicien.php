<?php

namespace Modeles\Tables;

/**
*@table="technicien"
*/
class Technicien
{

    /**
    *@column(field="ID",type="int(11)",key="PRI",extra="auto_increment")
    */
    private $id;
    
    /**
    *@column(field="NOM",type="varchar(50)",key="",extra="")
    */
    private $nom;
    
    /**
    *@column(field="PRENOMS",type="varchar(150)",key="",extra="")
    */
    private $prenoms;
    
    /**
    *@column(field="USERNAME",type="varchar(100)",key="",extra="")
    */
    private $username;
    
    /**
    *@column(field="PASSWORD",type="text",key="",extra="")
    */
    private $password;
    
    /**
    *@column(field="ADMIN_ID",type="int(11)",key="MUL",extra="")
    */
    private $admin_id;
    
    /**
     * Technicien constructor
     */
    public function __construct()
    {
        $this->tableName = "technicien";
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
    public function setNom($value)
    {
        $this->nom = $value;
        return true;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param $value
     * @return bool
     */
    public function setPrenoms($value)
    {
        $this->prenoms = $value;
        return true;
    }

    /**
     * @return mixed
     */
    public function getPrenoms()
    {
        return $this->prenoms;
    }

    /**
     * @param $value
     * @return bool
     */
    public function setUsername($value)
    {
        $this->username = $value;
        return true;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param $value
     * @return bool
     */
    public function setPassword($value)
    {
        $this->password = $value;
        return true;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param $value
     * @return bool
     */
    public function setAdmin_id($value)
    {
        $this->admin_id = $value;
        return true;
    }

    /**
     * @return mixed
     */
    public function getAdmin_id()
    {
        return $this->admin_id;
    }

    public function get()
    {
        return $this->getId();
    }
            
    /**
    * @Classe(name=ADMIN,id=Admin_id)
    */
    public function Admin()
    {
        $t = new Admin;
        $t->setId($this->getAdmin_id());
        return $t->findAll();
    }
                

}
 ?>