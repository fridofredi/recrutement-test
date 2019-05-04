<?php
/**
 * Created by PhpStorm.
 * User: EDOGAWA
 * Date: 30/04/2019
 * Time: 01:23
 */

namespace Controllers;


class Controller
{
    /**
     * Le layout du contenu à afficher
     *
     * @var string
     */
    protected $layout;

    protected $predata = [];

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        if (!$_SESSION['connect']) {
            header("Location:index.php?page=Auth/login");
        }
        $menus = array(
            "admin" => array(
                array("index.php?page=Default", "Accueil", "fas fa-chart-pie mr-3"),
                array("index.php?page=Technicien", "Technicien", "fas fa-user mr-3"),
                array("index.php?page=Gestionnaire", "Gestionnaire", "fas fa-user mr-3"),
            ),
            "gestionnaire" => array(
                array("index.php?page=Default", "Accueil", "fas fa-chart-pie mr-3"),
                array("index.php?page=Vehicule", "Vehicule", "fas fa-car mr-3"),
                array("index.php?page=Type_vehicule", "Type de véhicule", "fas fa-map mr-3"),
            ),
            "technicien" => array(
                array("index.php?page=Default", "Accueil", "fas fa-chart-pie mr-3"),
                array("index.php?page=Vehicule", "Vehicule", "fas fa-car mr-3")
            )
        );
        $profile_connected = "none";
        if (isset($_SESSION['technicien_id']) and !empty($_SESSION['technicien_id'])) {
            $profile_connected = "technicien";
        } else if (isset($_SESSION['admin_id']) and !empty($_SESSION['admin_id'])) {
            $profile_connected = "admin";
        } else if (isset($_SESSION['gestionnaire_id']) and !empty($_SESSION['gestionnaire_id'])) {
            $profile_connected = "gestionnaire";
        }
        $this->predata['menus'] = $menus;
        $this->predata['profile_connected'] = $profile_connected;
    }


    public function renderView(string $vue, array $data = [])
    {
        /**
         * Convertis le tableau $data en plusieurs variables en fonction de leur clé
         */
        $data = array_merge_recursive($data, $this->predata);
        extract($data);

        $CSRF = function () {
            return "<input type='hidden' name='csrf' value='{$_SESSION['csrf']}'/>";
        };

        /**
         * Début de la mise en cache
         */
        ob_start();

        /**
         * Chargement de la page
         */
        $vue = str_replace('\\', '/', $vue);

        require "Vues/Pages/" . $vue . ".php";

        /**
         * Met dans la variable $content tout ce qui a été affiché depuis le debut
         * de la temporisation
         */
        $content = ob_get_clean();

        /**
         * Récupération du contenu à afficher
         */
        ob_start();
        if (!$this->layout) {
            echo $content;
        } else {
            $this->layout = str_replace('\\', '/', $this->layout);

            require "Vues/Pages/{$this->layout}.php";
        }
        $page = ob_get_clean();
        return $page;
    }

    /**
     * @param string $layout
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }


}