<?php

namespace APP\Controler;

use App\Model\GestionClientModel;
use ReflectionClass;

class GestionClientController {

    public function chercheUn($params) {
        $modele = new GestionClientModel();
        $id = filter_var(intval($params["id"]), FILTER_VALIDATE_INT);//filter si l'id passé en parametre est bien un int
        $unClient = $modele->find($id);
        if ($unClient) {
            $r = new ReflectionClass($this);
            include_once PATH_VIEW . str_replace('Controller', 'View', $r->getShortName()) . "/unClient.php";
        } else {
            throw new Exception("Client" . $id . " inconnu");
        }
    }

}
