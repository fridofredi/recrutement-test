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

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        if (!$_SESSION['connect']) {
            header("Location:index.php?page=Auth/login");
        }
    }


    public function renderView(string $vue, array $data = [])
    {
        /**
         * Convertis le tableau $data en plusieurs variables en fonction de leur clé
         */
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