<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Model;
use Doctrine\ORM\Mapping as ORM;
/**
 * Description of Entity
 * @ORM\Entity
 * @ORM\Cache("NONSTRICT_READ_WRITE")
 * @author hieun
 */
class Entity {

    

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;
    
    
    
    /**
     * get name
     *
     * @param string $name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }
    
    
    /**
     * Set id
     *
     * @param string $name
     *
     * @return Users
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
    public function __toString() {
        return $this->getName()?$this->getName():'';
    }
}
