<?php

namespace APP\Controller;

use APP\Model\GestionClientModel;
use ReflectionClass;

class GestionClientController {

    public function chercheUn(array $params):void {
        $modele = new GestionClientModel();
        $id = filter_var(intval($params["id"]), FILTER_VALIDATE_INT); //filter si l'id passé en parametre est bien un int
        $unClient = $modele->find($id);
        if ($unClient) {
            $r = new ReflectionClass($this);
            include_once PATH_VIEW . str_replace('Controller', 'View', $r->getShortName()) . "/unClient.php";
        } else {
            throw new Exception("Client" . $id . " inconnu");
        }
    }

    public function chercheTous():void {
        $modele = new GestionClientModel();
        $clients = $modele->findAll();
        if ($clients) {
            $r = new \ReflectionClass($this);
            include_once PATH_VIEW . str_replace('Controller', 'View', $r->getShortName()) . "/plusieursClients.php";
        } else {
            throw new Exception("Aucun Client à afficher");
        }
    }
}
