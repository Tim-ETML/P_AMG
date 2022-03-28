<?php
/**
 * Auteur : Bruno Grin
 * Date: 28.03.2022
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
}