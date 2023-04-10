<?php
require_once 'metiers.php';
function connexionPDO()
{
    $login = "root";
    $mdp = "";
    $bd = "easy2drive";
    $serveur = "localhost";
    try {
        $conn = new PDO("mysql:host=$serveur;dbname=$bd", $login, $mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        print "Erreur de connexion PDO ";
        die();
    }
}

function getEleveByLogin($login){
    // renvoie un eleve ou null si aucun login ne correspond
    $connex = connexionPDO();
    $req = "SELECT id,login,passwordHash,nom,prenom,email,
    dateNaissance,rue,codePostal,ville,dateInscription,NEPH,dateETG,echecETG,garantieReussite
     FROM utilisateur,eleve 
     WHERE eleve.idUtilisateur=utilisateur.id
     AND login = '" . $login . "'";
    $res = $connex->query($req);
    $enreg = $res->fetch(PDO::FETCH_OBJ);
    if ($enreg != false) {
        $unClient = new Eleve(
            $enreg->id,
            $enreg->login,
            $enreg->passwordHash,
            $enreg->nom,
            $enreg->prenom,
            $enreg->email,
            $enreg->dateNaissance,
            $enreg->rue,
            $enreg->codePostal,
            $enreg->ville,
            $enreg->dateInscription,
            $enreg->NEPH,
            $enreg->dateETG,
            $enreg->echecETG,
            $enreg->garantieReussite
        );
    } else {
        return null;
    }
    $res->closeCursor();
    return $unClient;
}

?>
