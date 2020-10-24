<?php

namespace APP\Model;

use \PDO;
use APP\Entity\Client;
use Tools\Connexion;


class GestionClientModel {

    public function find($id) {
        $unObjetPdo = Connexion::getConnexion();
        $sql = "select * from CLIENT where id=:id";
        $ligne = $unObjetPdo->prepare($sql);
        $ligne->bindValue(':id', $id, PDO::PARAM_BOOL); //Associe une valeur à un paramètre :id
        $ligne->execute();
        return $ligne->fetchObject(Client::class);//Récupère la prochaine ligne et la retourne en tant qu'objet
    }
    
    public function findAll(){
        $unObjectPdo = Connexion::getConnexion();
        $sql = "select * from CLIENT";
        $lignes = $unObjectPdo->query($sql);
        return $lignes->fetchAll(PDO::FETCH_CLASS, Client::class);
    }
}
