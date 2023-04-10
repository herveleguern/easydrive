<?php
class Utilisateur
{
    private $id;
    private $login;
    private $passwordHash;
    private $nom;
    private $prenom;
    private $email;

    public function __construct($id, $login, $passwordHash, $nom, $prenom, $email)
    {
        $this->id = $id;
        $this->login = $login;
        $this->passwordHash = $passwordHash;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getIdentite()
    {
        return $this->nom . ' ' . $this->prenom;
    }
    public function getId()
    {
        return $this->id;
    }
}

class Eleve extends Utilisateur
{
    private $dateNaissance;
    private $rue;
    private $codePostal;
    private $ville;
    private $dateInscription;
    private $NEPH;
    private $dateETG;
    private $echecETG;
    private $garantieSucces;
    private $lesAvis; // tableau de 0 à 3 Avis

    public function __construct(
        $id,
        $login,
        $passwordHash,
        $nom,
        $prenom,
        $email,
        $dateNaissance,
        $rue,
        $codePostal,
        $ville,
        $dateInscription,
        $NEPH,
        $dateETG,
        $echecETG,
        $garantieSucces
    ) {
        //A COMPLETER
        $this->dateNaissance = $dateNaissance; 
        $this->rue = $rue;
        $this->codePostal = $codePostal;
        $this->ville = $ville;
        $this->dateInscription = $dateInscription;
        $this->NEPH = $NEPH;
        $this->dateETG = $dateETG;
        $this->echecETG = $echecETG;
        $this->garantieSucces = $garantieSucces;
    }
    public function getLesAvis()
    {
        return $this->lesAvis;
    }
    /* renvoie le dernier avis déposé par l'élève */
    public function getDernierAvis()
    {
        return $this->lesAvis->last();
    }
    /* renvoie vrai si l'élève a déjà déposé 3 avis, faux sinon */
    public function getNbMaxAvisAtteint()
    {
        //A COMPLETER
    }
    public function addUnAvis(Avis $unAvis)
    {
        $this->lesAvis[] = $unAvis;
        $unAvis->setLEleve($this);
    }
}

class Avis
{
    private $id;
    private $contenu;
    private $dateDepot;
    private $publie; /* false tant que l'avis n'a pas été publié, true sinon */
    private $modere; /* false tant que l'avis n'a pas été modéré, true sinon */
    private $lEleve; //objet Eleve 
    private $leModerateur; //objet Moderateur ou NULL si non modéré

    public function __construct($id, $contenu, $dateDepot, $lEleve)
    {
        $this->id=$id;
        $this->contenu=$contenu;
        $this->dateDepot=$dateDepot;
        $this->publie=false;
        $this->modere=false;
        $this->lEleve=$lEleve;
        $this->leModerateur=NULL;
    }

    public function getContenu()
    {
        return $this->contenu;
    }
    public function getLEleve()
    {
        return $this->lEleve;
    }
    public function setLEleve($unEleve)
    {
        $this->lEleve = $unEleve;
    }
    public function getModere()
    {
        return $this->modere;
    }
    public function getPublie()
    {
        return $this->publie;
    }
}
