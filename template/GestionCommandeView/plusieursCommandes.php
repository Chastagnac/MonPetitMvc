<?php

echo 'Nombre de commandes trouvées : ' . count($commandes). '</p>';
$i = 1;
foreach ($commandes as $commande) {
    echo $commande->getId() . " - ". $commande->getIdClient() . " - " . $commande->getDateCde()
            . " - ";
            if(empty($commande->getNoFacture())){
                echo 'Non facturée';
            }else{
                echo $commande->getNoFacture();
            };
            echo " - " . $i++.'</p>';
};

