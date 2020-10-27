<?php

namespace APP\Controller;

use APP\Model\GestionClientModel;
use \Tools\MyTwig;
use ReflectionClass;

class GestionClientController {

    public function chercheUn(array $params): void {
        $modele = new GestionClientModel();
        $id = filter_var(intval($params["id"]), FILTER_VALIDATE_INT); //filter si l'id passé en parametre est bien un int
        $unClient = $modele->find($id);
        if ($unClient) {//permet de tester si un client a était trouvé par son id.
            $r = new ReflectionClass($this);
            $vue = str_replace('Controller', 'View', $r->getShortName()) . "/unClient.html.twig";
            MyTwig::afficheVue($vue, array('unClient' => $unClient));
        } else {
            throw new Exception("Client" . $id . " inconnu");
        }
    }

    public function chercheTous(): void {
        $modele = new GestionClientModel();
        $clients = $modele->findAll();
        if ($clients) {
            $r = new ReflectionClass($this);
            $vue = str_replace('Controller', 'View', $r->getShortName()) . "/tousClients.html.twig";
            MyTwig::afficheVue($vue, array('$clients' => $clients));
        } else {
            throw new Exception("Aucun Client à afficher");
        }
    }

}
