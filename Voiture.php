<?php

class Voiture
{

    private $couleur;
    private $marque;
    private $nbPortes;
    private $phare;
    private $compteur;
    private $reservoir;
    private $consommation;
    private $essence;

    function __construct(
        $marque,
        $nbPortes,
        $couleur = 'blanc',
        $compteur = 0,
        $reservoir = 80,
        $essence = 80,
        $consommation = 0.07
    ) {
        $this->setPhare('off');
        $this->setCouleur($couleur);
        $this->setMarque($marque);
        $this->setnbPortes($nbPortes);
        $this->setCompteur($compteur);
        $this->setReservoir($reservoir);
        $this->setEssence($essence);
        $this->setConsommation($consommation);
    }

    //GETTER ET SETTER -- PRINCIPE D'ENCAPSULATION

    public function getEssence()
    {
        return $this->essence;
    }

    public function setEssence($essence)
    {
        $this->essence = $essence;
    }

    public function getConsommation()
    {
        return $this->consommation;
    }

    public function setConsommation($consommation)
    {
        $this->consommation = $consommation;
    }

    public function getReservoir()
    {
        return $this->reservoir;
    }

    public function setReservoir($reservoir)
    {
        $this->reservoir = $reservoir;
    }

    public function getCompteur()
    {
        return $this->compteur;
    }

    public function setCompteur($compteur)
    {
        $this->compteur = $compteur;
    }

    public function getPhare()
    {
        return $this->phare;
    }

    public function setPhare($phare)
    {
        $this->phare = $phare;
    }

    public function getCouleur()
    {
        return $this->couleur;
    }

    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;
    }

    public function getMarque()
    {
        return $this->marque;
    }

    public function setMarque($marque)
    {
        $this->marque = $marque;
    }

    public function getNbPortes()
    {
        return $this->nbPortes;
    }

    public function setNbPortes($nbPortes)
    {
        $this->nbPortes = $nbPortes;
    }



    //--METHODES DE L'OBJET--


    public function phare()
    {
        if ($this->getPhare() == 'off') {
            $this->setPhare('on');
        } else {
            $this->setPhare('off');
        }
    }

    public function rouler($km)
    {
        while($km>0){
            $km--;
            // Je vérifie si c'est encore possible de rouler pour ce km
            if($this->essence - (1*$this->consommation)>0){
                // J'enlève de l'essence pour chaque km (chaque tour de boucle) en fonction de sa consommation
                $this->essence = $this->essence - (1*$this->consommation);
                $this->compteur++;
            }     
        }
    }

    // Pour cette fonction j'utilise les getters ou les setters pour manipuler et afficher 
    // les données mais j'aurais très bien pu faire comme la méthode rouler et utiliser 
    // directement les attributs vu qu'on se trouve dans la classe
    public function tableauDeBord()
    {
        //ON DEFINI UNE VARIABLE A 10% DU RESERVOIR
        $alertEssence = $this->getReservoir() * 0.1;

        echo        $this->getCompteur() . 'km<br>
        Phare : ' . $this->getPhare() . '<br>
        Ess  : ' . $this->getEssence() . '/' . $this->getReservoir() . '<br>';
        //SOUS LES 10% ON MET LE SIGNAL ROUGE
        if ($this->getEssence() <= $alertEssence) {
            echo 'Signal Essence : rouge ';
        } else {
            echo 'Signal Essence : Vert';
        }
    }

    public function faireLePlein()
    {
        $this->setEssence($this->getReservoir());
    }
}
