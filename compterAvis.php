<?php
require_once 'DAO.php';

$unEleve=getEleveByLogin('toni');
//var_dump($unEleve);
$unAvis=new Avis(10,'Quelle incompétence',date('Y-m-d'),$unEleve);
$unEleve->addUnAvis($unAvis);
var_dump($unEleve->getNbMaxAvisAtteint());//false
$unAvis=new Avis(10,'Quelle incompétence',date('Y-m-d'),$unEleve);
$unEleve->addUnAvis($unAvis);
var_dump($unEleve->getNbMaxAvisAtteint());//false
$unAvis=new Avis(10,'Quelle incompétence',date('Y-m-d'),$unEleve);
$unEleve->addUnAvis($unAvis);
var_dump($unEleve->getNbMaxAvisAtteint()); //true, c'est le 3eme avis (nb max) de l'eleve

