<?php

class CalendariAdvent{


    public $calendari;

    public $surprise = ["game","travel","xocolate"];

    public function __construct(){
    }
    public function openDay(int $day){
         if (!isset($this->calendari[$day])) {
            echo "Ese día no existe" . "\n";
            return;
        }

        if($this -> calendari[$day] == null){
            echo "Ese día ya esta abierto" . "\n";
            return;
        }


        echo "Has recibido : " . $this -> calendari[$day] . "\n";
        $this -> calendari[$day] = null;
        
    }


    public function createCalendari(int $days){
        for($i = 1; $i <= $days; $i++){
            $this->calendari[$i] = $this->surprise[array_rand($this->surprise)];
        }
        echo "Calendari : " . print_r($this -> calendari, true) ."";
    }

}

?>