<?php


include_once PATH_VIEW . "header.html";
var_dump($unClient);//var_dump affiche les détails d'une variable avec son type et sa valeur
echo "Nom du projet : " . $unClient->getNomCli();
include_once PATH_VIEW . "footer.html";