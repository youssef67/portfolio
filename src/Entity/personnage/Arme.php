<?php
namespace App\Entity\personnage;

class Arme
{
    private $nom;
    private $descriptif;
    private $degats;

    public static $armes = [];

    public function __construct($nom, $descritpif, $degats)
    {
        $this->nom = $nom;
        $this->descriptif = $descritpif;
        $this->degats = $degats;
        self::$armes[] = $this;
    }

    
    public function getNom() { return $this->nom; }
    public function getDescriptif() { return $this->descriptif; }
    public function getDegats() { return $this->degats; }
    
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }
    
    public function setDescriptif($descriptif)
    {
        $this->descriptif = $descriptif;
        return $this;
    }
    
    public function setDegats($degats)
    {
        $this->degats = $degats;
        return $this;
    }
    
    public static function CreerArmes()
    {
        new Arme('épée','Une superbe épée tranchante',10);
        new Arme('Arc','Une arme à distance',7);
        new Arme('Hache','Une arme ou un outil',15);
    }

    public static function getArmeParNom($nom)
    {
        foreach (self::$armes as $arme)
        {
            if (strtolower(str_replace('é', 'e', $arme->nom)) === $nom)
            {
                return $arme;
            }
        }
    }
}