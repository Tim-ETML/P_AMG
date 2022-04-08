<?php
/**
 * Auteur : Cindy Hardegger
 * Date: 22.01.2019
 * Contrôleur principal
 */

abstract class Controller {

    /**
     * Méthode permettant d'appeler l'action 
     *
     * @return mixed
     */
    public function display() {

        $page = $_GET['action'] . "Display";

        $this->$page();
    }

    private function listAction() {

        $view = file_get_contents('view/page/car/list.php');

        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }
}