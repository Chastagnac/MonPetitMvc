<?php

namespace APP\Model;

use \PDO;
use APP\Entity\Commande;
use Tools\Connexion;

class GestionCommandeModel {
    
    
        public function chercheUne(int $id): Commande {
        $unObjectPdo = Connexion::getConnexion();
        $sql = "select * from COMMANDE where id=:id";
        $ligne = $unObjectPdo->prepare($sql);
        $ligne->bindValue(':id', $id, PDO::PARAM_INT); //Associe une valeur à un paramètre :id
        $ligne->execute();
        var_dump($sql);
        return $ligne->fetchObject(Commande::class); //Récupère la prochaine ligne et la retourne en tant qu'objet (commande)
    }
    
      public function chercheToutes() {
        $unObjectPdo = Connexion::getConnexion();
        $sql = "select * from COMMANDE";
        $lignes = $unObjectPdo->query($sql);
        return $lignes->fetchAll(PDO::FETCH_CLASS, Commande::class);
    }
}
