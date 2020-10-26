<?php

namespace APP\Controller;

use APP\Model\GestionCommandeModel;
use ReflectionClass;

class GestionCommandeController {

    public function chercheUne(array $params):void {
        $modele = new GestionCommandeModel();
        $id = filter_var(intval($params["id"]), FILTER_VALIDATE_INT); //filter si l'id passé en parametre est bien un int
        $uneCommande = $modele->chercheUne($id);
        if ($uneCommande) {
            $r = new ReflectionClass($this);
            include_once PATH_VIEW . str_replace('Controller', 'View', $r->getShortName()) . "/uneCommande.php";
        } else {
            throw new \Exception("commande" . $id . " inconnue");
        }
    }    
    
     public function chercheToutes():void {
        $modele = new GestionCommandeModel();
        $commandes = $modele->chercheToutes();
        if ($commandes) {
            $r = new \ReflectionClass($this);
            include_once PATH_VIEW . str_replace('Controller', 'View', $r->getShortName()) . "/plusieursCommandes.php";
        } else {
            throw new Exception("Aucun Client à afficher");
        }
    }
}
