<?php

/**
 * ETML
 * Auteur :  Jonathan Dale
 * Date: 01.04.2022
 * Site web en MVC et orienté objet sur les Mercedes AMG
 */

$debug = false;

//activer le debugging
if ($debug) {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
}

date_default_timezone_set('Europe/Zurich');

include_once 'controller/Controller.php';
include_once 'controller/HomeController.php';
include_once 'controller/CarController.php';


class MainController {

    /**
     * Permet de sélectionner le bon controller et l'action
     */
    public function dispatch() {

        if (!isset($_GET['controller'])) {
            $_GET['controller'] = 'home';
            $_GET['action'] = 'index';
        }


        $currentLink = $this->menuSelected($_GET['controller']);
        $this->viewBuild($currentLink);
    }

    /**
     * Selectionner la page et instancier le contrôleur
     *
     * @param string $page : page sélectionner
     * @return $link : instanciation d'un contrôleur
     */
    protected function menuSelected ($page) {

        switch($_GET['controller']){
            case 'home':
                $link = new HomeController();
                break;
            case 'car':
                $link = new CarController();
                break;
            default:
                $link = new HomeController();
                break;
        }

        return $link;
    }

    /**
     * Construction de la page
     *
     * @param $currentPage : page qui doit s'afficher
     */
    protected function viewBuild($currentPage) {

            $content = $currentPage->display();

            include(dirname(__FILE__) . '/view/head.html');
            include(dirname(__FILE__) . '/view/header.html');
            include(dirname(__FILE__) . '/view/menu.php');
            echo $content;
            include(dirname(__FILE__) . '/view/footer.html');
    }
}

/**
 * Affichage du site internet - appel du contrôleur par défaut
 */
$controller = new MainController();
$controller->dispatch();