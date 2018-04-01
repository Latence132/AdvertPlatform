<?php
// src/OC/PlatformBundle/Purge/OCPurge.php

namespace OC\PlatformBundle\Purge;


class OCPurge
{

    private $days;
    private $compteur=0;

    public function __construct($days)
    {
        $this->days = $days;
        $this->compteur = 0;
    }

    public function purge($em,$listAdverts,$days)
    {
        $this->setDays($days);

        foreach($listAdverts as $advert)
        {
            $em->remove($advert); 
            $this->compteur++;
        }

        $em->flush();        
        return $this;
    }
    
    public function getDays()
    {
        return $this->days;
    }
    
    public function setDays($days)
    {
        $this->days = $days;
    }
    
    public function getCompteur()
    {
        return $this->compteur;
    }
    
}