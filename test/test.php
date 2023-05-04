<?php



class Personnage {
    private $pts_vie;
    private $pts_armure;
    private $pts_attaque;
    private $nom;

}


  function __construct($nom,$pts_vie,$pts_armure,$pts_attaque)
{
    $this->nom=$nom;
    $this->pts_vie=$pts_vie;
    $this->pts_armure=$pts_armure;
    $this->pts_attaque=$pts_attaque;
  
}

