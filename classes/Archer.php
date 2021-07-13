<?php

class Archer extends Character
{
    // public $dagger;
    public $nbArrow = 10; 
    public $arrow = 15;
    public $legoShot =false;
    
    
    public function __construct($name){
        parent::__construct($name);
        $this->damage = 5;
    }

    public function turn($target){
        $rand = rand(1, 100);
        
        if ($this->nbArrow == 0){
            $status = $this->cut($target);
        } 
        
        else if ($rand > 30 && $this->nbArrow >=1 && $this->legoShot == false) {
            $status = $this->arrowShot($target);
        } 
        
        else if ($this->legoShot == true  && $this->nbArrow >= 2){
            $status = $this->dblShot($target);
        }

        else if ($rand <= 30 && $this->legoShot == false){
            $status = $this->legolasShot($target);
        }
        else{
            echo "ils ont pas kiffés";
        }
        return $status;
    }

    public function arrowShot($target){
        $this->nbArrow -= 1;
        $target->setHealthPoints($this->arrow);
        $status = "$this->name tire une flèche sur $target->name, et lui inflige $this->arrow à qui il reste $target->healthPoints points de vie ! ";
        return $status;
    }

    public function legolasShot(){
        $this->legoShot = true;
        $status = "$this->name prepare une attaque puissantes ..";
        return $status;
        }

    public function cut($target){
        $target->setHealthPoints($this->damage);
        $status = "$this->name donne un coup de dague à $target->name ! Il reste $target->healthPoints points de vie à $target->name !";
        return $status;
    }

    public function dblShot($target){
        $this->nbArrow -= 2;
        $target->setHealthPoints($this->arrow);
        $target->setHealthPoints($this->arrow);
        $status = "$this->name tire deux flèches sur $target->name et lui infligeant  deux fois $this->arrow, il lui reste $target->healthPoints";
        $this->legoShot = false;
        return $status;
    }

    public function dblShotOn(){
        if (!$this->legoShot) {
            $this->legoShot = false;
            return;
        }
    }
        
    }
    

    

