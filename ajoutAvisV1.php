<?php
require_once 'DAO.php';
//simulation contenu de formulaire de saisie d'un avis , sans contrôle de saisie
$contenu="Quelle incompétence!',now(),true,true,5),('A fuir absolument',now(),true,true,5), ('Accueil froid, moniteurs désagréables',now(),true,true,5), ('Aucun point positif',now(),true,true,5), ('Choisissez une autre auto-école',now(),true,true,5) , ('formation OK";
$req="insert into avis(contenu,dateDepot,publie, modere, idEleve) values('".$contenu."',now(),false,false,12);";
$connex = connexionPDO();
$connex->query($req);

?>
