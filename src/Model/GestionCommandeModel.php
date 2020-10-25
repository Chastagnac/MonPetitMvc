<?php

namespace APP\Model;

use \PDO;
use APP\Entity\Client;
use Tools\Connexion;

class GestionCommandeModel {
        public function findCommande($id) {
        $unObjectPdo = Connexion::getConnexion();
        $sql = "select * from COMMANDE where id=:id";
        $ligne = $unObjectPdo->prepare($sql);
        $ligne->bindValue(':id', $id, PDO::PARAM_BOOL); //Associe une valeur à un paramètre :id
        $ligne->execute();
        return $ligne->fetchObject(Client::class); //Récupère la prochaine ligne et la retourne en tant qu'objet
    }
}
